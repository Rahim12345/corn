<?php

namespace App\Http\Controllers;

use App\Models\Presentation;
use App\Http\Requests\StorePresentationRequest;
use App\Http\Requests\UpdatePresentationRequest;
use App\Traits\FileUploader;

class PresentationController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.pages.presentations.index',[
            'presentations'=>Presentation::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.presentations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePresentationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePresentationRequest $request)
    {
        $src = $this->fileSave('files/presentations/covers/',$request,'src');
        $pdf = $this->fileSave('files/presentations/pdf/',$request,'pdf');

        Presentation::create([
            'src'=>$src,
            'pdf'=>$pdf,
            'name_az'=>$request->text_az,
            'name_en'=>$request->text_en,
            'name_ru'=>$request->text_ru,
        ]);

        toastSuccess('Data əlavə edildi');
        return redirect()->route('presentation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function show(Presentation $presentation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function edit(Presentation $presentation)
    {
        return view('back.pages.presentations.edit', compact('presentation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePresentationRequest  $request
     * @param  \App\Models\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePresentationRequest $request, Presentation $presentation)
    {
        $src   = $this->fileUpdate($presentation->src, $request->hasFile('src'), $request->src, 'files/presentations/covers/');
        $pdf   = $this->fileUpdate($presentation->pdf, $request->hasFile('pdf'), $request->pdf, 'files/presentations/pdf/');

        $presentation->update([
            'src'=>$src,
            'pdf'=>$pdf,
            'name_az'=>$request->text_az,
            'name_en'=>$request->text_en,
            'name_ru'=>$request->text_ru
        ]);

        toastSuccess('Data redakte edildi');
        return redirect()->route('presentation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Presentation  $presentation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presentation $presentation)
    {
        $this->fileDelete('files/presentations/covers/'.$presentation->src);
        $this->fileDelete('files/presentations/pdf/'.$presentation->pdf);
        $presentation->delete();
        toastSuccess('Data silindi');
        return redirect()->route('presentation.index');
    }
}
