<?php 

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\models\dailyrecommendation;

Route::get('/', function () {

	// $pathInfo =$getActionName();

    //  $function= (explode( '@', $pathInfo ) );
     // $function_name=$function[1];



      $s = file_exists('installer/test.php');
 // echo $s;exit;

      if($s ==1)
     {
    return redirect('installer/installer.php');
      }


    $prf_result =  with(new dailyrecommendation)->highlightedprofile();
    $log = \Session::get('is_logged');
if(!$log){
   return View::make('frontend.welcome',array('profile'=>$prf_result));
}else {
  return redirect('user/search');
}
});



Route::post('/', [
        'uses' => '\App\Http\Controllers\userController@postUserregistration',
      ]);

Route::get('admin/', function () {

   return View::make('backend.adminlogin');

});
Route::get('print/', function () {

   return View::make('backend.download.print_user_report');

});
Route::get('user/desired-profiles','DesiredProfileController@showprofiles');
Route::post('login-new','DesiredProfileController@postUser');

Route::controller('user', 'userController');
Route::controller('admin','adminController');
Route::controller('print','excelController');
//App::abort(404);
