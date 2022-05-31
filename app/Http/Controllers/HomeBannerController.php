<?php

namespace App\Http\Controllers;

use App\Models\HomeBanner;
use App\Http\Requests\StoreHomeBannerRequest;
use App\Http\Requests\UpdateHomeBannerRequest;
use App\Traits\FileUploader;

class HomeBannerController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.home.banner',[
            'banners'=>HomeBanner::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHomeBannerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHomeBannerRequest $request)
    {
//        dd($request);
        $names = $this->multiFileSave('files/home/banners/',$request,'src');

        foreach ($names as $name)
        {
            HomeBanner::create([
                'src'=>$name
            ]);
        }

        toastSuccess('Data əlavə edilid');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeBanner  $homeBanner
     * @return \Illuminate\Http\Response
     */
    public function show(HomeBanner $homeBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeBanner  $homeBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeBanner $homeBanner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHomeBannerRequest  $request
     * @param  \App\Models\HomeBanner  $homeBanner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHomeBannerRequest $request, HomeBanner $homeBanner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeBanner  $homeBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeBanner $homeBanner)
    {
        //
    }

    public function deleter($id)
    {
        $homeBanner = HomeBanner::findOrFail($id);
        $this->fileDelete('files/home/banners/'.$homeBanner->src);
        $homeBanner->delete();
        toastSuccess('Data silindi');
        return redirect()->back();
    }
}
