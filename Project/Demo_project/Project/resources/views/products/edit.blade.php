@extends('layout.master')
@include('layout.header')

<div class="container"> 
@if(Session::has('thongbao'))
<div class="row">
{{Session::get('thongbao')}}
</div>
@endif
    <div class="row">
        <div class="col-lg-12">
            <section class="panel mt-3">
               
                <header class="col-md-6 mx-auto text-primary">Cập nhật sản phẩm</header>
                
                <div class="col-md-6 mx-auto">
                <?php
                    $message = Session::get('thongbao');
                    if($message){
                        echo '<span class="text-alert alert-danger mt-3">'.$message.'</span>';
                        session::put('thongbao',null);
                    }  
                ?>
                    <form action="{{URL::to('/update-product/'.$products->id)}}" method="post" enctype="multipart/form-data" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="mt-3">            
                            <label for="">Tên sản phẩm</label> 
                            <input type="text"class="form-control" placeholder="{{$products->product_name}}" name="product_name">        
                        </div>
                        <div class="mt-3">            
                            <label for="">Giá sản phẩm</label>       
                            <input type="text"class="form-control" placeholder="{{$products->product_price}}" name="product_price">        
                        </div>
                        <div class="mt-3">            
                            <label for="">Số lượng</label>      
                            <input type="text"class="form-control" placeholder="{{$products->product_unit}}" name="product_unit">            
                        </div>
                        <div class="mt-3">            
                            <label for="">Mô tả sản phẩm</label>   
                            <textarea type="text" class="form-control ckeditor" placeholder="" name="product_desc" >{{$products->product_desc}}</textarea> 
                        </div>
                        <div class="mt-3">           
                            <label for="">Danh mục </label>
                            <select class="form-control" name="product_cate">
                                <option value="0">Chọn danh mục</option>

                                    @foreach($categorys as $category)       
                                        <option value="{{$category->id}}">{{$category->cate_name}}</option>        
                                    @endforeach
                            </select>              
                        </div>
                        <div class="mt-3">           
                            <label for="name">Hình ảnh</label>  
                            <img src="{{URL::to('public/image/'.$products->product_image)}}"height="100" width="100">     
                            <input type="file" class="form-control rounded-0" id="name" placeholder="Hình ảnh sản phẩm" name="product_image">
                                     
                        </div>
                            <button type="submit" name="add_product" class="btn-primary mt-3">Cập nhật sản phẩm</button>
                        </div>
                    </form>    
            </section>        
        </div>
    </div>
</div> 


    
