<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sepet;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
       // $urunler=Product::orderBy('price','ASC')->get();
       $urunler=Product::paginate(6);
       return view('front.urunler',compact('urunler'));
    }
    public function sepeteEkle(Request $request)
    {
       $varmi=Sepet::where('urun_id',$request->urun_id)->where('user_id',Auth::user()->id)->first();
       if($varmi)
       {
         $urun=Product::whereId($request->urun_id)->first();
          $adet=$varmi->adet;
          $adet++; 
          $varmi->fiyat=$urun->price*$adet;
          $varmi->adet=$adet;
          $varmi->save();         
       }
       else
       {
         $urun=Product::whereId($request->urun_id)->first();
         $ekle=new Sepet;
         $ekle->urun_id=$request->urun_id;
         $ekle->user_id=Auth::user()->id;
         $ekle->adet=1;
         $ekle->fiyat=$urun->price;
         $ekle->save();      
      }
       
       
       $sepet=Sepet::where('user_id',Auth::user()->id)->get()->sum('adet');
       return response()->json($sepet);
    }
    public function sepet()
    {
        $sepetim=Sepet::where('user_id',Auth::user()->id)->with('getUrun')->get();
        return view('front.sepet',compact('sepetim'));
    }
}
