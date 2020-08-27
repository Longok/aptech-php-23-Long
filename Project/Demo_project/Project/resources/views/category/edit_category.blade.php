<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa danh mục</title>
    <link rel="stylesheet" href="{{asset('/bootstrap.css')}}">
</head>
<body>
    
</body>
</html>

<div class="row">
    <div class="col-lg-12">
        <section class="panel mt-3">
       <a href="{{route('users.index')}}">Trang chủ</a>

            <header class="col-xs-4 col-md-4 mx-auto text-primary">
            
            Cập nhật danh mục sản phẩm
            
            </header>
            
            <?php
              $message = Session::get('thongbao');
              if($message){
                  echo '<span class="text-alert">'.$message.'</span>';
                  session::put('thongbao',null);
              }  
            ?>
            
                <div class="col-xs-4 col-md-4 mx-auto">
                    <form action="{{URL::to('update-category/'.$edit->id)}}" method="post" >
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="div mt-3">
                            <label for="">Tên danh mục sản phẩm gốc</label>
                            <input type="text"class="form-control" value="{{$edit->cate_name}}" ></input> 
                        </div>
                        <label for="">Tên danh mục sản phẩm</label>
                            <input type="text"class="form-control" name="edit_category" placeholder="Tên danh mục sản phẩm mới" ></input> 
                        <button type="submit" class="btn-primary mt-3">Cập nhật danh mục</button>
                    </form>
                </div>
               
        </section>        
    </div>
</div>