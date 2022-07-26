<?php 
 
namespace App\Http\Controllers; 
 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\DB; 
use App\Models\User; 
use Illuminate\Support\Facades\Auth; 
 
class UserController extends Controller 
{ 
 public function show() 
{ 
return view('auth.register'); //return register page 
} 
public function showLogin() 
 { 
return view('auth.login'); //return login page 
} 
 public function login(Request $request) 
{ 
$validator = Validator::make($request->all(), [ 
'email' => 'required|email', 
'password' => 'required', 
]); 
if ($validator->fails()) { 
return redirect()->back() 
->withErrors($validator) 
 ->withInput(); 
} 
 $remember = $request->remember; 
 if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) { 
if (Auth::user()->role == 2) { 
 return view('home'); 
} else { 
   return view('admin'); 
        } 
    } 
 } 
function store(Request $request) 
 { 
 
if ($request->isMethod('POST')) { 
   $validator = Validator::make($request->all(), [ 
    'email' => 'required|email|max:100', 
     'name' => 'required|min:6|max:1000', 
     'password' => 'required|confirmed|max:16|min:6', 
 ]); 
 if ($validator->fails()) { 
  return redirect()->back() 
   ->withErrors($validator) 
   ->withInput(); 
  } 
{
 } 
$user = DB::table('users')->where('email', $request->email)->first(); 
if (!$user) { 
 $newUser = new User(); 
$newUser->email = $request->email; 
$newUser->password = $request->password; 
$newUser->name = $request->name; 
$newUser->role = $request->role; 
$newUser->save(); 
 return redirect()->route('welcome.login')->with('message', 'Create success!'); 
} else { 
return redirect()->route('welcome.login')->with('message', 'Create failed!'); 
 } 
} 
} 
public function logout() 
 { 
 Auth::logout(); 
 
return redirect()->route('welcome.login'); 
} 
} 
