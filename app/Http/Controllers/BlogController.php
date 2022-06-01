<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Traits\FileUploader;

class BlogController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.blogs.index',[
            'presentations'=>Blog::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        $src = $this->fileSave('files/blogs/',$request,'src');
        Blog::create([
            'src'=>$src,
            'title_az'=>$request->title_az,
            'title_en'=>$request->title_en,
            'title_ru'=>$request->title_ru,
            'slug_az'=>str_slug($request->title_az),
            'slug_en'=>str_slug($request->title_en),
            'slug_ru'=>str_slug($request->title_ru),
            'intro_az'=>$request->intro_az,
            'intro_en'=>$request->intro_en,
            'intro_ru'=>$request->intro_ru,
            'text_az'=>$request->text_az,
            'text_en'=>$request->text_en,
            'text_ru'=>$request->text_ru,
        ]);


        toastSuccess('Data əlavə edildi');
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('back.pages.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $src   = $this->fileUpdate($blog->src, $request->hasFile('src'), $request->src, 'files/blogs/');
        $blog->update([
            'src'=>$src,
            'title_az'=>$request->title_az,
            'title_en'=>$request->title_en,
            'title_ru'=>$request->title_ru,
            'slug_az'=>str_slug($request->title_az),
            'slug_en'=>str_slug($request->title_en),
            'slug_ru'=>str_slug($request->title_ru),
            'intro_az'=>$request->intro_az,
            'intro_en'=>$request->intro_en,
            'intro_ru'=>$request->intro_ru,
            'text_az'=>$request->text_az,
            'text_en'=>$request->text_en,
            'text_ru'=>$request->text_ru,
        ]);

        toastSuccess('Data redakte edildi');
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $this->fileDelete('files/blogs/'.$blog->src);
        $blog->delete();
        toastSuccess('Data silindi');
        return redirect()->route('blog.index');
    }
}
