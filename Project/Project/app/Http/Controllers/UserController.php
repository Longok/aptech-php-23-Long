<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
//thêm thư viện Hash vào



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users = User::all();
        return view('users.index',[
            'users'=>$users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {   
        
         $this->validate($request,
        [
        'email'=>'required|email|unique:users,email',
        'password'=>'required|min:6|max:20',
        're_password'=>'required|same:password'
        ],
        [
           'email.required'=>'nhap email',
           'email.email'=>'khong dung cu phap email',
           'email.unique'=>'email da duoc su dung',
           'password.required'=>'nhap dung mat khau',
           'password.min'=>'do dai tu 6 den 20 ky tu',
           're_password.required'=>'nhap mat khau',
           're_password.same'=>'mat khau khong giong nhau,nhap lai', 
        ]);
        
        $user = new User();
        //dd($request->Anhdaidien);
        if($request->hasFile('Anhdaidien')){
            $file=$request->file('Anhdaidien');
            if($file->getClientOriginalExtension('Anhdaidien') =="png"||
                $file->getClientOriginalExtension('Anhdaidien')=="jpg"){
                $file_name=$file->getClientOriginalName('Anhdaidien');
                $file->move('image',$file_name);
                $user->Anhdaidien = $file_name;       
            }
            else {
                return null;
                
            }
            
        }
        else {
            $user->Anhdaidien = null;
        }
        $user->name =$request->name;
        $user->email=$request->email;
        $user->nickname=$request->nickname;
        $user->password=$request->password;
        //chưa mã hóa mật khẩu
        
        $user->save();
        return redirect()->back()->with('thongbao','them thanh cong');
        //thay đổi lại nội dung thông báo cho phù hợp vd: tạo tài khoản thành công!
        //sau đó mời người dùng đăng nhập ngay!
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
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
            'email.required'=>'ban chua nhap email',
            'password.required'=>'ban chua nhap password',
            'password.min'=>'password khong duoc nho hon 3',
            'password.max'=>'password khong duoc lon hon 32',//thừa dấu ','
        ]);
        // $arr= [
        //     'email'=>$request->email,
        //     'password'=>$request->password
        // ];
        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
            ]))
            //chưa khai báo thư viện Auth
        {
            return redirect('users.index')->with('thongbao','dang nhap thanh cong');
            //chuyển qua trang chủ thì không cần hiển thị thông báo 
        }
        else
        {
            return redirect()->back()->with('thongbao','sai tk hoac mk');
            //thông báo phải là: địa chỉ email hoặc mật khẩu không chính xác
        }
    }
}
