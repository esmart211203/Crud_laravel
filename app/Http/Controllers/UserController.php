<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;    
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function __construct(){
        $this->middleware('IsAdmin');
    }
    public function index(){
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
    public function create(){
        return view('admin.user.create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'avatar' => 'nullable|image|max:2048',
            'password' => 'required|string|min:8,max:255',
            'role' => 'required|string',
        ]);
        //create user
        $user = new User();
        $user->name = $validatedData['name'];
        $user->phone = $validatedData['phone'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->role = $validatedData['role'];
        //avatar
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $filename = 'user'. '-'.time().rand(1,999). '.' .$image->extension();
            $image->move(public_path('images/users'), $filename);
            $user->avatar = $filename;
        }
        $user->save();
        return redirect()->route('user.index')->with('success','Thêm thành công người dùng!');
    }
    public function destroy(Request $request, $user_id){
        $user = User::find($user_id);
        if (!$user) {
            return back()->with('error', 'user not found');
        }   
        $user->delete();
        return redirect()->route('user.index')->with('destroy','Đã xóa thành công người dùng!');
    }
    public function edit($user_id){
        $user = User::find($user_id);
        if (!$user) {
            return back()->with('error', 'user not found');
        }   
        return view('admin.user.edit', compact('user'));
    }
    public function update(Request $request, $user_id){
        $user = User::find($user_id);
        if (!$user) {
            return back()->with('error', 'Người dùng không tồn tại');
        }
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user_id,
            'avatar' => 'nullable|image|max:2048',
            'password' => 'required|string|min:8,max:255',
            'role' => 'required|string',
        ]);
        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                $oldImagePath = public_path('images/users/' . $user->avatar);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            // Upload avagtar
            $avatar = $request->file('avatar');
            $avatarName = time().'.'.$avatar->getClientOriginalExtension();
            $avatar->move(public_path('images/users'), $avatarName);
            $user->avatar = $avatarName;
        }
        $user->name = $validatedData['name'];
        $user->phone = $validatedData['phone'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->role = $validatedData['role'];
        $user->save();
        return redirect()->route('user.index')->with('success','Đã cập nhật thành công người dùng!');
    }
    
}
