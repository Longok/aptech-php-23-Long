@extends('layout.master')
@include('layout.header')
        <div class="div mt-5">
           
              @if(Session::has('thongbao'))
              <div class="row">
              {{Session::get('thongbao')}}
              </div>
              @endif
        </div>
        <div class="div mt-3 text-primary">
          Liệt kê sản phẩm   
        </div>
      <?php
        $message = Session::get('thongbao');
        if($message){
          echo '<span class="text-alert alert-danger mt-3">'.$message.'</span>';
          session::put('thongbao',null);
          }  
      ?>
      <table class="table  table-bordered mt-5 text-primary">
            <thead>
              <tr class="text-center">
                <th scope="col" class="">#</th>
                <th scope="col" class="">Tên sản phẩm</th>
                <th scope="col" class="">Danh mục sản phẩm</th>
                <th scope="col" class="">Hình ảnh sản phẩm</th>
                <th scope="col" class="">Giá sản phẩm</th>
                <th scope="col" class="">Mô tả sản phẩm</th>
                <th scope="col" class="">Số lượng sản phẩm</th>
                <th scope="col" class="">Sửa/Xóa</th>   
              </tr>
            </thead>
            <tbody>
              @foreach($products as $product)
              <tr class="text-center">
                <td>{{$product->id}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{$product->category_product->cate_name}}</td> 
                <td><img src="public/image/{{$product->product_image}}"height="100" width="100"></td>
                <td>{{$product->product_price}} VNĐ</td>
                <td>{{$product->product_desc}}</td>
                <td>{{$product->product_unit}}</td>
                <td>     
                  <a href="{{URL::to('edit-product/'.$product->id)}}">Sửa</a>
            
                  <a href="{{URL::to('delete-product/'.$product->id)}}">Xóa</a>    
                </td>      
              </tr>
              @endforeach          
            </tbody>
        </table>
        <br><br>
        
          <span>{{ $products->render() }}</span>


       