<script>
   $(document).ready(function() {
          $('.test_class').select2();   			   
   			});

       $('.loginlink').click(function(){

			    $('.image_class')[0].click();
			  
			 });  	
   				
</script>












   <script type="text/javascript">
     
      $(document).ready(function(){
      $("#editform").hide();
      $(".basic_edit").click(function(){
      $(".basicdetails_form").hide();
      $("#editform").show();
      
      });
        $(".loader_cls").hide();  
      $("#basic_details").click(function(){
            $('#basicdtls').validate({
                rules: {
              age_from: {required: true ,},
              age_to: {required: true ,},
              height_from: {required: true ,},
              height_to: {required: true ,},
              country_livingin: {required: true ,},        
              marital_status: {required: true ,},        
             
                         },
                                
         highlight: function(element) {
             $(element).addClass('red');
         },
         unhighlight: function(element) {
             $(element).removeClass('red');
         },
         submitHandler: function(form) {  
           $(".loader_cls").show();  
     
          $(".basicdetails_form").show();
      $("#editform").hide();
         
      
      var value =$("#basicdtls").serialize() ;
          
            
                               $.ajax({
                               type:'POST',
                               url: "{{ url('user/update-basicdetailsdp') }}",
                               data: value,
                               success:function (update_basicdetails){
                                   $(".loader_cls").hide();
                               console.log("update_basicdetails");
      
                                         if(update_basicdetails==1){
                                                   window.location="{{ url('user/profileview') }}";
                                                   //alert("Successfully Updated");
                                                
                                                   location.reload();													 
                                                    													 
                                                           }
                                                   else{
                                                   $(".msg").html('error');
                                                       }
                                                   } 
                                      }); 
                   } 
                });   
      		  });
    
 
     ////////////////////////////////update religious info////////////////////////////////////////////////	 
      
      $("#location_hide").hide();
      $(".Religious_Information").click(function(){
      $(".religious_info_details").hide();
      $("#location_hide").show();
      
      });
       $(".loader_cls").hide(); 
      $("#regg1").click(function(){

        $('#loctnform').validate({
                rules: {
               religion: {required: true ,}, 
                caste: {required: true ,},
                mother_tongue: {required: true ,},
                
               
         },
                                
         highlight: function(element) {
             $(element).addClass('red');
         },
         unhighlight: function(element) {
             $(element).removeClass('red');
         },
         submitHandler: function(form) {                


           $(".loader_cls").show(); 
      $(".religious_info_details").show();
      $("#location_hide").hide();
      
            var value =$("#loctnform").serialize() ;
            console.log(value);
                               
      
                               $.ajax({
                               type:'POST',
                                url: "{{ url('user/update-religiousinformation-dpp') }}",
                               data: value,
                               success:function (editreligious_info){
                                     $(".loader_cls").hide(); 
                               console.log(editreligious_info);
       
                                            if(editreligious_info==1){
      
                                                window.location="{{ url('user/dpp') }}";	
                                               
      		
                                                           }
                                                   else{
                                                   $(".msg").html('error');
                                                       }
                                                   } 
                                      }); 
                             }
                           });
      		  });
          
           //////////////////////////////////update location//////////////////////////////////////////////
     
      $("#loctn_hide").hide();
      $(".edit_location").click(function(){
      $(".location_details").hide();
      $("#loctn_hide").show();
      
      });
      $(".loader_cls").hide();  
      $("#loc_dtls").click(function(){

          $('#lctndetails-form').validate({
                rules: {
             
                state: {required: true ,},
                 district: {required: true ,},
         mother_tongue: {required: true ,},
        
         },
                                
         highlight: function(element) {
             $(element).addClass('red');
         },
         unhighlight: function(element) {
             $(element).removeClass('red');
         },
         submitHandler: function(form) {
          $(".loader_cls").show();  
      $(".location_details").show();
      $("#loctn_hide").hide();
      
      var value =$("#lctndetails-form").serialize() ;
                             
      
                               $.ajax({
                               type:'POST',
                               url: "{{ url('user/update-location') }}",
                               data: value,
                               success:function (location){
                                   $(".loader_cls").hide();  
                               console.log(location);
       
                                            if(location==1){
      
                                                window.location="{{ url('user/profileview') }}";
                                              
      		
                                                           }
                                                   else{
                                                   $(".msg").html('error');
                                                       }
                                                   } 
                                      }); 
                             }
                           });
      		  });
          //////////////////////////////////update professional information///////////////////////////////////////////////	 
     
      $("#prf_info_hide").hide();
      $(".edit_professionalinfo").click(function(){
      $(".details_professionalinformation").hide();
      $("#prf_info_hide").show();
      
      });
      $(".loader_cls").hide();  
      $("#prf_inf_submit").click(function(){

    $('#profesional_info_form').validate({
                           rules: {
                  education: {required: true ,},  
                  occupation: {required: true ,},  
                  employed_in: {required: true ,},
                  annual_income_from: {required: true ,},
                  annual_income_to: {required: true ,},
        
         },
                                
         highlight: function(element) {
             $(element).addClass('red');
         },
         unhighlight: function(element) {
             $(element).removeClass('red');
         },
         submitHandler: function(form) {


          $(".loader_cls").show();  
      $(".details_professionalinformation").show();
      $("#prf_info_hide").hide();
      
      var value =$("#profesional_info_form").serialize() ;
                               
      
                               $.ajax({
                               type:'POST',
                               url: "{{ url('user/update-professionalinfo-dpp') }}",
                               data: value,
                               success:function (prf_info){
                                   $(".loader_cls").hide();  
                               console.log(prf_info);
   
                                            if(prf_info==1){
      
                                                window.location="{{ url('user/dpp') }}";
                                                
      		
                                                           }
                                                   else{
                                                   $(".msg").html('error');
                                                       }
                                                   } 
                                      }); 
                             }
                           });
      		  });
           //////////////////////////////////update family details///////////////////////////////////////////////	 
          
      $("#family_dtls_hide").hide();
      $(".edit_familydetails").click(function(){
      $(".details_familydetails").hide();
      $("#family_dtls_hide").show();
      
      });
      $(".loader_cls").hide();  
      $("#regg4").click(function(){
         $('#family_details_form').validate({
                           rules: {
          
                fathers_status: {required: true ,}, 
                 mothers_status: {required: true ,},
                 family_values: {required: true ,},
         family_type: {required: true ,},
         familystatus: {required: true ,},
         brothers_married:{required:true,},
                no_of_sisters:{required:true,},
                sisters_married:{required:true,},
         },
                                
         highlight: function(element) {
             $(element).addClass('red');
         },
         unhighlight: function(element) {
             $(element).removeClass('red');
         },
         submitHandler: function(form) {
          $(".loader_cls").show();  
      $(".details_familydetails").show();
      $("#family_dtls_hide").hide();
      
      var value =$("#family_details_form").serialize() ;
                               
                               $.ajax({
                               type:'POST',
                               url: "{{ url('user/update-familydetails') }}",
                               data: value,
                               success:function (family_dtls){
                                   $(".loader_cls").hide();  
                               console.log(family_dtls);
       
                                           if(family_dtls==1){
      
                                    
      				  window.location="{{ url('user/profileview') }}";	
      				 
                                                           }
                                                   else{
                                                   $(".msg").html('error');
                                                       }
                                                   } 
                                      }); 
                             }
                           });
      		  });
            //////////////////////////////////update about my family///////////////////////////////////////////////	 
          
          
      $("#abt_myfamily_hide").hide();
      $(".edit_aboutfamily").click(function(){
      $(".details_aboutmyfamily").hide();
      $("#abt_myfamily_hide").show();
      
      });
      $(".loader_cls").hide();  
      $("#abtmyfamily_form").click(function(){

         $('#aboutmyfamily-form').validate({
                           rules: {
           about_my_family: 
           {
            required: true ,
             minlength: 100,
            maxlength:300
           }, 
         },
                                
         highlight: function(element) {
             $(element).addClass('red');
         },
         unhighlight: function(element) {
             $(element).removeClass('red');
         },
         submitHandler: function(form) {
          $(".loader_cls").show();  
      $(".details_aboutmyfamily").show();
      $("#abt_myfamily_hide").hide();
      
      var value =$("#aboutmyfamily-form").serialize() ;
                               
                               $.ajax({
                               type:'POST',
                               url: "{{ url('user/update-aboutmyfamily') }}",
                               data: value,
                               success:function (abt_myfamily){
                                   $(".loader_cls").hide();  
                               console.log(abt_myfamily);
       
                                           if(abt_myfamily==1){
      
                                              window.location="{{ url('user/profileview') }}";
                                             
      			
                                                           }
                                                else{
                                                $(".msg").html('error');
                                                }
                                              } 
                                       }); 
                             }
                           });
      		 });
      
      
          
      
      });
  				
       $.ajaxSetup({
  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
 
     
   </script>
   
 <script>
    var selected_caste = '';
      $('.loader').hide();
    var value=$("#religion_id").val();
      
      selected_caste = $(".user_caste").val();
      console.log(value);
           $.ajax({
             type: "GET",
             url: "{{ url('user/update-religioncastedpp') }}",
             data:{rel_val:value,caste:selected_caste},
             success:function (return_rel){
                  $('.loader').hide();
             console.log(return_rel);
                if(return_rel!=0){
                                  
                       
                $(".user_caste").html(return_rel);
					
					$('.test_class').select2();
                                  }
                              else
                                {
               $(".msg").html('error');
      											 
                                                            }
                                                        }
           
            }); 


     $("#religion_id").on('change', function() {
           
       $('.loader').show();
      var value=$(this).val();
      
      
           $.ajax({
             type: "GET",
             url: "{{ url('user/update-religioncastedpp') }}",
             data:{rel_val:value},
             success:function (return_rel){
                  $('.loader').hide();
             console.log(return_rel);
                                                    if(return_rel!=0){
                                                       
                                                  $(".user_caste").html(return_rel);
                                                        }
                                                        else{
                                                          $(".msg").html('error');
      											 	
                                                            }
                                                        }
           
            });  
      });
     //////////////////////////////////display state and district/////////////////////////////////////////
     $('.loader_state').hide(); 
     var value=$("#country_id").val();
      
      var selected_state = $(".user_state").val();
      
        
           $.ajax({
             type: "GET",
             url: "{{ url('user/update-country') }}",
             data:{state_val:value},
             success:function (return_sta){
            $('.loader_state').hide(); 
             console.log(return_sta);
                
                 if(return_sta!=0){
                                                     
                     $(".user_state").html(return_sta);
		             $('.user_state').val(selected_state);
					 
                                                        }
                                                        else{
                                                  $(".msg").html('error');
      											  
                                                            }
                                                        }

            });		
				
      $("#country_id").on('change', function() {
     
          $('.loader_state').show(); 
          
       var value=$(this).val();
      
           $.ajax({
             type: "GET",
             url: "{{ url('user/update-country') }}",
             data:{state_val:value},
             success:function (return_sta){
                 $('.loader_state').hide(); 
             console.log(return_sta);
                
                 if(return_sta!=0){
                                              
                     $(".user_state").html(return_sta);
                                                        }
                                                        else{
                                                $(".msg").html('error');
      											
                                                            }
                                                        }
           
            });  
      });
     
       //////////////////////////////////display star moonsign/////////////////////////////////////////
     
      $('.loader_district').hide();
     var value=$("#star_id").val();
        var selected_rassi = $(".user_rassi").val();
       
           $.ajax({
             type: "GET",
             url: "{{ url('user/update-moonsign') }}",
             data:{moonsign_val:value},
             success:function (return_starmoon){
                  $('.loader_district').hide();
             console.log(return_starmoon);
            
                 if(return_starmoon!=0){
                                                   
                     $(".user_rassi").html(return_starmoon);
					 $('.user_rassi').val(selected_rassi);
					 
                                                        }
                                                        else{
                                                            $(".msg").html('error');
      											 	
                                                            }
                                                        }
           
            });  
       $("#star_id").on('change', function() {
       $('.loader_district').show();
       var value=$(this).val();
      
        
           $.ajax({
             type: "GET",
             url: "{{ url('user/update-moonsign') }}",
             data:{moonsign_val:value},
             success:function (return_starmoon){
                  $('.loader_district').hide();
             console.log(return_starmoon);
                                                    
                 if(return_starmoon!=0){
                                                
                     $(".user_rassi").html(return_starmoon);
                                                        }
                                                        else{
                                                            $(".msg").html('error');
      											 	
                                                            }
                                                        }
           
            });  
      });
      //////////////////////////////////display district/////////////////////////////////////////
      $('.loader_district').hide(); 
     var value=$("#state_id").val();
         var selected_district = $(".user_district").val();
       
           $.ajax({
             type: "GET",
             url: "{{ url('user/update-district') }}",
             data:{district_val:value},
             success:function (return_district){
                  $('.loader_district').hide();
             console.log(return_district);
                                                     if(return_district!=0){
                                                     
                                    $(".user_district").html(return_district);
									$('.user_district').val(selected_district);
		               
                                                        }
                                                        else{
                                                        	
                                                            }
                                                        }
           
            });  
            
      $("#state_id").on('change', function() {
        $('.loader_district').show();
       var value=$(this).val();
      
      
           $.ajax({
             type: "GET",
             url: "{{ url('user/update-district') }}",
             data:{district_val:value},
             success:function (return_district){
                  $('.loader_district').hide();
             console.log(return_district);
                                                     if(return_district!=0){
                                                 
                                                     $(".user_district").html(return_district);
                                                        }
                                                        else{
                                                         $(".msg").html('error');
      											  	
                                                            }
                                                        }
           
            });  
      });
      
      $('.loader_occupation').hide();
    var value=$("#educationfield_id").val();
      var selected_caste = $(".user_occupation").val();
     
           $.ajax({
             type: "GET",
             url: "{{ url('user/update-education') }}",
             data:{education_val:value},
             success:function (return_education){
                  $('.loader_occupation').hide();
             console.log(return_education);
                                                    if(return_education!=0){
                                                    
                                                  $(".user_occupation").html(return_education);
      						                      $('.user_occupation').val(selected_caste);
      						  
                                                        }
                                                        else{
                                                         $(".msg").html('error');
      											 
                                                            }
                                                        }
           
            });  
      
       $("#educationfield_id").on('change', function() {
          $('.loader_occupation').show();
      var value=$(this).val();
      
  
           $.ajax({
             type: "GET",
             url: "{{ url('user/update-education') }}",
             data:{education_val:value},
              success:function (return_education){
                   $('.loader_occupation').hide();
              console.log(return_education);
                                                    if(return_education!=0){
                                                      
                                                  $(".user_occupation").html(return_education);
                                                        }
                                                        else{
                                           $(".msg").html('error');
      											   
                                                            }
                                                        }
           
            });  
      });  
      
</script>

<!-- user visibility -->

<script type="text/javascript">

function common_value(){

  /* basicdtls*/

   var name=$("#visibility_name").val();
  var body_type=$('#visibility_body_type').val();
  var complexion=$("#visibility_complexion").val(); 
  var height=$("#visibility_height").val();
  var physical_status=$("#visibility_physical_status").val();
  var weight=$("#visibility_weight").val();
  var marital_status=$("#visibility_marital_status").val();
   var eating_habits=$("#visibility_eating_habits").val();
  var drinking_habits=$('#visibility_drinking_habits').val();
  var smoking_habits=$("#visibility_smoking_habits").val(); 

     /* religious_info*/

  var religion=$("#visibility_religion").val();
  var caste=$("#visibility_caste").val();
  var star=$("#visibility_star").val();
  var rasi=$("#visibility_rasi").val();
   var zodiac=$("#visibility_zodiac").val();
  /* location*/

  var country=$("#visibility_country").val();
  var state=$("#visibility_state").val();
  var mother_tongue=$("#visibility_mother_tongue").val();
  var district=$("#visibility_district").val();

  /* professional_info*/

   var education=$("#visibility_education").val();
  var occupation=$('#visibility_occupation').val();
  var college=$("#visibility_college").val(); 
  var education_in_detail=$("#visibility_education_in_detail").val();
  var occupation_in_detail=$("#visibility_occupation_in_detail").val();
  var employed_in=$("#visibility_employed_in").val();
  var annual_income=$("#visibility_annual_income").val();

   /* family_dtls*/

   var fathers_status=$("#visibility_fathers_status").val();
  var mother_status=$('#visibility_mother_status').val();
  var family_values=$("#visibility_family_values").val(); 
  var family_type=$("#visibility_family_type").val();
  var family_status=$("#visibility_family_status").val();
  var no_of_brothers=$("#visibility_no_of_brothers").val();
  var no_of_sisters=$("#visibility_no_of_sisters").val();
  var brothers_married=$("#visibility_brothers_married").val();
  var sisters_married=$("#visibility_sisters_married").val();

   /* about_my_family*/

   var about_my_family=$("#visibility_about_my_family").val();

  $.ajax({
    type:'POST',
    url:"{{ url('user/user-visibility-permission') }}", 
    data: {name:name,body_type:body_type,complexion:complexion,height:height,physical_status:physical_status,weight:weight,
marital_status:marital_status,eating_habits:eating_habits,drinking_habits:drinking_habits,smoking_habits:smoking_habits,
religion:religion,caste:caste,star:star,rasi:rasi,zodiac:zodiac,country:country,state:state,mother_tongue:mother_tongue,
district:district,education:education,occupation:occupation,college:college,education_in_detail:education_in_detail,
occupation_in_detail:occupation_in_detail,employed_in:employed_in,annual_income:annual_income,
fathers_status:fathers_status,mother_status:mother_status,family_values:family_values,family_type:family_type,
family_status:family_status,no_of_brothers:no_of_brothers,no_of_sisters:no_of_sisters,brothers_married:brothers_married,
sisters_married:sisters_married,about_my_family:about_my_family
}, 
    success:function (insert_visibility){ 
      console.log(insert_visibility);
                                                   
             if(insert_visibility==1){
                             $(".msg").html('success');
                              //  window.location="{{ url('user/profileview') }}";                                                                                        $(".user_occupation").html(return_education);
                                  }
                              else{
                        $(".msg").html('error');
                               
                                   }
    
    }
                            
});

}

</script>
 <!-- user visibility -->
  <script type="text/javascript">
    $(document).ready(function (){
            $("#NoS").change(function() {
          
                // SiM is the id of the other select box 
               
                if ($(this).val() != "None") {
                    $(".sis_m").show();
            
                    //$('.sis_m_class').select2();
                }else{
                    $(".sis_m").hide();
                    $("#visibility_sisters_married").hide();
                    $(".sis").hide();
                } 
            });
        });


</script>
 <script type="text/javascript">
    $(document).ready(function (){

            $("#NfBs1").change(function() {
              //alert("hai");
                // SiM is the id of the other select box 
               var a=$(this).val();
               //alert(a);
                if ($(this).val() != "None") {
                    $("#BrsM").show();
            
                    //$('.sis_m_class').select2();
                }else{
                    $("#BrsM").hide();
                    $("#visibility_brothers_married").hide();
                    $(".bro").hide();
                } 
            });
        });


</script>
<script>
      $(document).ready(function(){
      var content = $('.edit_usernameform1').html();
        $('[data-toggle="popover1"]').popover({content:content, html:true});  
      
        $(".update_username1").click(function(){
                                       
            $("#user_social").click(function(){
          var value =$("#register_username1").serialize();
             //alert(value);
             
          $.ajax({
          type:'get',
           url: "{{ url('user/update-socialmedia') }}",
          data: value,
           success:function (v){ 
      console.log(v);
                                                   
             if(v==1){
                             $(".msg").html('success');
                              window.location="{{ url('user/profileview') }}";                                                                                        $(".user_occupation").html(return_education);
                                  }
                              else{
                        $(".msg").html('error');
                               
                                   }
         }
                                             }); 
                                           });});
      
      });
        
   </script>