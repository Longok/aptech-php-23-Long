@extends('layout.master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán đơn hàng</title>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="{{asset('/bootstrap.css')}}">
    
</head>
<body>
<div class="container"> 

    <a href="{{route('users.index')}}">Quay lại trang chủ</a> 
    
    <div class="row mt-4 text-primary">
 
        <div class="col-lg-6 mx-auto">
            <section class="panel mt-3">
               
                <header class="col-md-6 mx-auto     ">Thanh toán đơn hàng</header>
              
                    <form action="{{URL::to('/save-product')}}" method="post" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="mt-3">            
                            <label for="">Tên khách hàng</label> 
                            <input type="text"class="form-control" placeholder="Họ và tên" name="">        
                        </div>
                        <div class="mt-3">            
                            <label for="">Số điện thoại</label>       
                            <input type="text"class="form-control" placeholder="Số điện thoại" name="">        
                        </div>
                        <div class="mt-3">            
                            <label for="">Ghi chú</label>
                                
                            <textarea type="text" class="form-control ckeditor" placeholder="Ghi chú" name="product_desc" ></textarea> 
                        </div>
                        <div class="mt-3">            
                            <label for="">Địa chỉ</label>      
                            <select class="form-control choose thanhpho" name="matp" id="thanhpho" >
                                    <option value="0">--Chọn thành phố--</option>
                                    @foreach($thanhpho as $tp)       
                                        <option value="{{$tp->matp}}">{{$tp->name_tp}}</option>        
                                     @endforeach
                            </select>
                            <select class="form-control mt-3 choose quanhuyen" name="maqh" id="quanhuyen" >
                                    <option value="0">--Chọn quận huyện--</option>
                                    @foreach($quanhuyen as $qh)       
                                        <option value="{{$qh->maqh}}">{{$qh->name_qh}}</option>        
                                     @endforeach
                            </select> 
                            <select class="form-control mt-3 choose xaphuong " name="xaid" id="xaphuong" >
                                    <option value="0">--Chọn xã phường--</option>
                                    @foreach($xaphuong as $xp)       
                                        <option value="{{$xp->xaid}}">{{$xp->name_xp}}</option>        
                                     @endforeach
                            </select>
                            <input type="text"class="form-control mt-3" placeholder="Số nhà" name="">             
                        </div>
                        <button type="button" name="thanhtoan" class="btn-primary mt-3 thanhtoan">Thanh toán</button>
                        
                    </form>    
            </section>        
        </div>
    </div>
</div> 
</body>
</html>
@endsection
@section('script')
  <script>
    $(document).ready(function(){

        $('.choose').change(function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            if(action =='thanhpho'){
                result = 'quanhuyen';
            }else{
                result = 'xaphuong';    
            }
            $.ajax({
                url:'{{url('/diachi')}}',
                method: 'post',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                    $('#'+result).html(data);    
                }
            });
        });  
    })
  </script>                  
@endsection


    
