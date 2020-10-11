@extends('layout.master')
@section('content')
@include('layout.header')
   
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-2 p-0 ">
            <div class="sidebar">   
                <header>Danh mục sản phẩm </header>       
                <ul class="sub">
                    <li> <a href="#"class="DM"> Danh mục </a>
                        <ul class="droplow">
                            <li><a href="{{URL::to('/add-category')}}">Thêm danh mục</a></li>
                            <li><a href="{{URL::to('/all-category')}}">Liệt kê danh mục</a></li>
                        </ul>
                    </li>    
                    <li><a href="#"class="DM1">Sản phẩm</a>
                        <ul class="droplow1">
                            <li><a href="{{URL::to('/add-product')}}">Thêm sản phẩm</a></li>
                            <li><a href="{{URL::to('/all-product')}}">Liệt kê sản phẩm</a></li> 
                        </ul>  
                    </li>          
                </ul>
                <header>Danh mục tin tức </header> 
                <ul class="sub">
                    <li><a href="#"class="DM2">Thể loại </a>
                        <ul class="droplow2">
                            <li><a href="{{URL::to('/add-tloai')}}">Thêm thể loại</a></li>
                            <li><a href="{{URL::to('/list-tloai')}}">Danh sách thể loại</a></li>
                        </ul>
                    </li>
                    <li><a href="#"class="DM3">Loại tin</a> 
                        <ul class="droplow3">
                            <li><a href="{{URL::to('/add-ltin')}}">Thêm loại tin</a></li>
                            <li><a href="{{URL::to('/list-ltin')}}">Danh sách loại tin</a></li>
                        </ul>
                    </li>    
                    <li><a href="#"class="DM4">Tin tức</a>
                        <ul class="droplow4">
                             <li><a href="{{URL::to('/add-tintuc')}}">Thêm bài viết</a></li>
                             <li><a href="{{URL::to('/all-tintuc')}}">Danh sách bài viết</a></li>
                        </ul> 
                    </li>     
                </ul>   
            </div>
        </div>    
    </div>    
</div>
<script>
$('.DM').click(function(){
    $(' ul.droplow').toggleClass("show");
});
$('.DM1').click(function(){
    $(' ul.droplow1').toggleClass("show1");
});
$('.DM2').click(function(){
    $(' ul.droplow2').toggleClass("show2");
});
$('.DM3').click(function(){
    $(' ul.droplow3').toggleClass("show3");
});
$('.DM4').click(function(){
    $(' ul.droplow4').toggleClass("show4");
});
</script> 
@include('layout.footer')
@endsection
