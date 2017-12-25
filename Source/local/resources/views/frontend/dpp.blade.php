 

<?php
  $sess= \Session::get('id');
 $data1 = $results['login'];
  $sess= \Session::get('id');
  $get_religion=\ DB::table('religion')->get();
  $get_caste= \DB::table('caste')->get();
  $get_star=\ DB::table('star')->get();
  $getzodiac_sign=\ DB::table('zodiac_starsign')->get();
  $get_country=\ DB::table('country')->get();
  $get_mother_tounge=\ DB::table('mother_tongue')->get();
  $get_education=\ DB::table('education')->get();
  $get_occupation=\ DB::table('occupation')->get();

  //desired_profile
  foreach($desired_profile as $re){
  	$desired_profile = $re ;
  }
  

  $d_age_from = $desired_profile->age_from;
  $d_age_to = $desired_profile->age_to;
  $d_height_from = $desired_profile->height_from;
  $d_height_to = $desired_profile->height_to;
  $d_country = $desired_profile->country;
  $d_country = explode(",", $d_country);

  $d_religion = $desired_profile->religion;

  $d_religion = explode(",", $d_religion);

  $d_caste = $desired_profile->caste;
   $d_caste = explode(",", $d_caste);
  $d_mother_tongue = $desired_profile->mother_tongue;
    $d_mother_tongue = explode(",", $d_mother_tongue);

  $d_education = $desired_profile->education;
    $d_education = explode(",", $d_education);
  $d_occupation = $desired_profile->occupation;
    $d_occupation = explode(",", $d_occupation);
  $d_employed_in = $desired_profile->employed_in;
  
  $d_annual_income_from = $desired_profile->annual_income_from;
  $d_annual_income_to = $desired_profile->annual_income_to;


   ?>

   <?php 
function show_multiple_data($get_table_name,$d_name,$select_row_id,$select_element){
	$select_row_id = $select_row_id;
	$select_element = $select_element;

	foreach($get_table_name as $table_name){

		for($i = 0; $i<sizeof($d_name); $i++){
  			if($table_name->$select_row_id == $d_name[$i] ){ 
     		 echo $table_name->$select_element." ";
     		}
  			}
     	}
	}


?>

