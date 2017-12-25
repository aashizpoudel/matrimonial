<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\DesiredProfile;
use App\Http\Requests;
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

    //var_dump($matches);


    foreach($matches as $match)
     {
        $caste=$match->caste;
        $state=$match->state;
        $religion=$match->religion;
     }


      if($id)
      {
        if($cookie){
        $sess1= \Session::put('id',$cookie);
      }


        $user_gender=trim($gender);
        $user_religion=trim($religion);
        $user_caste=trim($caste);
        $user_state=trim($state);


        $minage=18;
        $maxage=41;

    if($user_gender=='male')
    {
      $search_gender="female";
    }
    else
    {
      $search_gender="male";
    }




    $query = \DB::table('user_profile')
          ->leftJoin('user_reg', 'user_reg.id', '=', 'user_profile.user_id')
          ->leftJoin('religion','religion.religion_id','=','user_profile.religion')
          ->leftJoin('caste','caste.caste_id','=','user_profile.caste')
          ->leftJoin('state','state.state_id','=','user_profile.state')
          ->leftJoin('district','district.district_id','=','user_profile.district')
          ->leftJoin('education','education.education_id','=','user_profile.education')
          ->leftJoin('occupation','occupation.occupation_id','=','user_profile.occupation')
          ->where('user_reg.email_key','=',null)
          ->where('user_reg.deactivate_status','=','0')
          ->where('user_profile.profile_strength','>','59')
          ->where('user_reg.gender','=',$search_gender);





          //show matching profile of login user

    if(!isset($_POST['religion']) and !isset($_POST['caste']) and !isset($_POST['state']) and !isset($search_filter['dob']) and !isset($search_filter['education']) and !isset($search_filter['district']) and !isset($search_filter['occupation']) and !isset($search_filter['other_religion']) and !isset($search_filter['other_caste']))
    {

          $maxdate = date('Y-m-d', strtotime($minage . ' years ago'));
          $mindate = date('Y-m-d', strtotime($maxage . ' years ago'));

          $query = $query->where('user_profile.religion',$user_religion);
          $query = $query->where('user_profile.caste','=',$user_caste);
          $query = $query->where('user_profile.state','=',$user_state);
          $query = $query->where('user_reg.gender','=',$search_gender);
          $query = $query->whereBetween('user_reg.dob',[$mindate,$maxdate]);

    }
    //var_dump($query->get());
        //exit();
    //filter section
     foreach($_POST as $key=>$val)
      {
       if($key == 'other_caste') {
      $query = $query->orWhere('user_profile.caste','=','');
                 }
    elseif ($key == 'other_religion') {
      $query = $query->orWhere('user_profile.religion','=','');

                 }
    elseif($key == 'dob') {
      $minage=min($_POST['dob']);
      $maxage=max($_POST['dob'])+5;
      $maxdate = date('Y-m-d', strtotime($minage . ' years ago'));
      $mindate = date('Y-m-d', strtotime($maxage . ' years ago'));

      $query = $query->whereBetween('user_reg.dob',[$mindate,$maxdate]);
                 }
     else {
       $query = $query->whereIn($key, $val);
          }

        }

        

         $results= with(new notification)->headersearch();
         $results['users'] = $query->get();
         
         $results['chat_users'] = $this->userregvalues();


     return view::make('frontend.desired_profiles',array('results'=>$results));
    }
    else
    {
       return redirect('user/error-page');
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


}
