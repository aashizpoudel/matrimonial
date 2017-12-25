 <script>
	$(document).ready(function() {
	add_male();
 });
 function add_male() {
   var input = document.getElementById('male_image').alt;
     document.getElementById('gendr').value=input;


    var image = document.getElementById('male_image');
    if (image.src.match("male1")) {
        image.src = "{{asset('assets/images/male.gif')}}";
    } else {
        image.src = "{{asset('assets/images/male1.png')}}";
    }
}
function add_female() {
  var input = document.getElementById('female_image').alt;
   document.getElementById('gendr').value=input;
  var image = document.getElementById('female_image');

    if (image.src.match("female2")) {
        image.src = "{{asset('assets/images/female.gif')}}";
    } else {
        image.src = "{{asset('assets/images/female2.png')}}";
    }
}
function remove_male() {
    var image = document.getElementById('male_image');
    if (image.src.match("male1")) {
        image.src = "{{asset('assets/images/male.gif')}}";
    }
}
function remove_female() {
    var image = document.getElementById('female_image');
    if (image.src.match("female2")) {
        image.src = "{{asset('assets/images/female.gif')}}";
    }
}


</script>
<script language="javascript" type="text/javascript">
function randomString() {
  var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZ";
  var string_length = 8;
  var randomstring = '';
  for (var i=0; i<string_length; i++) {
    var rnum = Math.floor(Math.random() * chars.length);
    randomstring += chars.substring(rnum,rnum+1);
  }

   document.getElementById('randid').value= randomstring;
}
</script>

 <script type="text/javascript">
     $(document).ready(function()
 {


         var currentYear = (new Date).getFullYear();
         var curr_month = (new Date).getMonth();
         var currentday = (new Date).getDate();

         var min= currentYear-41;
         var max= currentYear-19;

         minAge = curr_month+"-"+currentday+"-"+min;
         maxAge = curr_month+"-"+currentday+"-"+max;

     $("#dtBox").DateTimePicker({

         maxDate:maxAge,
         minDate:minAge,
     });



 });
   </script>


<script>
         $(document).ready(function(){
              add_male();
         $('.reg-field').keypress(function(e) {

                if(e.which == 13) {
                $("#registration").click();
                                }
                                });
              $("#registration").validate({
       // ignore: [],
          ignore: "input[type='text']:hidden",
        rules: {

   gender: "required",

       username:{
            required: true,
            minlength: 3,
      maxlength:8
                  },
        password: {
            required: true,
            minlength: 4,
      maxlength:12
                  },

            email: {
            required: true,
            email: true
                   },
    dob: "required",
    contact_num: {
            required: true,
      number:true,
      digits: true,
       minlength: 10,
            maxlength: 15
                  },
         },
    highlight: function(element) {
            $(element).addClass('red');
        },
        unhighlight: function(element) {
            $(element).removeClass('red');
        },

  /*
  submitHandler: function (form) {

       $('.loader1').show();
      var value =$("#registration").serialize() ;
      var email_id = $("#email").val();
     //  alert(value);
     $.ajax({
     type:'POST',
     url: "{{ url('user/userregistration') }}",
     data: value,
     success:function (registration){
     $(".message").show();
   $('.loader1').hide();
 console.log(registration);
        if(registration==1)
            {
             $(".message").html('<div class="alert alert-success">Succesfully registered, check your email to verify your account</div>');
                      setTimeout(function(){$(".message").hide(); }, 3000);

                  }
       else if(registration==2)
                 {
             $(".message").html('<div class="alert alert-danger">Username Already Exist</div>');
                     setTimeout(function(){$(".message").hide(); }, 3000);
         }


               else
         {
             $(".message").html('<div class="alert alert-danger">Sorry, it looks like ' +email_id+ ' belongs to an existing account</div>');
                     // setTimeout(function(){$(".message").hide(); }, 3000);
           }


                 }
                 });

  }
   */

                             });
 });

