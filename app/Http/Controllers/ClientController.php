<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\Websitemail;
use App\Models\Client;
use App\Models\City;

class ClientController extends Controller
{
    public function ClientLogin(){

        return view('client.client_login');

    } // End Method

    public function ClientDashboard(){

        return view('client.index');

    } // End Method


    public function ClientLoginSubmit(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $check = $request->all();
        $data = [
            'email' => $check['email'],
            'password' => $check['password'],
        ];

        if (Auth::guard('client')->attempt($data)) {
            return redirect()->route('client.dashboard')->with('success','Login Successfully');
        }else{
            return redirect()->route('client.login')->with('error','Invalid Creadentials');
        }

    } // End Method


    public function ClientRegister(){

        return view('client.client_register');

    } // End Method


    public function ClientForgetPassword(){

        return view('client.forget_password');

    } // End Method


    public function ClientPasswordSubmit(Request $request){

        $request->validate([
            'email' => 'required|email',
        ]);

        $client_data = Client::where('email',$request->email)->first();
        if (!$client_data) {
            return redirect()->back()->with('error','Email Not Found');
        }
        $token = hash('sha256',time());
        $client_data->token = $token;
        $client_data->update();

        $reset_link = url('client/reset-password/'.$token.'/'.$request->email);
        $subject = "Reset Password";
        $message = "Please Click on below linke to reset password<br>";
        $message .= "<a href = '".$reset_link."'>Click Here</a>";

         \Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->back()->with('success','Reset Password Link Send on your Email');

    } // End Method


    public function ClientResetPassword($token, $email){

        $client_data = Client::where('email',$email)->where('token',$token)->first();
        if (!$client_data) {
            return redirect()->route('admin.login')->with('error','Invalid Token or Email Address');
        }
        return view('client.reset_password',compact('token','email'));

    } // End Method


    public function ClientResetPasswordSubmit(Request $request){

        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        $client_data = Client::where('email',$request->email)->where('token',$request->token)->first();
        $client_data->password = Hash::make($request->password);
        $client_data->token = "";
        $client_data->update();

        return redirect()->route('client.login')->with('success','Password Reset Successfully');

    } // End Method


    public function ClientRegisterSubmit(Request $request){

        $request->validate([
            'name' => ['required','string','max:200'],
            'email' => ['required','string','unique:clients']
        ]);

        Client::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role' => 'client',
            'status' => '0',
        ]);

        $notification = array(
            'message' => 'Client Register Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('client.login')->with($notification);

    } // End Method


    public function Clientlogout(){

        Auth::guard('client')->logout();
        return redirect()->route('client.login')->with('success','Logout Success');

    } // End Method


    public function ClientProfile(){

        $city = City::latest()->get();
        $id = Auth::guard('client')->id();
        $profileData = Client::find($id);

        return view('client.client_profile',compact('profileData','city'));

    } // End Method


    public function ClientProfileStore(Request $request){

        $id = Auth::guard('client')->id();
        $data = Client::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->info = $request->info;
        $data->city_id = $request->city_id;

        $oldPhotoPath = $data->photo;
        $oldCoverPhotoPath = $data->cover_photo;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/client_images'),$filename);
            $data->photo = $filename;

            if ($oldPhotoPath && $oldPhotoPath !== $filename) {
                $this->deleteOldImage($oldPhotoPath);
            }
        }

        if ($request->hasFile('cover_photo')) {
            $file_one = $request->file('cover_photo');
            $filename_one = time().'.'.$file_one->getClientOriginalExtension();
            $file_one->move(public_path('upload/client_images'),$filename_one);
            $data->cover_photo = $filename_one;

            if ($oldCoverPhotoPath && $oldCoverPhotoPath !== $filename_one) {
                $this->deleteOldCoverImage($oldCoverPhotoPath);
            }
        }

        $data->save();

        $notification = array(
            'message' => 'Profile Updated Success',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method


    private function deleteOldImage(string $oldPhotoPath): void {
        $fullPath = public_path('upload/client_images/'.$oldPhotoPath);

        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    } // End Private Method for Unlink Existing Client Images


    private function deleteOldCoverImage(string $oldCoverPhotoPath): void {
        $fullCoverPath = public_path('upload/client_images/'.$oldCoverPhotoPath);

        if (file_exists($fullCoverPath)) {
            unlink($fullCoverPath);
        }
    } // End Private Method for Unlink Existing Client Cover Images


    public function ClientChangePassword(){

        $id = Auth::guard('client')->id();
        $profileData = Client::find($id);

        return view('client.client_change_password',compact('profileData'));

    } // End Method


    public function ClientPasswordUpdate(Request $request){

        $client = Auth::guard('client')->user();
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if (!Hash::check($request->old_password, $client->password)) {

            $notification = array(
                'message' => 'Current Password Does Not Match!',
                'alert-type' => 'error'
            );

            return back()->with($notification);
        }

        Client::whereId($client->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password Change Success',
            'alert-type' => 'success'
        );

        return redirect()->route('client.login')->with($notification);

    } // End Method



} // End Main Method
