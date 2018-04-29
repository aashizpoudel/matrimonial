<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\DesiredProfile;
use App\Http\Requests;
use App\User_Profile;
use App\User_Reg;

use App\Http\Controllers\Controller;
use App\models\notification;
use App\models\dailyrecommendation;
use App\models\profilestrength;
use View;
use Input;
use Redirect;
use Response;
use Mail;
use Session;
use Carbon\Carbon;
use Cookie;
use Illuminate\Cookie\CookieJar;
use Omnipay\Omnipay;
use Omnipay\Common\CreditCard;
use Illuminate\Routing\Route;

class DesiredProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
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
        //
    }


    public function showprofiles(){

        $id=\Session::get('id');
        $cookie = Cookie::get('soulmate');

    if($cookie) {
      $id = $cookie;
    }

        $gender=\Session::get('gender');
        $matches=\DB::table('user_profile')
               ->where('user_id',$id)->get();
        if($gender=='male'){
          $search_gender= 'female';
        }else{
          $search_gender='male';
        }
        $current =  User_Profile::findOrFail($id); //get current user 

        if($current->desiredprofile == null){
          DesiredProfile::create(['user_id'=>$id])->save();
          return redirect('user/desired-profiles');
        }
        $desired  = $current->desiredprofile ;
        
        $dobFrom = (new Carbon())->subYears($desired->age_to)->toDateString() ;
        $dobTo = (new Carbon())->subYears($desired->age_from)->toDateString() ;
       
        $query = User_Profile::with('reguser')->whereHas( 'reguser',function($q) use ($search_gender,$dobFrom,$dobTo){
           $q->where('gender', $search_gender)
           ->where('deactivate_status','0')
           ->where('email_key',null)
           ->Where('dob','>=',$dobFrom)
           ->Where('dob','<=',$dobTo);
          })
          ->orWhere('height','>=',$desired->height_from)
          ->orWhere('height','<=',$desired->height_to)
          
         ;
         // dd($desired->age_from);
        
      
        if($desired->religion != 'any'){
          $r = explode(',',$desired->religion);
         $query->whereIn('religion',$r);
        }

        if($desired->marital_status != 'any'){
          $r = explode(',',$desired->marital_status);
         $query->whereIn('marital_status',$r);
        }
        if($desired->caste != 'any'){
          $r = explode(',',$desired->caste);
         $query->whereIn('caste',$r);
        }
          if($desired->annual_income != 'any'){
          $r = explode(',',$desired->annual_income);
         $query->whereIn('annual_income',$r);
        }
      $data = $query->paginate(10);
        echo $query->toSql() ;
         
     return view('frontend.desired_profiles',compact('data'));
    
  
}
  


}



   function UserregValues()
  {

    $id=\Session::get('id');
    $gender=\Session::get('gender');
     $user_gender=$gender;

    if($user_gender=='male')
    {
      $search_gender="female";
    }
    else
    {
      $search_gender="male";
    }


//query to set the chat users

    $query = \DB::table('user_reg')
                ->join('user_profile', 'user_profile.user_id', '=', 'user_reg.id')
                ->where('gender',$search_gender)
                ->where('deactivate_status','=','0')
                ->where('profile_strength','>=','59')
                ->where('user_id','!=',$id)->get();

             
    return $query;

   }
    







function postUser(Request $request) {
        $email = $request->input('email');
        $password = base64_encode($request->input('password'));

        $login=\DB::table('user_reg')
           ->where(['email' => $email,'password'=>$password])
              ->get();

        if( count($login)==0){
            //username or password error 
            $error = "error";
            return view("frontend.login_failed",compact('error'));
        }

        foreach($login as $l){
            $strength=\DB::table('user_profile')
                  ->where('user_id',$l->id)
                 ->where('profile_strength','>','59')
                 ->count();

                if($strength == 0){
                    //redirect to profile page
                    \Session::put(['gender'=>$gender,'username'=>$username,'id'=>$id]);
                    return redirect('user/profile');
                }else{
                    //redirect to search page
                \Session::put(['gender'=>$l->gender,'username'=>$l->username,'id'=>$l->id]);
                       return redirect('user/search');
                }

        }
}
 


