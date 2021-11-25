<?php

namespace App\Http\Controllers;

use JWTAuth;
// use App\Http\Controllers\API\UserController as user_controller;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Providers\RouteServiceProvider;

class UserProfileController extends Controller
{
    public function index(Request $request)
    {       


        $profile = UserProfile::
        select(
            'users.id',
            'users.email',
            'users_profile.fullname',
            'users_profile.nickname',
            'users_profile.phone',

            'users_profile.company',
            'users_profile.country',
            'users_profile.birth_date',
            'users_profile.birth_country',
            'users_profile.gender',
            'users_profile.language',
            'users_profile.format_date',
            'users_profile.timezone',
            'users_profile.avatar'
        )
        ->leftJoin('users', 'users.id', '=', 'users_profile.user_id')
        ->where('users.id', '=', Auth()->user()->id)
        ->first();

        if($profile == null){
            UserProfile::create([
                'fullname' => Auth()->user()->name,
                'user_id' => Auth()->user()->id
            ]);

        $profile = UserProfile::where('User_id', '=', Auth()->user()->id)
                    ->first();
        }


        //$profile->id = Auth()->user()->id;
        
         return view('user.profile', compact('profile'));
    }



    public function store(Request $request) {
        $avatar = $request->input('avatar');
        $fullname = $request->input('fullname');
        $company = $request->input('company');
        $phone = $request->input('phone');
        $country = $request->input('country');
        $language = $request->input('language');
        $timezone = $request->input('timezone');

        $gender = $request->input('gender');
        $birth_country = $request->input('birth_country');
        $birth_date = $request->input('birth_date');
        $nickname = $request->input('nickname');
        
      if($request->file('avatar') != ""){

        $path = $request->file('avatar')->store('avatarsProfile');
        //return $path;
        $filename= explode("/",$path)[1];
        $upd = [
                'avatar' => $filename,
                'fullname'=>$fullname,
                'company' => $company,
                'phone' => $phone,
                'country' => $country,
                'language' => $language,
                'timezone' => $timezone,

                'gender' => $gender,
                'birth_country' => $birth_country,
                'birth_date' => $birth_date,
                'nickname' => $nickname
        ];

        
      }
      else{
        $upd = [
                'fullname'=>$fullname,
                'company' => $company,
                'phone' => $phone,
                'country' => $country,
                'language' => $language,
                'timezone' => $timezone,
                'gender' => $gender,
                'birth_country' => $birth_country,
                'birth_date' => $birth_date,
                'nickname' => $nickname
        ];
      }


       $pacchetto = UserProfile::where('User_id', '=', Auth()->user()->id)->update($upd);

      

        if($pacchetto != null){
            return redirect()->route('myprofile')->with(['message' => 'Profile edited successfully']);
        }
        return redirect()->route('myprofile')->with(['error' => 'Profile modification failed']);



    }






    public function activate(Request $request, $id) {
        DB::table('users')
        ->where('id', $id)
        ->update(['email_verified_at' => date("Y-m-d H:i:s") ]);


        $user = DB::table('users')->where('id',$id)->first();

        $wsId = DB::table('workspaces')->insertGetId([
            'name' => $user->name."'s Workspace",
            'added_by' => $user->id
        ]);



         DB::table('workspace_user')->insertGetId([
            'workspace_id' => $wsId,
            'user_id' => $user->id
        ]);

        return redirect(RouteServiceProvider::LOGIN);

    }





    public function changepwd(Request $request) {

        $password = Hash::make($request->input('password'));
        DB::table('users')->where('id', '=', Auth()->user()->id)->update( ['password' => $password]);
        return redirect()->route('myprofile')->with(['message' => 'Password changed successfully']);
       
    }








    public function blockMyAccount(Request $request) {

        $res = array();
       
        try{
            DB::table('users_profile')->where([
                'user_id' => Auth()->user()->id
            ])->delete();
            DB::table('workspace_user')->where([
                'user_id' => Auth()->user()->id
            ])->delete();

            DB::table('users')->where('id', '=', Auth()->user()->id)->delete();
        

            $res['code'] = true;
            $res['message'] = 'Account removed successfully!!';
            $res['data'] = null;
            echo json_encode($res);
    } catch(Exception $e) {
        return $e->getMessage();
    }
       
    }
    
    
}
