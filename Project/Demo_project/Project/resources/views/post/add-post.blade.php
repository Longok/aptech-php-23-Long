<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="{{asset('/bootstrap.css')}}">
</head>
<body>
    
</body>
</html>

<!-- @if(count($errors)>0)

  @foreach($errors->all() as $err)
  <div class="alert-danger alert">
  {{$err}}
  </div>
  @endforeach 
@endif
@if(Session::has('thongbao'))
<div class="row">
{{Session::get('thongbao')}}
</div>
@endif  -->
<div class="row">
    <div class="col-lg-12">
        <section class="panel mt-3">
       <a href="{{route('users.index')}}">Trang chủ</a>
     
            <header class="col-xs-4 col-md-4 mx-auto text-primary">
            
            Thêm bài viết
            
            </header>
            
            <?php
              $message = Session::get('thongbao');
              if($message){
                  echo '<span class="text-alert">'.$message.'</span>';
                  session::put('thongbao',null);
              }  
            ?>
                <div class="col-xs-4 col-md-4 mx-auto">
                    <form action="{{URL::to('/save-post')}}" method="post" enctype="multipart/form-data" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="div mt-3">
                                <label for="">Tên bài viết</label>
                                <input type="text"class="form-control" placeholder="Tên bài viết" name="title"> 
                            </div>
                            <!-- <div class="div">
                                <label for="">Slug bài viết</label>
                                <input type="text"class="form-control" placeholder="Tiêu đề bài viết" name="slug"> 
                            </div> -->
                            <div class="div">
                                <label for="">Mô tả bài viết</label>
                                <input type="text"class="form-control" placeholder="Mô tả bài viết" name="description"> 
                            </div>
                            // tích hợp ckeditor để thêm content
                            <div class="div">
                                <label for="">Nội dung bài viết</label>
                                <textarea  class="form-control" placeholder="Nội dung bài viết" name="content"></textarea> 
                            </div>
                            
                            <div class="div">
                                <select class="form-control mt-3" name="theloai_id">
                                    <option value="0">Chọn danh mục</option>
                                    <!-- <input type="text" class="form-control" name="theloai_id"> -->
                                    // dùng một vòng lặp foreach
                                    
                                    @foreach($theloai as $tl)
                                        @if($tl->theloai_id ==0)//?
                                        //theloai_id lấy ở đâu ra?
                                        
                                            <option value="{{$tl->id}}">{{$tl->name}}</option>
                                            @foreach($theloai as $tloai )
                                                @if($tloai->theloai_id |=0 && $tloai->theloai_id ==$tl->id)
                                                <option value="{{$tloai->id}}">{{$tloai->name}}</option>      

                                                @endif
                                            @endforeach
                                        @endif       
                                    @endforeach
                                    
                                </select>    
                            </div>
                            <div class="div">  
                                <label for="name">Hình ảnh bài viết</label>
                                <input type="file" class="form-control rounded-0" id="name" placeholder="Hình ảnh bài viết" name="post_image" >
                            </div>
                   
                            <button type="submit" name="add_post" class="btn-primary mt-3">Thêm bài viết</button>
                        </form> 
                </div>
        </section>        
    </div>
</div>