@include('include.profile_header')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>


	$(document).ready(function() {
    $('.multiple_marital_status').select2({placeholder: "Select Some Options"});
    $('.multiple_marital_status1').select2({placeholder: "Select Some Options"});
    $('.multiple_country').select2({placeholder: "Select Some Options"});
    $('.multiple_religion').select2({placeholder: "Select Some Options"});
    $('.multiple_caste').select2();
    $('.multiple_star').select2({placeholder: "Select Some Options"});
    $('.multiple_mother_tongue').select2({placeholder: "Select Some Options"});
    $('.multiple_raasi').select2({placeholder: "Select Some Options"});
    $('.multiple_education').select2();
    $('.multiple_employed').select2();
    $('.multiple_occupation').select2();
});
</script>
<link href="{{ asset ('assets/css/imageupload/main.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset ('assets/css/imageupload/jquery.Jcrop.min.css') }}" rel="stylesheet" type="text/css" />
 <meta name="_token" content="{!! csrf_token() !!}"/>

     <div class="myprfl-section2">
         <div class="bgimage"></div>
	 </div>
	 <div class="myprfl-section3">
        <div class="container">
            <div class="row">
				<div class="profiledetl">
					<div class="col-lg-9">
                    	<div class="profile-details">
							<div class="col-sm-4">
                                <?php
								//  $users=$values['user_details'];
								if($users)
								{
								$values=$users[0];
								$dob=$values->dob;
								$birthdate = new DateTime($dob);
								$today   = new DateTime('today');
								$age = $birthdate->diff($today)->y;
								$default_img=$values->path;
								$img_status=$values->img_status;
								if($default_img=="" or $img_status==0)
                              	 {
                              	 ?>	  
								<div class="img_uploadadminapproval">Note:Choose Image Dimension:512x512<br>Image display only after admin approval</div>
									<img  class="profile-image" style="width:245px;height:265px;" src="{{asset('assets/images/default_profile.jpg')}}"/>
								<?php
                                 }
                                 else
                                 {
                                 ?>	 
                              <img class='profile-image'  style='width:245px;height:265px;' src='{{asset($values->path)}}'/>  
								<?php
								}
								}
                                ?>
								<p data-toggle="modal" data-target="#myModal" class="paraloginlink">
									<a class="loginlink" href="#">image upload</a>
								</p>
                                <div class="navbar-collapse collapse" id="navbar" aria-expanded="false" >
									<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-body">
													<div class="mybkngwte2">
														<div class="mybkngwte_bg">
                                                <!-- upload form -->	    
														<form id="upload_form" enctype="multipart/form-data" method="post"  onSubmit="return checkForm()" action={{('upload-image-file')}} accept-charset="UTF-8">
														<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                   <!-- hidden crop params -->
														<input type="hidden" id="x1" name="x1" />
														<input type="hidden" id="y1" name="y1" />
														<input type="hidden" id="x2" name="x2" />
														<input type="hidden" id="y2" name="y2" />
														<div>
															<input type="file" name="image_file" class="loginlink image_class" id="image_file" onChange="fileSelectHandler()"/> 
														</div>
                                                  <!-- <div class="errors"></div>-->
														<div class="step2">
															<img id="preview" />
															<div class="info">
																<label class="info1">File size</label> <input type="text" class="info1" id="filesize" name="filesize" />
																<label class="info1">Type</label> <input type="text"  class="info1" id="filetype" name="filetype" />
																<label class="info1">Image dimension</label> <input type="text"  class="info1" id="filedim" name="filedim" />
																<label class="info1">W</label> <input type="text" class="info1" id="w" name="w" />
																<label class="info1">H</label> <input type="text" class="info1" id="h" name="h" />
																<input type="submit" class="img-upload" value="Upload"/>
																<!--<input type="submit" href="{{ URL::to('user/profileview') }}" class="cncelbuton" value="Cancel"/>-->
															</div>
															<div class="error"></div>
														</div> 
														</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
                            </div>
                            <div class="col-sm-4">
								<div class="details">
									<h2 class="head-name"><span class="blue-name" style="text-transform: capitalize;" id="update_username"><?php  echo $values->name; ?></span><span class="black-code">(<?php  echo $values->rand_id; ?>)</span></h2>
									<p class="para2">Age, Height &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp; <?php echo $age; ?>/<?php echo $values->height; ?></p>
									<p class="para2">Religion &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<?php echo $values->religion; ?></p>
									<p class="para2">Location &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<?php echo $values->state;?>-<?php echo $values->district; ?></p>
									<p class="para2">Education &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<?php echo $values->education;?></p>
									<p class="para2">Occupation &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<?php echo $values->occupation;?></p><br>
								</div>
							</div>
							<div class="col-sm-4">
                            	<?php
                            	$paymnt="";
								$payment=\DB::table('user_payment_details')
							              ->where('uid',$sess)->get();
										  foreach($payment as $pay)
										  {
											  $paymnt=$pay->user_payment_status;
										  }
							
								if( $paymnt=='1')
								{
								?>
                            	<p class="para3">PREMIUM</p>
                                <?php } else{
									?>
                                <p class="para3"></p>
                                <?php }?>

                                 <!-- socialmedia -->
                            <div class="socialmedia2">
                               <?php
                               $socialmedias=\DB::table('user_profile')
                                              ->where('user_id',$sess)
                                              ->get();
                             foreach($socialmedias as $get_social)
                             {
                              $fb=$get_social->facebook;
                              $twitter=$get_social->twitter;
                              $googleplus=$get_social->google_plus;
                              }
                                ?>
                           <ul class="socialmedialink">
                         
                                 <li><button name="text" data-content="" title="" data-toggle="popover1" class="update_username1" type="button" data-original-title="Social Media"></button></li>
                             
                              <a href="https://<?php echo $fb;?> ">
                                 <li><img src="{{asset('assets/images/fb.png')}}"></li>
                              </a>
                              <a href="https://<?php echo $twitter;?>">
                                 <li><img src="{{asset('assets/images/twtr.png')}}"></li>
                              </a>
                              <a href="https://<?php echo $googleplus;?>">
                                 <li><img src="{{asset('assets/images/google.png')}}"></li>
                              </a>
                           </ul>
                          
                           <div class="edit_usernameform1">
                              <form id="register_username1">
                                 <input type="text" class="Social_Media" name="facebook" id="socialmedia_link" placeholder="facebook" /></br>
                                 <input type="text" class="Social_Media" name="twitter" id="socialmedia_link" placeholder="twitter" /></br>
                                 <input type="text" class="Social_Media" name="google plus" id="socialmedia_link" placeholder="google plus" /></br>
                                 <input type="button" id="user_social"  class="socialmedia_user" value="submit"/>
                                 <a class="cncel_buton" href="{{ URL::to('user/profileview') }}">cancel</a>
                              </form>
                           </div>
                        </div>
                    <!-- socialmedia -->
                            </div>
                        </div>
                    </div>
					<div class="col-lg-3">
						<div class="progressDiv">
							<h2 class="head-name2">Profile Strength</h2>
							<div class="statChartHolder">
								<div style="width:250px;height:150px;margin:18px auto;">
									<div class="percent" style="width:210px;height:210px;margin-left:22px;color:#2cbdeb;">
										<?php
		 
										$profile_values=$profile_str;
										?>
										<p style="display:none;"> <?php echo $profile_values; ?> % </p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
            <div class="row">
				<div class="prfl-details2">
					<div class="col-lg-9">
						 <?php
                        
                        if($users)
                           {
                         $user = $users[0];

                          ?>
						<div class="profile-details1">
								<h1 class="text-center" style="padding: 0;">Desired Partner Profile</h1>
								<h3 class="text-center">The criteria you mention here determines the ‘Desired Partner Matches’ you see. So please review this information carefully. Moreover, Filters determine whose Interests/Calls you want to receive.</h3>
								<div class="profile-inner1">
                          
									<div class="prof-sec ">
										<div class="head-edit">
											<div class="head-icon"><img src="{{ asset('assets/images/img2.png') }}"></div>
											<div class="head-txt"><h2>Basic Details</h2></div>
											<button class="head-edit-icon basic_edit"></button>
										</div>
										<div class="row">





											<div class="col-md-6">
											<ul class="parent-list basicdetails_form">
												<li>
													<ul class="child-list">
														<li class="first">Age </li>
														<li class="second">:&nbsp;&nbsp;&nbsp;{{ $d_age_from }}- {{ $d_age_to }} years of age</li>
													</ul>
												</li>
												<li>
													<ul class="child-list">
														<li class="first">Height</li>
													<?php 
													$cm = $user->height;
													$inches = ceil($cm/2.54);
												    $feet = floor(($inches/12));
												    $height = $feet."ft ".($inches%12).'in - '.$cm."cm";

												    ?>

														<li class="second">:&nbsp;&nbsp;&nbsp;{{ $d_height_from }}- {{ $d_height_to }}</li>
													</ul>
												</li>

												<li>
													<ul class="child-list">
														<li class="first">Martial Status</li>
														<li class="second">:&nbsp;&nbsp;&nbsp;<?php echo $user->marital_status; ?></li>
													</ul>
												</li>
	
												<li>
													<ul class="child-list">
														<li class="first">Country</li>
														<li class="second">:&nbsp;&nbsp;&nbsp;<?php echo $user->country; ?></li>
													</ul>
												</li>
												
											</ul>
											</div>





										</div>







										<hr class="hbar">
									</div>
									<!--edit basic details -->
									<div class="prof-sec" id="editform" style="display:none">

										<form class="form-class"  id="basicdtls">
              
										<div class="row pdng25">
											<div class="col-md-4">
												Age :<br>
												<Select class="eselect dda" name="age_from" id="age1">
													<option value="">Height</option>



												<?php 

													for ($ft=4; $ft < 7; $ft++) { 
														for($in=1; $in<12;$in++){
															if($ft==4 && $in<5 ){
																continue;
															}

														

															$i =  floor(($ft*12+$in)*2.54);
															$j =$ft."ft ".$in."in - ".$i."cm"; 
																?>
													
                                             <option <?php if($user->height==$i){echo "selected='selected'";} ?>	value='<?php echo $i; ?>'> <?php echo $j; ?></option>
                                             <?php 
                                               } }
                                               ?>		
												</Select>
											</div>
											<div class="col-md-4"><br>
												<Select class="eselect dda" name="age_to" id="age2">
													<option value="">Height</option>



												<?php 

													for ($ft=4; $ft < 7; $ft++) { 
														for($in=1; $in<12;$in++){
															if($ft==4 && $in<5 ){
																continue;
															}

														

															$i =  floor(($ft*12+$in)*2.54);
															$j =$ft."ft ".$in."in - ".$i."cm"; 
																?>
													
                                             <option <?php if($user->height==$i){echo "selected='selected'";} ?>	value='<?php echo $i; ?>'> <?php echo $j; ?></option>
                                             <?php 
                                               } }
                                               ?>		
												</Select>
											</div>

											

											
										</div>

										<div class="row pdng25">
											<div class="col-md-4">
												Height :<br>
												<Select class="eselect dda" name="height_from" id="height">
													<option value="">Height</option>



												<?php 

													for ($ft=4; $ft < 7; $ft++) { 
														for($in=1; $in<12;$in++){
															if($ft==4 && $in<5 ){
																continue;
															}

														

															$i =  floor(($ft*12+$in)*2.54);
															$j =$ft."ft ".$in."in - ".$i."cm"; 
																?>
													
                                             <option <?php if($user->height==$i){echo "selected='selected'";} ?>	value='<?php echo $i; ?>'> <?php echo $j; ?></option>
                                             <?php 
                                               } }
                                               ?>		
												</Select>
											</div>
											<div class="col-md-4"><br>
												<select class="eselect dda" name="height_to" id="height1">
													<option value="">Height</option>



												<?php 

													for ($ft=4; $ft < 7; $ft++) { 
														for($in=1; $in<12;$in++){
															if($ft==4 && $in<5 ){
																continue;
															}

														

															$i =  floor(($ft*12+$in)*2.54);
															$j =$ft."ft ".$in."in - ".$i."cm"; 
																?>
													
                                             <option <?php if($user->height==$i){echo "selected='selected'";} ?>	value='<?php echo $i; ?>'> <?php echo $j; ?></option>
                                             <?php 
                                               } }
                                               ?>		
												</select>
											</div>
		
										</div>

									<div class="row pdng25">
											<div class="col-md-6">
												Country :<br>
												<select class="multiple_country eselect dda" type="text" name="country_livingin[]" id="country_id" multiple="multiple" style="width: 92%;"  >
												  <?php
                                                     foreach($get_country as $getcountry)
                                                     {
													 $select = '';
													  if($getcountry->country_id == $user->country_id)
													    {
												      $select = "selected";
													    }
													 ?>
													 
                                             <option <?php echo $select; ?> value="<?php echo $getcountry->country_id; ?>"> <?php echo $getcountry->country; ?></option>
													 <?php 
													  }
													  ?>
                                             </select>
											</div>
										</div>


										<div class="row pdng25">
											<div class="col-md-6">
												Maritial Status :<br>
												<select class="multiple_marital_status eselect dda" type="text" name="marital_status[]" id="marital_status" multiple="multiple" style="width: 92%;" >
												 <option <?php if($user->marital_status=='Never Married'){echo "selected='selected'";}?>>Never Married</option>
                                                <option	<?php if($user->marital_status=='Widower'){echo "selected='selected'";}?>>Widower</option>
                                                <option	<?php if($user->marital_status=='Divorced'){echo "selected='selected'";}?>>Divorced</option>
                                                <option	<?php if($user->marital_status=='Awaiting divorc'){echo "selected='selected'";}?>>Awaiting divorce</option>
                                             </select>
											</div>

										</div>

										<div class="row pdng25">
											<input type="submit" class="sbt-btn" value="Submit" id="basic_details">
											<input type="submit" value="Cancel">
										</div>

										<hr class="hbar">
											</form>
									</div>
							<!--end edit basic details-->

							
									<div class="prof-sec">
										<div class="head-edit">
											<div class="head-icon"><img src="{{ asset('assets/images/img6.png') }}"></div>
											<div class="head-txt"><h2>Religious Information</h2></div>
											<button class="head-edit-icon Religious_Information"></button>
										</div>
										<div class="row">
											<div class="col-md-12">
											<ul class="parent-list religious_info_details">
												<li>
													<ul class="child-list">
														<li class="first">Religion </li>







														<li class="second">:&nbsp;&nbsp;&nbsp;<?php if($user->religion==""){ echo $user->other_religion;}else { 


												show_multiple_data($get_religion,$d_religion,"religion_id","religion");
														
													
                                                  }
                                              
                                                  ?>
                                       </li>
													</ul>
												</li>
										<li>
											<ul class="child-list">
												<li class="first">Caste </li>
												<li class="second">:&nbsp;&nbsp;&nbsp;<?php if($user->caste==""){echo $user->other_caste;}else {show_multiple_data($get_caste,$d_caste,"caste_id","caste");
										} ?></li>
											</ul>
										</li>

												<li>
													<ul class="child-list">
														<li class="first">Mother Tongue</li>
														<li class="second">:&nbsp;&nbsp;&nbsp;<?php show_multiple_data($get_mother_tounge,$d_mother_tongue,"mother_tongue_id","mother_tongue"); ?></li>
													</ul>
												</li>

												
												
												
											</ul>


											</div>
										</div>
										<hr class="hbar">
									</div>

									<!--start edit religious info form-->
									<div class="prof-sec" id="location_hide" style="display:none">
                                      <form class="form-class"  id="loctnform">

										<div class="row pdng25">
											<div class="col-md-4">
												Religion :<br>
												<select class="multiple_religion eselect dda others" name="religion[]" id="religion_id" multiple="multiple" style="width: 100%" >
												    <?php
                                            
                                                foreach($get_religion as $getrel)
                                                  {
                                                 $s = '';
                                                 $i = 0;
					                              if($getrel->religion_id == $d_religion[$i])
					                              $i++; 
					                                 {
						                           $s = "selected";
						                             }
                                                  ?>
                                             <option <?php echo $s; ?> value="<?php echo $getrel->religion_id; ?>"><?php echo $getrel->religion; ?></option>
                                               <?php
                                                  }
                                                ?>			 
                                                <option value="other_religion" >Others</option>
                                             </select>
											</div>

											
											
											
										</div>

							<div class="row pdng25">


									<div class="col-md-4">
									Caste :<br>
									<img src="{{asset('assets/images/loading3.gif')}}" class='loader'>
									<select class="multiple_caste eselect dda Other user_caste" name="caste[]" id="ce" multiple="multiple" style="width: 100%" >
									<option value="<?php echo $user->caste_id; ?>"><?php echo $user->caste; ?></option>
									<option value="other_caste">Others</option>
									</select>
									
									</div>



							</div>

										

										<div class="row pdng25">
											<div class="col-md-4">
												Mother Tongue :<br>
												<select class=" multiple_mother_tongue eselect dda" name="mother_tongue[]" id="mother_tongue" multiple="multiple" style="width: 100%;">
												  <?php
                                                 foreach($get_mother_tounge as $get_mother_tounge)
                                                     {
													 $s = '';
													 if($get_mother_tounge->id == $user->mother_tongue_id)
													   {
												      $s = "selected";
													   }
                                                  ?>
                                             <option <?php echo $s; ?> value="<?php echo $get_mother_tounge->id; ?>"> <?php echo $get_mother_tounge->mother_tongue; ?></option>
                                             <?php 
                                               } 
                                               ?>
                                             </select>
											</div>

											
										</div>

										<div class="row pdng25">
											<input type="submit" class="sbt-btn" id="regg1" value="submit">
											<input type="submit" value="Cancel">
										</div>


										<hr class="hbar">
									</form>
									</div>
									<!--end rel edit form-->



									<div class="prof-sec">
										<div class="head-edit">
											<div class="head-icon"><img src="{{ asset('assets/images/img7.png') }}"></div>
											<div class="head-txt"><h2>Education & Profession Details</h2></div>
											<button class="head-edit-icon edit_professionalinfo"></button>
										</div>
										<div class="row">
											<div class="col-md-12">
											<ul class="parent-list details_professionalinformation">
												<li>
													<ul class="child-list">
														<li class="first">Education</li>
														<li class="second">:&nbsp;&nbsp;&nbsp;<?php show_multiple_data($get_education,$d_education,"education_id","education"); ?></li>
													</ul>
												</li>
												
												
												<li>
													<ul class="child-list">
														<li class="first">Occupation</li>
														<li class="second">:&nbsp;&nbsp;&nbsp;<?php show_multiple_data($get_occupation,$d_occupation,"occupation_id","occupation"); ?></li>
													</ul>
												</li>
												
												<li>
													<ul class="child-list">
														<li class="first">Employed In</li>
														<li class="second">:&nbsp;&nbsp;&nbsp;<?php echo $d_employed_in; ?></li>
													</ul>
												</li>
												<li>
													<ul class="child-list">
														<li class="first">Annuval Income</li>
														<li class="second">:&nbsp;&nbsp;&nbsp;<?php echo $user->annual_income; ?></li>
													</ul>
												</li>
											</ul>
											</div>
										</div>
										<hr class="hbar">
									</div>
                                    <!--edit professional info form-->
                                     
                                      
									<div class="prof-sec" id="prf_info_hide" style="display:none">
										<form class="form-class"  id="profesional_info_form">
										
										<div class="row pdng25">
											<div class="col-md-6">
												Education :<br>
												<select class="multiple_education eselect dda other_education" name="education[]" id="educationfield_id" multiple="multiple" style="width: 100%;" >
												         <?php
                                                foreach($get_education as $geteduca)
                                                  {
												$select = '';
												if($geteduca->education == $user->education) 
												  {
												$select = "selected";
											       }
												
                                                ?>
                                             <option <?php echo $select; ?> value="<?php echo $geteduca->education_id; ?>"><?php echo $geteduca->education; ?></option>
                                             <?php 
                                                } 
                                                ?>  
                                                <option value="other_education">Other</option>
                                             </select>
                                             
											</div>
											</div>
										<div class="row pdng25">

											<div class="col-md-6">
												Occupation :<br>
												<img src="{{asset('assets/images/loading3.gif')}}" class='loader_occupation'>
												<select class="multiple_occupation eselect dda user_occupation" name="occupation[]" id="occ" multiple="multiple" style="width: 100%" >
												  <option value="<?php echo $user->occupation_id; ?>"><?php echo $user->occupation; ?></option>
                                                  <option value="other_occupation">Other</option>
												</select>
												     
											</div>

										
										</div>
										
										<div class="row pdng25">
											
										
											<div class="col-md-6">
												Employed in:<br>
												<select class="multiple_employed eselect dda" type="text" name="employed_in[]" id="empi" placeholder="Employed in" multiple="multiple" style="width: 100%" >
												  <option	value="Government">Government</option>
                                                <option	value="Private">Private</option>
                                                <option	value="Business">Business</option>
                                                <option	value="Defence">Defence</option>
                                                <option	value="Self Employed">Self Employed</option>
												</select>
											</div>

										
										</div>
										<div class="row pdng25">
										<div class="col-md-6">
												Annual Income(/Monthly):<br>
												<select class="eselect dda" type="text" name="annual_income_from" id="auli1" placeholder="Annual Income">
												  <option  <?php if($user->annual_income=='below 100000'){echo "selected='selected'";}?>>Below 1,00,000/-</option>                                        
                                        <option    <?php if($user->annual_income=='100000-200000'){echo "selected='selected'";}?>>1,00,000-2,00,000/-</option>
                                            <option <?php if($user->annual_income=='above 200000'){echo "selected='selected'";}?>>2,00,000 above</option>   			
                                          </select>
											</div>
										<div class="col-md-6">
												<br>
												<select class="eselect dda" type="text" name="annual_income_to" id="auli2" placeholder="Annual Income">
												  <option  <?php if($user->annual_income=='below 100000'){echo "selected='selected'";}?>>Below 1,00,000/-</option>                                        
                                        <option    <?php if($user->annual_income=='100000-200000'){echo "selected='selected'";}?>>1,00,000-2,00,000/-</option>
                                            <option <?php if($user->annual_income=='above 200000'){echo "selected='selected'";}?>>2,00,000 above</option>   			
                                          </select>
											</div>
											
										</div>
										
										
										<div class="row pdng25">
											<input type="submit" class="sbt-btn" id="prf_inf_submit" value="Submit">
										<input type="submit" value="Cancel">
										</div>

										<hr class="hbar">
										</form>
									</div>


								</div>
							</div>
							<?php
						      }

							?>
                          <div class="loader_cls"></div>
							<!-- hide -->
								<div class="profile-details1">
								
								<div class="profile-inner1">
										
									


									
									
									
								</div>
							</div>
							<!-- hide -->
						

				
                  </div>
                  <div class="col-lg-3">
                     <div class="right-part">
					 <div class="right-part1">
                        <h2 class="head-name2">Daily Recommendations</h2>
                        <br>
						<hr>
                        <div class="right-content">
                             <?php
                             if($recommendation)
                             {
                           
                              foreach($recommendation as $data)
                              {
                              	
                              	$dob=$data->dob;
                              	$birthdate = new DateTime($dob);
                              	$today   = new DateTime('today');
                              	$age = $birthdate->diff($today)->y;
                              	$id=$data->user_id;
                              	 $img_status=$data->img_status; 
                              	   $encrypted_id = base64_encode($id);
                              ?>
                            
                              <ul class="prfldetails">

                              <li class="imagerd">
                                <a href='search-profile-view/{{$encrypted_id}}'> 
                                <?php if($img_status=='0')
                                 {?>
                                <img  src="{{asset('assets/images/default_profile.jpg')}}">
                                 <?php } else
                                    {
                                    	?>
                                 <img  src="{{asset($data->path)}}">
                                 <?php } ?></a>
                              </li>
                              <li>
                                 <p class="pink-name" style="text-transform: capitalize;"><a href='search-profile-view/{{$encrypted_id}}'><?php echo $data->name; ?></a></p>
                                 </p>
                                 <p class="qulif"><?php echo $data->education; ?>  (<?php echo $age; ?> yrs)</p>
                              </li>
                           </ul>
                           <?php
                              }
                            }
                            else
                            {
                              echo "No Results Found";
                            }
                         
                              ?>
                          
                        </div>
						</div>
                     </div>


               </div>
