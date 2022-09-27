<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BaseController extends Controller
{
    public function changeLanguage($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }

    public function changeCountry($country)
    {
        Session::put('selectedCountry', $country);
        return redirect()->back();
    }

    public function getTabCategories(Request $request)
    {
        $id = $request->get('value');

        $categories = Category::where('parent_id', $id)->get();

        return response()->json([
            'categories'=>$categories,
        ]);
    }

    public function getTabGalleryImages(Request $request)
    {
        $product_id = $request->get('value');
        $sl = $request->get('sl');

        $images = ProductImage::where('product_id', $product_id)->get();
        $product = Product::where('id', $product_id)->first();
        $gallery = '';
        foreach ($images as $key => $data){
            if($key == $sl){
                $gallery = $data;
            }
        }

        
        return array(
            'slider_view' => view('partials.product-details-slider', compact('gallery', 'product', 'sl'))->render(),
        );
    }

    public function loginAsSeller(Request $request)
    {
        $seller = Seller::where('email', $request->email)->first();

        if($seller->disabled == 0){
            Auth::guard('seller')->login($seller);

            session()->flash('success', 'Login Successfull!');
            return redirect()->route('seller.home');
        }
        else{
            session()->flash('error', 'Can not login a disabled seller account!');
            return redirect()->back();
        }
        
    }

}