</script>
<script>
$(document).ready(function(){

  $('.login-field').keypress(function(e) {

    if(e.which == 13) {
     $("#login_id").click();
                    }
        });

    $("#login_id").click(function(){

  var value =$("#login_form").serialize() ;

    $.ajax({
    type:'POST',
    url:"{{ url('user/login') }}",
    data: value,
    error:function(e){
      console.log(e);
      $('#error').html(e.responseText);
    },
    success:function (login){
        $(".login_msg").show();
    console.log(login);
      if(login==1)
           {
          window.location="{{ url('user/search') }}";
           }
         else if(login==2)
         {

          window.location="{{ url('user/activation') }}";
            }
      else if(login==0){

                 window.location="{{ url('user/login-failed?attempt_failed') }}";



        }
       else if(login==3 || login=='3Soulmate')
                    {
               window.location="{{ url('user/profile') }}";
            }

            else if(login==4)
            {
                if(login==4)
                    {
                      alert("Same Gender.So Choose Opposite Gender in Highlighted Profile");
                       window.location="{{ url('/') }}";
                    }
                else
                    {
                   $(".login-field").focus();
      window.location = "{!! URL::to('user/search-profile-view/"+login+"')!!}";
               /* setTimeout(function(){$(".login_msg").hide(); }, 3000);*/
                    }


            }else if(login==9 || login=='9Soulmate'){
              window.location="{{ url('user/login-failed') }}";
            }
           else
            {
                if(login=='error')
                    {
                      alert("Same Gender.So Choose Opposite Gender in Highlighted Profile");
                       window.location="{{ url('/') }}";
                    }
                else
                    {
                   $(".login-field").focus();
      window.location = "{!! URL::to('user/search-profile-view/"+login+"')!!}";
               /* setTimeout(function(){$(".login_msg").hide(); }, 3000);*/
                    }


            }
                              }
             });
        });
     });

</script>
<!-- search -->



 <script>
 $(document).ready(function() {

add_male();
 });
 function add_search_male() {
   var input = document.getElementById('search_male_image').alt;
     document.getElementById('search_gender').value=input;


    var image = document.getElementById('search_male_image');
    if (image.src.match("male1")) {
        image.src = "{{asset('assets/images/male.gif')}}";
    } else {
        image.src = "{{asset('assets/images/male1.png')}}";
    }
}
function add_search_female() {
  var input = document.getElementById('female_image').alt;
   document.getElementById('search_gender').value=input;
  var image = document.getElementById('search_female_image');

    if (image.src.match("female2")) {
        image.src = "{{asset('assets/images/female.gif')}}";
    } else {
        image.src = "{{asset('assets/images/female2.png')}}";
    }
}
function remove_search_male() {
    var image = document.getElementById('search_male_image');
    if (image.src.match("male1")) {
        image.src = "{{asset('assets/images/male.gif')}}";
    }
}
function remove_search_female() {
    var image = document.getElementById('search_female_image');
    if (image.src.match("female2")) {
        image.src = "{{asset('assets/images/female.gif')}}";
    }
}


</script>



<script>
         $(document).ready(function(){
               add_search_male();

              $("#search").validate({


        rules: {

    search_gender: "required",
    dateob:"required",


         },
    highlight: function(element) {
            $(element).addClass('red');
        },
        unhighlight: function(element) {
            $(element).removeClass('red');
        },

     submitHandler: function (form) {

          $('.loader1').show();
         var value =$("#search").serialize() ;

        //  alert(value);
        $.ajax({
        type:'POST',
        url: "{{ url('user/user-search') }}",
        data: value,
        success:function (registration){
        $(".message").show();
      $('.loader1').hide();
    console.log(registration);
           if(registration==1)
               {

                     window.location="{{ url('user/not-login-search') }}";
                     }


                  else
            {
                $(".search_message").html('<div class="alert alert-danger">Sorry,error</div>');
                        // setTimeout(function(){$(".message").hide(); }, 3000);
              }


                    }
                    });

     }

                             });
 });

</script>
