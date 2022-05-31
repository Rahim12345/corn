<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public $zero;
    public $first;
    public $second;
    public $third;
    public function home()
    {
        $services           = Service::where('on_home',1)->take(4)->pluck('id')->toArray();
        $this->zero         = [];
        $this->first        = [];
        $this->second       = [];
        $this->third        = [];
        $this->setHomeServices($services);

        return view('front.pages.home',[
            'services'=>Service::where('on_home',1)->take(4)->get(),
            'zero'=>$this->zero,
            'first'=>$this->first,
            'second'=>$this->second,
            'third'=>$this->third
        ]);
    }

    public function services($slug = null)
    {
        if ($slug == null)
        {
            $first = Service::firstOrFail();
            $products   = Product::where('service_id',$first->id)->paginate(2);
        }
        else
        {
            $first = Service::where('slug_az',$slug)
                ->orWhere('slug_az',$slug)
                ->orWhere('slug_en',$slug)
                ->orWhere('slug_ru',$slug)
                ->firstOrFail();
            $products   = Product::where('service_id',$first->id)->paginate(2);
        }
        $services   = Service::latest()->get();
        return view('front.pages.services', compact('products','services'));
    }

    public function setHomeServices($services)
    {
        if (isset($services[0]))
        {
            $this->zero   = Product::with('images','service')->where('service_id',$services[0])->take(4)->get();
        }

        if (isset($services[1]))
        {
            $this->first   = Product::with('images','service')->where('service_id',$services[1])->take(4)->get();
        }

        if (isset($services[2]))
        {
            $this->second   = Product::with('images','service')->where('service_id',$services[2])->take(4)->get();
        }

        if (isset($services[3]))
        {
            $this->third   = Product::with('images','service')->where('service_id',$services[3])->take(4)->get();
        }
    }
}