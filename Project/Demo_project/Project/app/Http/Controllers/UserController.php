<?php

namespace App\Http\Controllers;
use App\User;
use App\Product;
use App\Theloai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Illuminate\pagination\Environment;
use App\Http\Requests;




class UserController extends Controller
{
    
    //Hiển thị sản phẩm trên trang chú 
    public function index()
    {
       $products = Product::orderBy('id','desc')->paginate(6);
        return view('users.index',compact('products')
        );
    }

    public function users()
    {
       $users = User::all();
        return view('users.users',[
            'users'=>$users
        ]);
    }
    
    //Tạo tài khoản
    public function create()
    {
        return view('users.create');
    }

    //Lưu tài khoản
    public function store(Request $request)

    {   
        
         $this->validate($request,
        [
        'email'=>'required|email|unique:users,email',
        'password'=>'required|min:6|max:20',
        're_password'=>'required|same:password'
        ],
        [
           'email.required'=>'Chưa nhập Email',
           'email.email'=>'Email không đúng cú pháp',
           'email.unique'=>'Email đã được sử dụng',
           'password.required'=>'Nhập mật khẩu',
           'password.min'=>'Độ dài từ 6 đến 20 ký tự',
           're_password.required'=>'Nhập lại mật khẩu không chính xác',
           're_password.same'=>'Mật khẩu không giống nhau', 
        ]);
        
        $user = new User();
     
        $user->name =$request->name;
        $user->email=$request->email;
        $user->nickname=$request->nickname;
        $user->password=Hash::make($request->password);
        
        $user->save();
        return redirect()->back()->with('thongbao','Tạo tài khoản thành công');
    }

    //Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/trangchu'); 
    }


    //Xóa tải khoản
    public function destroy($id)
    {
       $user = User::where('id',$id);
       $user->delete();

        return redirect('/users');
    }

    public function getlogin()
    {
        return view('users.login');
    }

    public function postlogin(Request $request)
    {   
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:3|max:32'
        ],[
            'email.required'=>'Bạn chưa nhập Email',
            'password.required'=>'Bạn chưa nhập Password',
            'password.min'=>'Password không được nhỏ hơn 3',
            'password.max'=>'Password không được lớn hơn 32'
        ]);
        
        if(Auth::Attempt([
            'email'=>$request->email,
            'password'=>$request->password
            ]))
        {
            return redirect('check-out')->with('thongbao','Đăng nhập thành công');
        }
        else
        {
            return redirect()->back()->with('thongbao','Địa chỉ Email hoặc mật khẩu không đúng');
        }
    }


    
}
