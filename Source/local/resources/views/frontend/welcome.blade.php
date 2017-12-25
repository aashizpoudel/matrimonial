<?php 
\Session::forget('attempt_failed');

 $get_state=\ DB::table('state')->get();
  $get_district=\ DB::table('district')->get();
   $get_religion=\ DB::table('religion')->get();
    $get_caste=\ DB::table('caste')->get();
?>
@include('include.header')

    <!--  header-->

     <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datetimepicker/DateTimePicker.css')}}" />

    <!-- Banner -->

    <div class="banner_bnr">
        <div id="slider" class="slider-container">
            <ul class="slider">
                <li class="slide">
                    <div class="slide-bg">
                        <img src="{{asset('assets/img/image1.jpg')}}" alt="An Image" draggable="false">
                    </div>
                </li>
                <li class="slide">
                    <div class="slide-bg">
                        <img src="{{asset('assets/img/image2.jpg')}}" alt="An Image" draggable="false">
                    </div>
                </li>
                <li class="slide">
                    <div class="slide-bg">
                        <img src="{{asset('assets/img/image3.jpg')}}" alt="An Image" draggable="false">
                    </div>
                </li>
            </ul>
            <div class="slider-controls">
                <div class="slide-nav">
                    <a href="#" class="prev"><img src="{{asset('assets/img/l.png')}}"></a>
                    <a href="#" class="next"><img src="{{asset('assets/img/r.png')}}"></a>
                </div>
                <ul class="slide-list">
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                </ul>
            </div>
        </div>

        <div class="container">
            <div class="row">
				<div class="col-md-8"></div>
				<div class="col-md-4">
                    <div class="quickFlip">
                        <div class="flip">
                            <div class="hm_registation">
								<div class="hm_registation_inr">
									<h2 class="form-head">Registration</h2>
									<p class="search-para">Search for a singles in your area now absolutelly FREE.</p>
									<form  method="post" class="search-form"  id="registration" >
										<ul class="horrizontal-form">
											<li>I'm a</li>
											<li class="gender-img"><a href="#"><img id="male_image"  onclick="add_male(); remove_female()"   alt="male" src="{{asset('assets/images/male.gif')}}"/></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#"><img id="female_image"  alt="female"  onclick="add_female(); remove_male()" src="{{asset('assets/images/female.gif')}}"/></a></li>
										</ul>
										<input type="hidden" id="gendr" value="" name="gender" required>
										<input type="hidden" name="random_id" value="" id="randid">
										<input type="text" id="username" class="field" name="username" placeholder="Username">
										<input type="password" id="password" class="field" name="password" placeholder="Password">
										<input type="text" class="field" id="email" name="email" placeholder="Email">
										<input type="date" class="field"  name="dob" id="date" placeholder="Date of Birth">
										<input type="text" class="field" id="phone" name="contact_num" placeholder="Phone Number" required> <br>
										<div class="row">
											<div class="col-sm-5">
												<input type="submit" name="submit" class="reg_frnt_btn reg-field" id="reg" value="REGISTER" onClick="randomString();">
												<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
											</div>
									</form>
									<?php
									$search_enable=\DB::table('settings')
										->get();
									foreach($search_enable as $enable)
									{
									$search_without_login=$enable->search_without_login;
									}
									if($search_without_login=='on')
									{
									?>
									<div class="col-sm-2">
										<div class="or">OR</div>
									</div>
									<div class="col-sm-5"style="text-align:right;">
										<input type="button" class="search-button quickFlipCta" value="SEARCH">
									</div>
									<?php
									}
									?>
										</div>
                    @if (isset($message))
                      {{-- expr --}}
                      <div class="message">
                        {!! $message !!}
                    </div>
                    @endif
										
										<div class="loader1" >
											<img src="{{asset('assets/images/ajax-loader.gif')}}" />
										</div>
								</div>
							</div>
                        </div>
                        <div class="flip">
                            <div class="hm_registation">
								<div class="hm_registation_inr">
									<h2 class="form-head">Find your match</h2>
									<p class="search-para">Search for a singles in your area now absolutelly FREE.</p>
									<form role="form" class="search-form"  id="search" >
										<ul class="horrizontal-form">
											<li>I'm a</li>
											<li class="gender-img"><a href="#"><img id="search_male_image"  onclick="add_search_male(); remove_search_female()"   alt="male" src="{{asset('assets/images/male.gif')}}"/></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#"><img id="search_female_image"  alt="female"  onclick="add_search_female(); remove_search_male()" src="{{asset('assets/images/female.gif')}}"/></a></li>
										</ul>
										<input type="hidden" id="search_gender" value="" name="search_gender" >
										<select class="field drop-down-arw" name="religion">
											<option value="">Religion</option>
												<?php
												foreach ($get_religion as $religion)  {
												?>
												<option><?php echo $religion->religion;?></option>
												<?php
												}
												?>
										</select>
										<select class="field drop-down-arw" name="caste">
											<option value="">Caste</option>
												<?php
												foreach ($get_caste as $caste)  {
												?>
												<option><?php echo $caste->caste;?></option>
												<?php
												}
												?>
										</select>
										<select class="field drop-down-arw" name="state">
											<option value="">State</option>
												<?php
												foreach ($get_state as $state)  {
												?>
												<option><?php echo $state->state;?></option>
												<?php
												}
												?>
										</select>
										<select class="field drop-down-arw" name="district">
											<option value="">District</option>
												<?php
												foreach ($get_district as $district)  {
												?>
												<option><?php echo $district->district;?></option>
												<?php
												}
												?>
										</select>
										<input type="date" class="field"  name="dateob"  placeholder="Date of Birth"  data-field="date" >
										<div class="row">
											<div class="col-sm-5">
                                                <input type="submit"  class="reg_frnt_btn" value="SEARCH"/>
												<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
											</div>
									</form>
									<div class="col-sm-2">
										<div class="or">OR</div>
									</div>
									<div class="col-sm-5"style="text-align:right">
										<input type="button" class="search-button quickFlipCta" value="REGISTER">
									</div>
									<div class="search_message"></div>
										</div>

								</div>
							</div>
						</div>
					</div>
                   <div id="dtBox"></div>
				</div>
            </div>
        </div>

         <!-- End Banner -->

        <?php
        $payment_user_count=\DB::table('user_payment_details')
        ->count();
		if($payment_user_count>=6)
        {
		?>
        <div class="hm_highlitd_profile">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<img class="sec-rib" src="{{asset('assets/images/ribbon.gif')}}"/>
						<div class="caroufredsel_wrapper">
							<div id="carousel">
                <img src="http://www.love.quotesms.com/images/love-images/Cute-Love-Images.jpg" alt="">
                            <?php
							//
                
							foreach($profile as $details)
							{
							$pk_id=$details->uid;
							$encrypted_id = base64_encode($pk_id);
							$gend=$details->gender;
							$dob=$details->dob;
                            $birthdate = new DateTime($dob);
                            $today   = new DateTime('today');
                            $age = $birthdate->diff($today)->y;
							?>
							<div>
								<img alt="prfl4" src="{{ asset($details->path) }}">
									<p class="pink-name"><a href="{{URL::to('user/highlighted-profile-view')}}/{{$pk_id}}"><?php echo $details->name;?></a></p>
									<p class="qualification"><?php echo $details->education;?> (<?php echo $age; ?> yrs)</p>

							</div>
                              <?php
								}
								?>
                            </div>
						</div>
					</div>
				</div>
            </div>
        </div>
        <?php
		}
		?>

        <!-- Clm3-->

        <div class="hm_clm3">
            <div class="container">
				<div class="row">
					<div class="col-lg-5">
						<h1 class="head-app">Get Our App</h1>
						<div class="download-part">
							<ul>
								<li> The next generation of matchmaking. </li>
								<li> Search Smarter, Match Faster </li>
								<li> Available across all platforms </li>
							</ul>
						</div>
						<div class="app-google">
							<img src="{{asset('assets/images/app_store.png')}}" width="181" style="margin-left:0px;" alt=""/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<img src="{{asset('assets/images/google_play.png')}}" width="181" alt=""/>
						</div>
					</div>
					<div class="col-md-7">
						<img src="{{asset('assets/images/app.png')}}" style="float:right; max-width:100%"/>
					</div>
				</div>
            </div>
        </div>
        <div id="error"></div>

        <!-- End Clm3-->

        <!-- Footer-->

        @include('include.home_footer')

         <!-- End Footer -->

    </div>
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/js/ie10-viewport-bug-workaround.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/datetimepicker/DateTimePicker.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/datetimepicker/DateTimePicker-i18n.js')}}"></script>
	<script src="{{ asset('assets/js/jquery.quickflip.source.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript">
		$(function() {
		$('.quickFlip').quickFlip({
		vertical : true
		})
		})
	</script>
    <script type="text/javascript">
         $(function() {
          $("#slider").blissSlider({
            auto: 1,
            transitionTime: 500,
            timeBetweenSlides: 4000
          });
         });
    </script>
	<script type="text/javascript">
      $(function() {

        var $c = $('#carousel'),
          $w = $(window);

        $c.carouFredSel({
          align: false,
          items: 1,
          scroll: {
            items: 1,
            duration: 3000,
            timeoutDuration: 0,
            easing: 'linear',
            pauseOnHover: 'immediate'
          }
        });


        $w.bind('resize.example', function() {
          var nw = $w.width();
          if (nw < 990) {
            nw = 990;
          }

          $c.width(nw * 3);
          $c.parent().width(nw);

        }).trigger('resize.example');

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
   @include('scripts.script_welcome')
   </body>
</html>
