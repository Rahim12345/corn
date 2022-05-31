<?php

namespace App\Http\Controllers;

use App\Models\Haqqimizda;
use App\Http\Requests\StoreHaqqimizdaRequest;
use App\Http\Requests\UpdateHaqqimizdaRequest;
use App\Traits\FileUploader;

class HaqqimizdaController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.haqqimizda.index',[
            'services'=>Haqqimizda::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.haqqimizda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHaqqimizdaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHaqqimizdaRequest $request)
    {
        $src = $this->fileSave('files/about/',$request,'src');

        Haqqimizda::create([
            'src'=>$src,
            'text_az'=>$request->name_az,
            'text_en'=>$request->name_en,
            'text_ru'=>$request->name_ru,
        ]);

        toastSuccess('Data əlavə edildi');
        return redirect()->route('about.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Haqqimizda  $haqqimizda
     * @return \Illuminate\Http\Response
     */
    public function show(Haqqimizda $haqqimizda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Haqqimizda  $haqqimizda
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $haqqimizda = Haqqimizda::findOrFail($id);

        return view('back.pages.haqqimizda.edit', compact('haqqimizda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHaqqimizdaRequest  $request
     * @param  \App\Models\Haqqimizda  $haqqimizda
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHaqqimizdaRequest $request, $id)
    {
        $haqqimizda = Haqqimizda::findOrFail($id);
        $src   = $this->fileUpdate($haqqimizda->src, $request->hasFile('src'), $request->src, 'files/about/');
        $haqqimizda->update([
            'src'=>$src,
            'text_az'=>$request->name_az,
            'text_en'=>$request->name_en,
            'text_ru'=>$request->name_ru,
        ]);

        toastSuccess('Data redakte edildi');
        return redirect()->route('about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Haqqimizda  $haqqimizda
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $haqqimizda = Haqqimizda::findOrFail($id);
        $this->fileDelete('files/about/'.$haqqimizda->src);
        $haqqimizda->delete();
        toastSuccess('Data silindi');
        return redirect()->route('about.index');
    }
}
