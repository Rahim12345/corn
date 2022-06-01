<?php

namespace App\Http\Controllers;

use App\Helpers\Options;
use App\Models\Option;
use App\Http\Requests\StoreOptionRequest;
use App\Http\Requests\UpdateOptionRequest;
use App\Traits\FileUploader;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.options',[
            'facebook'=>Options::getOption('facebook'),
            'twitter'=>Options::getOption('twitter'),
            'youtube'=>Options::getOption('youtube'),
            'email'=>Options::getOption('email'),
            'tel'=>Options::getOption('tel'),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOptionRequest $request)
    {
        $check_add = Options::getOption('facebook') == '' ? true : false;
        foreach ($request->keys() as $key)
        {
            if ($key != '_token')
            {
                Option::updateOrCreate(
                    ['key'   => $key],
                    [
                        'value' => $request->post($key)
                    ]
                );
            }
        }

        if ($check_add)
        {
            toastr()->success('Data uğurla əlavə edildi');
        }
        else
        {
            toastr()->success('Data uğurla yeniləndi');
        }

        return redirect()->route('option.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOptionRequest  $request
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOptionRequest $request, Option $option)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        //
    }

    public function servicesBanner()
    {
        return view('back.pages.services.banner');
    }

    public function servicesBannerPost(Request $request)
    {
        $this->validate($request,[
            'src'=>'nullable|max:2048'
        ],[],[
            'src'=>'Photo'
        ]);

        $src   = $this->fileUpdate(\App\Helpers\Options::getOption('service_banner'), $request->hasFile('src'), $request->src, 'files/service_banner/');
        Option::updateOrCreate(
            ['key'   => 'service_banner'],
            [
                'value' => $src
            ]
        );

        toastSuccess('Data əlavə edildi');
        return redirect()->back();
    }

    public function aboutBanner()
    {
        return view('back.pages.about.banner');
    }

    public function aboutBannerPost(Request $request)
    {
        $this->validate($request,[
            'src'=>'nullable|max:2048'
        ],[],[
            'src'=>'Photo'
        ]);

        $src   = $this->fileUpdate(\App\Helpers\Options::getOption('about_banner'), $request->hasFile('src'), $request->src, 'files/about_banner/');
        Option::updateOrCreate(
            ['key'   => 'about_banner'],
            [
                'value' => $src
            ]
        );

        toastSuccess('Data əlavə edildi');
        return redirect()->back();
    }

    public function aboutText()
    {
        return view('back.pages.about.create');
    }

    public function aboutTextPost(Request $request)
    {
        $this->validate($request,[
            'kimik_text_az'=>'nullable|max:20000',
            'kimik_text_en'=>'nullable|max:20000',
            'kimik_text_ru'=>'nullable|max:20000',
            'niye_text_az'=>'nullable|max:20000',
            'niye_text_en'=>'nullable|max:20000',
            'niye_text_ru'=>'nullable|max:20000',
        ],[],[
            'kimik_text_az'=>'Biz kimik?(AZ)',
            'kimik_text_en'=>'Biz kimik?(EN)',
            'kimik_text_ru'=>'Biz kimik?(RU)',
            'niye_text_az'=>'Niyə biz?(AZ)',
            'niye_text_en'=>'Niyə biz?(EN)',
            'niye_text_ru'=>'Niyə biz?(RU)',
        ]);


        foreach ($request->keys() as $key)
        {
            if ($key != '_token')
            {
                Option::updateOrCreate(
                    ['key'   => $key],
                    [
                        'value' => $request->post($key)
                    ]
                );
            }
        }

        toastSuccess('Data əlavə edildi');
        return redirect()->back();
    }

    public function presentationBanner()
    {
        return view('back.pages.presentations.banner');
    }

    public function presentationBannerPost(Request $request)
    {
        $this->validate($request,[
            'src'=>'nullable|max:2048'
        ],[],[
            'src'=>'Photo'
        ]);

        $src   = $this->fileUpdate(\App\Helpers\Options::getOption('presentation_banner'), $request->hasFile('src'), $request->src, 'files/presentation_banner/');
        Option::updateOrCreate(
            ['key'   => 'presentation_banner'],
            [
                'value' => $src
            ]
        );

        toastSuccess('Data əlavə edildi');
        return redirect()->back();
    }
}
