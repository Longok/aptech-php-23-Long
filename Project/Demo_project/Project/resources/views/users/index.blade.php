@extends('layout.master')
@section('content')
@component('layout.components.title')
index page
@endcomponent

<div class="col-xs-4 col-md-4 mx-auto">
          @if($errors->any())
            <div class="div">
              @foreach($errors->all() as $err)
                <li>{{$err}}</li>
              @endforeach
            </div>
          @endif
          @if(Session::has('thongbao'))
            <div class="mt-3 text-white text-center bg-danger">
              {{Session::get('thongbao')}}
            </div>
           @endif  
</div>
<table class="table table-hover table-bordered mt-5">
        <thead>
          <tr class="text-center">
            <th scope="col" class="">#</th>
            <th scope="col" class="">NickName</th>
            <th scope="col" class="">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
          <tr>
            <td scope="row">{{$user->id}}</td>
            <td>{{$user->nickname}}</td>
            <td>
              <form action="{{route('users.destroy',$user->id)}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="delete">
                <button>Xoa</button>
              </form>
            </td>
          
          </tr>
        @endforeach
        </tbody>
</table>           

@endsection
//ok
