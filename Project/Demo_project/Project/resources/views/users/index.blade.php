@extends('layout.master')
@section('content')
@include('layout.header')

<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-2 p-0 ">
            <div class="sidebar">   
                <header>Danh mục sản phẩm </header>       
                <ul class="sub">
                    <li><a href="{{URL::to('/add-category')}}">Thêm danh mục</a></li>
                    <li><a href="{{URL::to('/all-category')}}">Liệt kê danh mục</a></li>
                    <li><a href="{{URL::to('/add-product')}}">Thêm sản phẩm</a></li>
                    <li><a href="{{URL::to('/all-product')}}">Liệt kê sản phẩm</a></li>   
                </ul>
                <header>Danh mục tin tức </header> 
                <ul class="sub">
                    <li><a href="{{URL::to('/add-tloai')}}">Thêm thể loại</a></li>
                    <li><a href="{{URL::to('/list-tloai')}}">Danh sách thể loại</a></li>
                    <li><a href="{{URL::to('/add-ltin')}}">Thêm loại tin</a></li>
                    <li><a href="{{URL::to('/list-ltin')}}">Danh sách loại tin</a></li>
                    <li><a href="{{URL::to('/add-tintuc')}}">Thêm bài viết</a></li>
                    <li><a href="{{URL::to('/all-tintuc')}}">Danh sách bài viết</a></li>
                   
                </ul>   
            </div>
        </div>    
        <div class="col-10 d-block">
            <div class="row mt-3">
                @foreach($products as $pro)
                <div class="col-md-4">
                <form action="{{URL::to('/save-cart')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="card " style="width: 18rem;">
                       
                            <div class="d-flex justify-content-around ">
                                <img src="public/image/{{$pro->product_image}}"height="200" width="250">
                            </div>
                             <div class="card-body">
                                <div class="d-flex">
                                    <h4 class="card-title">{{$pro->product_name}}</h4>
                            
                                </div>
                                <a href="{{URL::to('thongtinsp/'.$pro->id)}}" >Chi tiết sản phẩm</a>

                                <h5 class="card-title">{{number_format($pro->product_price)}} VNĐ</h5>
                                
                                <label for="">Số lượng</label>
                                <input class="text-center" name="qty" type="number" min="1" value="1"> 
                                <input name="productid_hidden" type="hidden" value="{{$pro->id}}">
                                
                            
                                <button type="submit" class="btn btn-primary">Mua ngay</button>
                                 
                            </div>      
                    </div>
                </form>     
                </div>   
                @endforeach
            </div>
            
        </div>
    </div>
    <br>
    <span>{{ $products->render() }}</span>
</div>
@include('layout.footer')
@endsection
