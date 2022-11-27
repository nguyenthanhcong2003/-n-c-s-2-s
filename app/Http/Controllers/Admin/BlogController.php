<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Services\Blog\BlogServiceInterface;
use App\Utilities\Common;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blogService;
    public function __construct(BlogServiceInterface $blogService)
    {
        $this->blogService = $blogService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blogs = $this->blogService->searchAndPaginate('category',$request->get('search'));
        return view('admin.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // xử lý file
        if ($request->hasFile('image')){
            $data['image'] = Common::uploadFile($request->file('image'),'front/img/blog');
        }
        $this->blogService->create($data);
        return redirect('admin/blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = $this->blogService->find($id);
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $data = $request->all();
        // sử lý file ảnh
        if ($request->hasFile('image')){
            // thêm file mới
            $data['image'] = Common::uploadFile($request->file('image'),'front/img/blog');

            // xóa file cũ
            $file_name_old = $request->get('image');
            if ($file_name_old != ''){
                unlink('front/img/blog/'.$file_name_old);
            }
        }
        // Cập nhận giữ liệu
        $this->blogService->update($data,$blog->id);

        return redirect('admin/blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Blog $blog)
    {
        $this->blogService->delete($blog->id);

        // Xóa file ảnh
        $file_name = $blog->image;
        if ($file_name != ''){
            unlink('front/img/blog/' . $file_name);
        }
        return redirect('admin/blog');
    }
}
