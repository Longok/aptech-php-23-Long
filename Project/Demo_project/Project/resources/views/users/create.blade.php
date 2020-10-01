<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký tài khoản</title>
  <link rel="stylesheet" href="{{asset('/bootstrap.css')}}">
</head>
<body>
  
</body>
</html>

@if(count($errors)>0)

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
@endif 
<div class="container mt-3">
  <div class="div">
    <a href="{{route('users.index')}}">Quay lại trang chủ</a> 
  </div>
  <header class="col-xs-4 col-md-4 mx-auto text-primary">       
    Đăng ký tài khoản          
  </header>
 
 <div class="d-flex flex-row">
    <div class="col-12 px-0">
      <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group ">
          <label class="text-uppercase font-weight-bold" for="name">Name</label>
          <input type="text" class="form-control rounded-0" id="name" placeholder="Name" name="name">
        </div>
        <div class="form-group ">
          <label class="text-uppercase font-weight-bold" for="nickname">Nickname</label>
          <input type="text" class="form-control rounded-0" id="nickname" placeholder="NickName" name="nickname">
        </div>
        <div class="form-group ">
          <label class="text-uppercase font-weight-bold" for="email">email</label>
          <input type="email" class="form-control rounded-0" id="email" placeholder="Email" name="email">
        </div>
        <div class="form-group ">
          <label class="text-uppercase font-weight-bold" for="password">password</label>
          <input type="password" class="form-control rounded-0" id="password" placeholder="Password" name="password">
        </div>
        <div class="form-group ">
          <label class="text-uppercase font-weight-bold" for="re_password">Repassword</label>
          <input type="password" class="form-control rounded-0" id="re_password" placeholder="Repassword" name="re_password">
        </div>
        <div class="form-group ">
          <label class="text-uppercase font-weight-bold" for="roles">Roles</label>
          <input type="roles" class="form-control rounded-0" id="roles" placeholder="Roles" name="roles">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-danger text-uppercase rounded-0 font-weight-bold">
           Đăng ký
          </button> 
        </div>  
      </form>  
    </div>
  </div>
</div>
