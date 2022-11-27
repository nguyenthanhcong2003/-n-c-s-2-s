<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Blog\BlogServiceInterface;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blogService;
    public function __construct(BlogServiceInterface $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index()
    {
        $blogs = $this->blogService->Blogs();
        return view('front.blog.index', compact('blogs'));
    }
    public function show($id)
    {
        $blogs = $this->blogService->find($id);
        return view('front.blog.show', compact('blogs'));
    }
}