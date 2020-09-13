@extends('layout.master')
@section('content')
@include('layout.header')
<div class="row">
    <div class="col-lg-12">
        <section class="panel mt-3">
            <header class="col-xs-4 col-md-4 mx-auto text-primary">
             Thêm danh mục sản phẩm
            </header> 
            <?php
              $message = Session::get('thongbao');
              if($message){
                  echo '<span class="text-alert">'.$message.'</span>';
                  session::put('thongbao',null);
              }  
            ?>
                <div class="col-xs-4 col-md-4 mx-auto">
                    <form action="{{route('save_category')}}" method="post" enctype="multipart/form-data" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="div mt-3">
                            <label for="">Tên danh mục sản phẩm</label>
                            <textarea type="text"class="form-control" name="category_product"placeholder="Tên danh mục sản phẩm" ></textarea> 
                        </div>
                
                        <button type="submit" name="add_category" class="btn-primary mt-3">Thêm danh mục</button>
                    </form>
                </div>
        </section>        
    </div>
</div>
@endsection