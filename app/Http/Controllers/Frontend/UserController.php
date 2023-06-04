<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\Contracts\LogoutResponse;
use Intervention\Image\Facades\Image;
class UserController extends Controller
{

    public function login(){
        return view('frontend.user.login.login_page');
    }
    public function ShowProfilePage(){
        $user_data = Auth::user();
        return view('frontend.user.profile.userprofile', compact('user_data'));
    }
    public function UpdateProfile(Request $request, $user_id){
        $user_data = User::find($user_id);
        $user_data->name=$request->name;
        $user_data->email=$request->email;
        $user_data->phone=$request->phone;
        $user_data->date_of_birth=$request->birthdate;

        if (isset($request->profile_image)){
            $image = $request->file('profile_image');

            $filename = time().'.'.$request->file('profile_image')->getClientOriginalExtension();
            Storage::putFileAs('public/user/profile_image', $request->file('profile_image'), $filename);
            // echo 
            $destinationPath =  storage_path('app/public/user/profile_image');
            // exit;
            $img = Image::make($image->path());
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$filename);

            //remove old image
            if($user_data->profile_photo_path){
                $old_filename = public_path("storage\category_icon\\" . $user_data->profile_image);
                if (file_exists($old_filename) != false) {
                    unlink($old_filename);
                }
            }

            $user_data->profile_photo_path = $filename;

            $user_data->update();
        }
        return redirect()->back();
        
    }
    public function ShowChangePass(){
        $id = Auth::user()->id;
    	$user = User::find($id);
        return view('frontend.user.change_password.change_password',compact('user'));
    }

    public function UserChangePassword(Request $request){
        $validateData = $request->validate([
			'oldpassword' => 'required',
			'password' => 'required|confirmed',
		]);

		$hashedPassword = Auth::user()->password;
		if (Hash::check($request->oldpassword,$hashedPassword)) {
			$user = User::find(Auth::id());
			$user->password = Hash::make($request->password);
			$user->save();
			Auth::logout();
			return redirect()->route('user.logout');
		}else{
			return redirect()->back();
		}
    }
    public function loginOrSignup(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();
        if($user&& !Hash::check($request->input('password'), $user->password)){
            $notification = array(
                'message' => 'Incorrect Password',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);   
        }

        if ($user){
            if (Hash::check($request->input('password'), $user->password)) {
                // User exists and password matches, log them in
                Auth::login($user);
                    $notification = array(
                        'message' => 'Login Successfully',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('front_index')->with($notification);         
            }
        }
        else {
            // User does not exist, create a new account
            $user = new User();
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();

            // Log the new user in
            Auth::login($user);
            $notification2 = array(
                'message' => 'Login Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification2);
        }

        // If we haven't redirected yet, the login or signup failed
        return redirect()->back()->withErrors(['email' => 'Invalid login or signup details.']);
    }
    public function destroy(Request $request): LogoutResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return app(LogoutResponse::class);
        return redirect()->url("/");
    }
}
