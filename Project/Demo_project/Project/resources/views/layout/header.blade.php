<div class="header">
    <div class="col-12 ">
      <div class="d-flex ">
        
        <div class="col-3">
          <div class="d-flex mx-auto">
            <h1 class=" font-weight-bold text-white ">G-Nol </h1>
            <i class="fas fa-donate" style="font-size:36px;color:#0099FF;"></i>
            <h1 class=" font-weight-bold text-white ">hop </h1>
          </div>
          <div class="home">
            <a href="{{route('users.index')}}">Trang chủ</a> 
          </div>
          
        </div>
        
        <div class="col-6 text-left m-0">
         
        </div>
        <div class="col-3 mt-3 d-block">
          
          <a href =""><i class="fas fa-user" style="font-size:30px;color:blue;"></i></a>
          @if(Auth::check())
            
            {{"Xin chào"}} {{Auth::user()->name}}
           
            <a href ="{{URL::to('/logout')}}">Đăng Xuất</a> 
          @else
            <a href ="{{URL::to('/login')}}">Đăng nhập</a>
          @endif
        
        </div>
      </div>
    </div>
</div>