<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactEmail;
use App\Models\Contact;
use App\Models\Haqqimizda;
use App\Models\HomeBanner;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            'third'=>$this->third,
            'banners'=>HomeBanner::latest()->get()
        ]);
    }

    public function about()
    {
        return view('front.pages.about',[
            'services'=>Haqqimizda::latest()->get()
        ]);
    }

    public function contact()
    {
        return view('front.pages.contact');
    }

    public function contactPost(ContactRequest $request)
    {
        $contact = Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'ip'=>$request->ip()
        ]);

        $title                  = $contact->name.' tərəfindən yeni elektron müraciət daxil oldu.';
        $text                   = '
            <table>
                <tr>
                    <td>Ad,Soyad:</td>
                    <td>'.$contact->name.'</td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td>'.$contact->email.'</td>
                </tr>
                <tr>
                    <td>Mövzu:</td>
                    <td>'.$contact->subject.'</td>
                </tr>
                <tr>
                    <td>Mesaj:</td>
                    <td>'.$contact->message.'</td>
                </tr>
            </table>
            ';

        $details = [
            'title' => $title,
            'body'  => $text
        ];
        Mail::to(env('MAIL_TO_ADDRESS'))->send(new ContactEmail($details));

        return \response()->json([
            'message' => __('static.contact_success'),
        ],200);
    }

    public function services($slug = null)
    {
        if ($slug == null)
        {
            $first = Service::latest()->firstOrFail();
            $products   = Product::where('service_id',$first->id)->paginate(20);
        }
        else
        {
            $first = Service::where('slug_az',$slug)
                ->orWhere('slug_az',$slug)
                ->orWhere('slug_en',$slug)
                ->orWhere('slug_ru',$slug)
                ->firstOrFail();
            $products   = Product::where('service_id',$first->id)->paginate(20);
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

    public function prodoctDetails($id)
    {
        $product = Product::with('images','service')->findOrFail($id);

        $product->increment('hits');
        return view('front.pages.product-details', compact('product'));
    }
}
