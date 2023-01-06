<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class ProfileController extends Controller
{
    public function index(Request $request){
        $tab = 'about';
        if ($request->has('tab')) {
            $tab = $request->query('tab');
        }

        return view('pages.profile.index', [
            'tab' => $tab
        ]);
    }

    public function editProfile(Request $request){
        $data = $request->all();

        // upload avatar
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/avatars'), $file_name);
            $data['avatar'] = $file_name;
        }

        $user = User::find($request->session()->get('user')->id);
        $user->update($data);

        $user = User::find($request->session()->get('user')->id);
        $request->session()->put('user', $user);

        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }

    public function changePassword(Request $request){
        if(!Hash::check($request->current_password, $request->session()->get('user')->password)){
            return redirect()->route('profile')->with('error', 'Current password is incorrect');
        }

        if($request->new_password != $request->confirm_password){
            return redirect()->route('profile')->with('error', 'New password and confirm password does not match');
        }

        $data['password'] = Hash::make($request->new_password);

        $user = User::find($request->session()->get('user')->id);
        $user->update($data);

        return redirect()->route('profile')->with('success', 'Password updated successfully');
    }
}
