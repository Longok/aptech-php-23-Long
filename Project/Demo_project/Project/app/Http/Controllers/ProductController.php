<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\pagination\Environment;
use Hash;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;


class ProductController extends Controller
{   
  public function add_product()// nên đặt tên là: create
  {
     $add_product=DB::table('product')->get(); 
     return view('products.add_product');
  }
  

  public function all_product() //index
  {
      $products = DB::table('product')->get();

      return view('products.all_product',[
        'products'=>$products
      ]);
  }

  public function save_product(Request $request) //store
  {
        $data =array();
        $data['product_name']= $request->product_name;
        $data['product_price']= $request->product_price;
        $data['product_image']= $request->product_image;
        $get_image = $request->file('product_image');

        if($get_image){
          $get_image_name = $get_image->getClientOriginalName();
          $name_image = current(explode('.',$get_image_name));
          $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
          $get_image -> move('public/image',$new_image);
          $data['product_image'] = $new_image;

          DB::table('product')->insert($data);
          Session::put('thongbao','Thêm danh mục sản phẩm thành công');
          return Redirect::to('add-product');      
        }
       
        $data['product_image'] == '';
       
        DB::table('product')->insert($data);
        Session::put('thongbao','Thêm danh mục sản phẩm thành công');
        return redirect::to('add-product');

   }

   public function address()
   {
     return view('users.address');
   }

   public function tinhthanh() //getCity
   {
     $thanhpho = DB::table('devvn_tinhthanhpho')->get();
     $quanhuyen = DB::table('devvn_quanhuyen')->get();
     $xaphuong = DB::table('devvn_xaphuongthitran')->get();
       //không in dữ liệu kiểu này!
       //nên tạo ra một table mới lưu địa chỉ từng user một!
     return view('users.address',[
       'thanhpho'=>$thanhpho,
       'quanhuyen'=>$quanhuyen,
       'xaphuong'=>$xaphuong
     ]);
       //nên dùng compact 
       //vd: return view('users.address',compact('thanhpho','quanhuyen','xaphuong');
   }
  //  public function gettinhthanh($idmatp)
  //  {
  //     $maqh = DB::table('devvn_tinhthanhpho')::where('idmatp',$idmatp)->get();
  //     foreach($maqh as $qh)
  //     {
  //       echo "<option value='".$qh->maqh."'>".$qh->name."</option>"; 
  //     }
  //  }


   

    // public function createProduct()
    // {
    //     return view('product.product');
    // }

    // public function add_product(Request $request)
    // {
    //     $this->validate($request,
    //     [
    //     'ten san pham'=>'required',
    //     'gia san pham'=>'required',
    //     'hinh anh san pham'=>'required'
    //     ],
    //     [
    //        'ten san pham.required'=>'Chưa nhập tên sản phẩm',
    //        'gia san pham.required'=>'Chưa nhập giá sản phẩm',
    //        'hinh anh san pham.required'=>'Chưa có hình ảnh sản phẩm'
           
    //     ]);
    //     $product= new Product();
        
    //     if($request->hasFile('anhhienthi')){
    //         $file=$request->file('anhhienthi');
    //         if($file->getClientOriginalExtension('anhhienthi') =="png"||
    //             $file->getClientOriginalExtension('anhhienthi')=="jpg"){
    //             $file_name=$file->getClientOriginalName('anhhienthi');
    //             $file->move('image',$file_name);
    //             $user->anhhienthi = $file_name;       
    //         }
    //         else {
    //             return view('product.product');
                
    //         }
            
    //     }
    //     else {
    //         $user->anhhienthi = null;
    //     }
    //     $product->tensanpham =$request->product_name;
    //     $product->giasanhpam =$request->product_price;
    //     $product->anhhienthi=$request->product_image;

    //     $product->save();
    //     return view('product.product')->with('thongbao','Thêm sản phẩm thành công');
    // }

}
