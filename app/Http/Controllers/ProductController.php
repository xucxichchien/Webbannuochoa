<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class ProductController extends Controller
{
    function insert(Request $req)
    {
        
       $name= $req->get('pname');
       $price= $req->get('pprice');
       $details= $req->get('pdetails');
       $brandid= $req->get('pbrandid');
       $brandname=$req->get('pbrandname');
       $categoryid= $req->get('pcategoryid');
       $categoryname= $req->get('pcategoryname');
       
       $pimage= $req->file('image')->getClientOriginalName();
        // move uploaded file
        $req->image->move(public_path(('images'),$pimage));
        
        $prod = new product();
        $prod ->PName = $name;
        $prod ->PPrice = $price;
        $prod ->PDetails = $details;
        $prod ->PImage = $pimage;
        $prod ->BrandID = $brandid;
        $prod ->CategoryID = $categoryid;
        
        
        $prod ->save();
       
        return redirect(('/'));
    }
        function readdata()
        {
            $bdata = brand::all() ;
            $pdata = product::all();
            return view('insert',['data'=>$pdata],['rows'=>$bdata]);
        }
    function updateordelete(Request $req)
    {
         $id = $req->get('id');
         $name = $req->get('name');
         $price = $req->get('price');
         $details = $req->get('details');
         $image= $req->get('image');
         if($req->get('update') == 'Update')
         {
            return view('update',['pid'=>$id,'pname'=>$name,'pprice'=>$price,'pdetails'=>$details,'pimage'=>$image]);
         }
         else{
         $prod = product::find($id);
         $prod->delete();
         }
         return redirect('/');
    }
    function update(Request $req){
        $ID = $req->get('id');
        $Name = $req->get('name');
        $Price = $req->get('price');
        $Details = $req->get('details');
        $Image = $req->get('image');
        
        $prod = product::find($ID);
        $prod->PName =$Name;
        $prod->PPrice =$Price;
        $prod->PDetails =$Details;
        $prod->PImage =$Image;
        $prod->save();
        return redirect('/insert');
    }
}
