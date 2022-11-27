<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderServiceInterface;
use App\Services\User\UserServiceInterface;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    private $userService;
    private $orderService;
    public function __construct(UserServiceInterface $userService, OrderServiceInterface $orderService)
    {
        $this->userService = $userService;
        $this->orderService = $orderService;
    }

    public function login(){
        return view('front.account.login');
    }
    public function checkLogin(Request $request){

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
//            'level' => Constant::user_level_client
        ];
        $remember = $request->remember;

        if (Auth::attempt($credentials , $remember)){
            //return redirect(''); // trang chủ
            return redirect()->intended(''); // mặc định là trang chủ
        }else{
            return back()->with('notification','ERROR!: Email or password is wrong');
        }

    }
    public function logout(){
        Auth::logout();

        return back();
    }
    public function register(){
        return view('front.account.register');
    }
    public function postRegister(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|max:255',
        ],
        [
            'name' => 'you have not entered your name',
            'email.unique' => 'email already exists',
            'email.required' => 'you have not entered your email',
            'password' => 'you have not entered the password'
        ]);
        if ($request->password != $request->password_confirmation){
            return back()->with('notification','ERROR! Confirm password does not match');
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => Constant::user_level_client, // đăng kí tk : cấp khách hàng bình thường
        ];
        $this->userService->create($data);

        return redirect('account/login')->with('notification','Register Success!');
    }
    public function myOrderIndex(){
        $orders = $this->orderService->getOrderByUserId(Auth::id());
        return view('front.account.my-order.index',compact('orders'));
    }
    public function myOrderShow($id){
        $order = $this->orderService->find($id);
        return view('front.account.my-order.show',compact('order'));
    }
}

