<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.services.index',[
            'services'=>Service::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        Service::create([
            'name_az'=>$request->name_az,
            'name_en'=>$request->name_en,
            'name_ru'=>$request->name_ru,
            'slug_az'=>str_slug($request->name_az),
            'slug_en'=>str_slug($request->name_en),
            'slug_ru'=>str_slug($request->name_ru),
        ]);

        toastSuccess('Data əlavə edildi');
        return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('back.pages.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $service->update([
            'name_az'=>$request->name_az,
            'name_en'=>$request->name_en,
            'name_ru'=>$request->name_ru,
            'slug_az'=>str_slug($request->name_az),
            'slug_en'=>str_slug($request->name_en),
            'slug_ru'=>str_slug($request->name_ru)
        ]);

        toastSuccess('Data redaktə edildi');
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        toastSuccess('Data silindi');
        return redirect()->route('service.index');
    }
}
