<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductImage;
use App\Models\Service;
use App\Traits\FileUploader;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Product::with('service')
                ->latest()
                ->get();

            return DataTables::of($data)

                ->editColumn('src', function ($row) {
                    return $row->src == '' ? '' : '<img style="width:50px;height:50px" src="'.asset('files/products/covers/'.$row->src).'" alt="'.$row->title_az.'" />';
                })

                ->editColumn('service_id', function ($row) {
                    return $row->service->name_az;
                })

                ->addColumn('action',function ($row){
                    return '
                <div class="btn-list flex-nowrap">
                    <a href="javascript:void(0)" class="btn btn-danger MehsulDeleter" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#modal-danger">
                      <i class="fa fa-times"></i>
                    </a>
                    <a class="btn btn-info myIdeaEditor"
                    href="'.route('product.edit',[$row->id]).'"><i class="fa fa-edit"></i></a>
                </div>
                ';
                })

                ->rawColumns(['src','action'])

                ->make(true);
        }

        return view('back.pages.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.products.create',[
            'services'=>Service::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $src        = $this->fileSave('files/products/covers/',$request,'src');
        $product    = Product::create([
           'service_id'=>$request->service_id,
           'src'=>$src,
           'title_az'=>$request->title_az,
           'title_en'=>$request->title_en,
           'title_ru'=>$request->title_ru,
            'text_az'=>$request->text_az,
            'text_en'=>$request->text_en,
            'text_ru'=>$request->text_ru,
        ]);

        $names        = $this->multiFileSave('files/products/images/',$request,'images');
        foreach ($names as $name)
        {
            ProductImage::create([
                'product_id'=>$product->id,
                'src'=>$name
            ]);
        }

        toastSuccess('Data əlavə edildi');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('back.pages.products.edit',[
            'services'=>Service::latest()->get(),
            'product'=>$product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $src        = $this->fileUpdate($product->src, $request->hasFile('src'), $request->src, 'files/products/covers/');
        $product->update([
            'service_id'=>$request->service_id,
            'src'=>$src,
            'title_az'=>$request->title_az,
            'title_en'=>$request->title_en,
            'title_ru'=>$request->title_ru,
            'text_az'=>$request->text_az,
            'text_en'=>$request->text_en,
            'text_ru'=>$request->text_ru,
        ]);

        $names        = $this->multiFileSave('files/products/images/',$request,'images');
        foreach ($names as $name)
        {
            ProductImage::create([
                'product_id'=>$product->id,
                'src'=>$name
            ]);
        }

        toastSuccess('Data redaktə edildi');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->fileDelete('files/products/covers/'.$product->src);

        foreach ($product->images as $image)
        {
            $this->fileDelete('files/products/images/'.$image->src);
            $image->delete();
        }

        $product->delete();
        toastSuccess('Data silindi');
        return redirect()->back();
    }
}
