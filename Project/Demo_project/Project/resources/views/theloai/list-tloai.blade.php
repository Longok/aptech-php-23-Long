
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục sản phẩm</title>
    <link rel="stylesheet" href="{{asset('/bootstrap.css')}}">
    </head>
    <body>
        <div class="div mt-3">
            <a href="{{route('users.index')}}">Trang chủ</a>
            
        </div>
       
        <div class="sidebar mt-3">
      
            <div class="text-primary">
                Liệt kê danh mục thể loại
                
            </div>  
            <a href="{{URL::to('/add-tloai')}}">Thêm thể loại</a>    
        </div>
        <table class="table table-hover table-bordered mt-5">
            <thead>
                <tr class="text-center">
                    <th scope="col-4" class="">#</th>
                    <th scope="col-4" class="">Tên danh mục </th>
                    <th scope="col-4" class="">Sửa | Xóa</th>
                </tr>
            </thead>
            <tbody>
            @foreach($tloai as $tl)
            <tr class="text-center">
                <td scope="row">{{$tl->id}}</td>
                <td scope="row">{{$tl->name}}</td>
                <td>
               
                    <a href="{{URL::to('/edit-tloai/'.$tl->id)}}">Sửa</a>
                    |
                    <a href="{{URL::to('/delete-tloai/'.$tl->id)}}">Xóa</a>
                
                </td>
            </tr>
            @endforeach
            </tbody>
                
        </table> 
    </body>
</html>
