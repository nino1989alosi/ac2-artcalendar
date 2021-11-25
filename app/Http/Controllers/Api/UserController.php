<?php

namespace App\Http\Controllers\Api;

use JWTAuth;
use App\Models\User;
use App\Models\GoogleLogin;
use Illuminate\Support\Str;


use Illuminate\Http\Request;
use App\Mail\welcomePasswordEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Api\BaseController as BaseController;

class UserController extends BaseController
{   


    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email:rfc|max:100',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            $errors=$validator->errors();
            $error['error']=$errors->first('email');
            return $this->sendError($error, ['error'=> $errors->first('email')]);
        }

        $credentials = $request->only('email', 'password');


        if(!empty($request->get('sociallogin')) && $request->get('sociallogin') == 1){
            $check = $this->socialAuthenticate($request);            
            if(!empty($check)){
                return $check;
            }
        }
        try {
            
            // $credentials['password'] = Hash::make($credentials['password']);
            //print_r($credentials);
            if (! $token = JWTAuth::attempt($credentials)) {
                //$message['statuscode']=400;
                $message['error']='Invalid Credentials!!!';
                return $this->sendError($message,['error' => $message['error']]);

            }
        } catch (JWTException $e) {
            $message['statuscode']=500;
            $message['error']='could not create token!!!';
            return $this->sendError($message,['error' => $message['error']]);
        }

        $response_data['token']=$token;
        $response_data['user']=Auth()->user();
        return $this->sendResponse($response_data,'Login Success!!');
    }   

    public function socialAuthenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        $validate_email = User::where('email','=',$request->email)->exists();
        if($validate_email){
            $user = User::where('email','=',$request->email)->first();
            if($user->sociallogin == 1){
                $GoogleLogin = new GoogleLogin();
                $check = $GoogleLogin->validateToken($request->get('password'),$request->get('email'));
                
                if($check != true){
                    return $this->sendError(['request' => 'Invalid Token!!'], ['error'=>'Invalid Token!!']);
                }
                //print_r($user);
                // $token = Auth::login($user);
                //$token = JWTAuth::fromUser($user);
                
                
                //$newToken = auth()->refresh();

                //print_r($token);
                // die();
                //$userToken = JWTAuth::fromUser($user);
                // if (!$userToken) {
                //     return response()->json(['error' => 'invalid_credentials'], 401);
                // }
                //
                try {
                    if (! $token = JWTAuth::fromUser($user)) {                        
                        $message['error']='Invalid Credentials!!!';
                        return $this->sendError($message,['error' => $message['error']]);

                    }
                    Auth::login($user);
                } catch (JWTException $e) {
                    $message['statuscode']=200;
                    $message['error']='could not create token!!!';
                    return $this->sendError($message,['error' => $message['error']]);
                }

                $response_data['token']=$token;
                $response_data['user']=Auth()->user();
                return $this->sendResponse($response_data,'Login Success!!');
                //
            }else{
                $message['error']='Invalid Credentials!!!';
                return $this->sendError($message,['error' => $message['error']]);
            }
        }else{            
            return $this->register($request);
        }
    }
    public function getAuthenticatedUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                $message['statuscode']=200;
                $message['error']='User not Found!!!';
                return $this->sendError($message['error'], $message);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            $message['statuscode']=$e->getStatusCode();
            $message['error']='Token Expired!!!';
            return $this->sendError($message['error'], $message);

                // return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            $message['statuscode']=$e->getStatusCode();
            $message['error']='Token Invalid!!!';
            return $this->sendError( $message['error'], $message);

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            $message['statuscode']=$e->getStatusCode();
            $message['error']='Token Absent!!!';
            return $this->sendError('Token Absent', $message);

        }

        //return response()->json(compact('user'));
        $response_data['user']=$user;
        return $this->sendResponse($response_data, ['success' => 'User Details Found!!']);
    }
    //

    /**
     * Validate Email api
     *
     * @return \Illuminate\Http\Response
     */

    public function validateEmail(Request $request)
    {
        try{
            if(empty($request->all())){   
                $error['error']='Invalid parameters!!';
                return $this->sendError($error, ['error'=>'No parameter found!!']);
            }
            else{
                
                $validator = Validator::make($request->all(), [
                    'email' => 'required|string|email:rfc|max:100',
                ]);

                if ($validator->fails()) {
                    $errors=$validator->errors();
                    $error['error']=$errors->first('email');
                    return $this->sendError($error, ['error'=> $errors->first('email')]);
                }

                $validate_email = User::where('email','=',$request->email);

                // if(!empty($request->get('socialcheck')) && $request->get('socialcheck') == 1){
                //     $validate_email->where('socialLogin','1');
                // }

                $validate_email = $validate_email->exists();
                
                if($validate_email){
                    $error['error']="This email is already registered with us.";
                    return $this->sendError($error, ['error'=>'Email Exists!!']);
                }
                else{
                    $success['message']="Email does not match in our database.";
                    return $this->sendResponse($success, ['success' => 'This email is not registered with us!!']);
                }
            }
        }
        catch(Exception $e) {
            $error['error']=$e->getMessage();
            return $this->sendError($error, ['error'=>$e->getMessage()]);
        }
    }

     //

    /**
     * Register user
     *
     * @return \Illuminate\Http\Response
     */

    public function register(Request $request)
    {
        
        try{
            if(empty($request->all())){   
                $error['request']='Invalid parameters!!';
                return $this->sendError($error, ['error'=>'No parameter found!!']);
            }
            else{

                $validation = [
                    'first_name' => 'required|string|min:2|max:50',
                    'last_name' => 'required|string|min:3|max:50',
                    'nickname' => 'required|string|min:3|max:50',
                    'email' => 'required|string|email:rfc|max:100|unique:users,email'                    
                ];
                $validationMsg = [];
                    
                if(!empty($request->get('sociallogin')) && $request->get('sociallogin')){
                    $validation['socialname'] = 'required|string|max:50';
                    $GoogleLogin = new GoogleLogin();
                    $check = $GoogleLogin->validateToken($request->get('password'),$request->get('email'));
                    if(!$check){
                        return $this->sendError(['request' => 'Invalid Token!!'], ['error'=>'Invalid Token!!']);
                    }
                    $password = $request->get('password');
                }
                else{
                    //$validation['password'] = 'required|string|min:6|max:14|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#@%]).*$/';
                    //$validationMsg = ['password.regex' => 'Password must contain one uppercase,lowercase, number, special character and must have at least 6 characters'];
                    $password = $validation['password'] = Str::random(12);
                }

                

                                
                $validator = Validator::make($request->all(), $validation,$validationMsg);


                if ($validator->fails()) {
                    $errors=$validator->errors();
                    return $this->sendError($errors, ['error'=> "Some params are not filled or not in correct format!!"]);
                }

                // dd($request->all());
                $create =  [
                                'first_name' => $request->first_name,
                                'last_name' => $request->last_name,
                                'nickname' => $request->nickname,
                                'email' => $request->email,
                                'password' => Hash::make($password),
                            ];
                 if(!empty($request->get('sociallogin')) && $request->get('sociallogin')){
                     $create['sociallogin'] = $request->get('sociallogin');
                     $create['socialname'] = $request->get('socialname');
                 } 
                $user=User::create($create);
                 
                if($user->id){
                    if(isset($validation['password'])){
                        Mail::to($user)->send(new welcomePasswordEmail($user,$validation['password']));
                    }
                    //$token=$user->createToken('myusertoken')->plainTextToken;
                    //$user->assignRole('Super Admin');
                    $token = JWTAuth::fromUser($user);

                    $response_data['token'] = $token;
                    $response_data['user'] = $user;
                    $response_data['message'] = "User Registered Successfully.";
                    $workspace = $user->workspace()->create([
                        'name' => $user->first_name."'s Workspace",
                        'added_by' => $user->id
                    ]);
                    $user->usermeta()->create([
                        'meta_key' => 'defualtWS',
                        'meta_value' => $workspace->id
                    ]);
                    return $this->sendResponse($response_data, ['success' => 'User Registered Successfully!!']);                

                } else{

                    $error['error'] = 'Unable to register, Please try again later!!.';
                    return $this->sendError($error, ['error' => 'Unable to register, Please try again later!!']);

                }
            }
        }
        catch(Exception $e) {
            $error['error']=$e->getMessage();
            return $this->sendError($error, ['error'=>$e->getMessage()]);
        }
    }

    public function addMetaData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'meta_key' => 'required|string|max:100',
            'meta_value' => 'required',
        ]);

        if ($validator->fails()) {
            $errors=$validator->errors();
            return $this->sendError($errors, ['error'=> $errors->first()]);
        }
        try{
            $user = Auth()->user();
            $query = $user->usermeta()->where('meta_key',$request->meta_key);
            $isExists= $query->exists();
            if($isExists){

                $metaData = $query->first();
                $metaData->meta_value = $request->meta_value;
                $check = $metaData->save();

            }else{
                $check = $user->usermeta()->create([
                    'meta_key' => $request->meta_key,
                    'meta_value' => $request->meta_value
                ]);
            }
            
            if($check){
                return $this->sendResponse(['message' => 'meta value added !!'], ['success' => 'Meta Value Added!!']);
            }
        }  catch(Exception $e) {
            $error['error']=$e->getMessage();
            return $this->sendError($error,['error'=>$e->getMessage()]);
        } 

    }

    // public function welcomePassword($send_to,$invite_url)
    // {
    //     $data['invite_url']=$invite_url;
    //     $data['send_to']=$send_to;
    //     $data['subject']="Welcome to ".config('app_name');
    //     $view="emails.invite";            
    //     $from_address=env('MAIL_FROM_ADDRESS');
    //     Mail::send($view, $data, function($message) use($data) {
    //         $message->to($data['send_to']);
    //         $message->subject($data['subject']);
    //     });        
    // }


}