<?php

namespace App\Http\Controllers;

use App\Helpers\Options;
use App\Models\Option;
use App\Http\Requests\StoreOptionRequest;
use App\Http\Requests\UpdateOptionRequest;

class OptionController extends Controller
{
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
}
    