<!-- advertisement -->
   <div class="col-lg-3">
                     <div class="right-part">
					 <div class="right-part1">
                        <h2 class="head-name2">Advertisement</h2>
                        <br>
						<hr>
                        <div class="right-content">
                             <?php

                             $ad=\DB::table('advertisement')
                                  ->get();
                             foreach ($ad as $ads)
                              {
                              
                              ?>
                            
                              <ul class="prfldetails">

                           
                              
                                 <img  src="{{asset($ads->ad_image)}}">
                             
                           </ul>
                           <?php
                         }
                           ?>
                          
                          
                        </div>
						</div>
                     </div>


               </div>

<!-- advertisement -->
            </div>
</div>
         </div>
      </div>
      <!-- Footer--> 
      @include('include.footer')
      <!-- End Footer -->
   </div>
   <!-- Bootstrap core JavaScript
      ================================================== -->
<script src="{{asset('assets/js/bootstrap.js')}}"></script>
 <script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
   <!-- Placed at the end of the document so the pages load faster -->
   <link href="{{ asset ('assets/css/select2.min.css') }}" rel="stylesheet" />
   <script src="{{ asset ('assets/js/select2.min.js') }}"></script>
<script src="{{asset('assets/js/profilestrength/raphael-min.js')}}"></script>
<script src="{{ asset('assets/js/profilestrength/jQuery.circleProgressBar.js') }}"></script>


<script src="{{ asset('assets/js/imageupload/jquery.Jcrop.min.js') }}"></script>
<script src="{{ asset('assets/js/imageupload/script.js') }}"></script>

<script>
/////////////////////////////////////////profile Strength////////////////////////////////////////////
$(function () {
	$('.percent').percentageLoader({
		valElement: 'p',
		strokeWidth: 30,
		bgColor: '#d9d9d9',
		ringColor: '#75d2e4',
		textColor: '#2C3E50',
		fontSize: '14px',
		fontWeight: 'normal'
	});
});
</script> 
<script type="text/javascript">
	  $(document).ready(function(){
								 
			 $(window).scroll(function(){
														  
				  var e= $(window).scrollTop();
								
					if ( e > 50){
							
						 $(".nav_main").addClass("short_menu")
					
					}else{
						  $(".nav_main").removeClass("short_menu")
										
					}
			});
			
		}); 
					
							  	
							  
						
      </script>
 
   
@include('scripts.script_dpp')


</body>
</html>

