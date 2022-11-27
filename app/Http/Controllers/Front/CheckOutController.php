<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderServiceInterface;
use App\Services\OrderDetail\OrderDetailServiceInterface;
use App\Utilities\Constant;
use App\Utilities\VNPay;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{

    private $orderService;
    private $orderDetailService;
    public function __construct(OrderServiceInterface $orderService, OrderDetailServiceInterface $orderDetailService)
    {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
    }

    public function index(){
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();
        return view('front.checkout.index',compact('carts','total','subtotal'));
    }

    public function addOrder(Request $request){
        // 1 thêm đơn hàng
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'country' => 'required|max:255',
            'street_address' => 'required|max:255',
            'postcode_zip' => 'required|max:255|alpha_num',
            'town_city' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|alpha_num|max:20',
        ],[
            'first_name' => 'please enter your first name',
            'last_name' => 'please enter your last name',
            'country' => 'please enter country',
            'street_address' => 'please enter street address',
            'postcode_zip.required' => 'please enter postcode zip',
            'postcode_zip.alpha_num'=> 'please enter in number',
            'town city' => 'please enter town city',
            'email.required' => 'please enter email',
            'email.email' => 'email is not syntactically correct',
            'phone.required' => 'please enter phone',
            'phone.alpha_num' => 'please enter in number'
        ]);
        $data = $request->all();
        $data['status'] = Constant::order_status_ReceiveOrders;
        $order = $this->orderService->create($data);


        // 2 thêm chi tiết đơn hàng
        $carts = Cart::content();
        foreach ($carts as $cart){
            $data = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'amount' => $cart->price,
                'total' => $cart->qty * $cart->price,
            ];
            $this->orderDetailService->create($data);
        }

        if ($request->payment_type == 'pay_later'){
            // Gửi gmail
            $total = Cart::total();
            $subtotal = Cart::subtotal();
            $this->sendEmail($order,$total,$subtotal); // Gọi hàm gửi email để định nghĩa
            // 3 xóa giỏ hàng
            Cart::destroy();

            // 4 trả vè kết quả thông báo
            return redirect('checkout/result')
                ->with('notification','Success! You will pay on delivery. Please check your mail');
        }

        if($request->payment_type == 'online_payment'){
            // 01 Lấy URL thanh toán VNPay
            $data_url = VNPay::vnpay_create_payment([
                'vnp_TxnRef' => $order->id, //ID đơn hàng
                'vnp_OrderInfo' => 'Mô tả đơn hàng ...', // Mô tả đơn hàng
                'vnp_Amount' => Cart::total(0,'','') * 24807, // Tổng giá đơn hàng . Nhân với tiền việt nam
            ]);
            // 2 Chuyển hướng tới URL lấy được
            return redirect()->to($data_url);
        }
    }

    public function vnPayCheck(Request $request){
        // 1 Lấy data từ URL (do VNPay gửi về $vnp_Retururnurl)
        $vnp_ResponseCode = $request->get('vnp_ResponseCode'); // Mã phản hồi kết quả thanh toán 00 = thành công
        $vnp_TxnRef = $request->get('vnp_TxnRef');// order_id
        $vnp_Amount = $request->get('vnp_Amount'); // Số tiền thanh toán

        // 2 kiểm tra data , xem kết quả giao dịch trả về VNPAY hợp lệ không
        if($vnp_ResponseCode != null){
            // Nếu thành công
            if ($vnp_ResponseCode == 00){
                // cập nhật trạng thái order
                $this->orderService->update(['status' => Constant::order_status_Paid], $vnp_TxnRef);
                // Gửi gmail
                $order = $this->orderService->find($vnp_TxnRef); //$vnp_TxnRef chính là order_id
                $total = Cart::total();
                $subtotal = Cart::subtotal();
                $this->sendEmail($order,$total,$subtotal); // Gọi hàm gửi email để định nghĩa
                // Xóa giỏ hàng
                Cart::destroy();

                // THông báo kết quả
                return redirect('checkout/result')
                    ->with('notification','Success! has paid online. Please check your mail');
            }else{
                // Nếu không thành công xóa đơn hàng đã thêm vào database
                $this->orderService->delete($vnp_TxnRef);

                //Thông bao lỗi
                return redirect('checkout/result')
                    ->with('notification','ERROR! Payment failed or canceled');

            }
        }
    }

    public function result(){
        $notification = session('notification');
        return view('front.checkout.result',compact('notification'));
    }

    private function sendEmail($order, $total, $subtotal){
        $email_to = $order->email;
        Mail::send('front.checkout.email', compact('order', 'total', 'subtotal'),
        function ($message) use ($email_to) {
            $message->from('tcshopfd@gmail.com','tcshop');
            $message->to($email_to, $email_to);
            $message->subject('Order Notification');
        });
    }
}
