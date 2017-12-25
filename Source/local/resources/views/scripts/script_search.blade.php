 <script>


$(document).ready(function(){
     $(".loader_cls").hide(); 
						  interest();
		 $(".search_filter").click(function(){
              $(".loader_cls").show(); 
			
             var value =$(".filter_form").serialize() ;
			
			$.ajax({
			type:'POST',
			url: "{{ url('user/userfilter')}}",
			data: value,
			success:function (results){
                 $(".loader_cls").hide(); 
				$('.search-results').html(results);
				interest();
					},
					error:function (results){
				
					}
				});
		});
});
			  /*ajax end here*/
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
</script>

<script>
function interest() {
      $(".loader_cls").hide(); 
		 $(".interest").on("click",function(){
               $(".loader_cls").show(); 
             
			var value =$(this).attr('intrst_id') ;
			var type =$(this).attr('value');
			var button_text = 'INTERESTED';
			var url = "{{ url('user/interestedmember') }}";
			if(type == 'INTERESTED') {
				url = "{{ url('user/interestedmemberstatus') }}";
				button_text = 'INTEREST';
			}
			var thiss = $(this);
			$.ajax({
				   type:'POST',
				   url: url,
				   data:{'intr_id':value},
				   success:function (intrstd_people){
                         $(".loader_cls").hide(); 
					   console.log(intrstd_people);
					   if(intrstd_people==1){
						   $('.intstd'+value).val(button_text);
						   if(button_text=='INTERESTED')
						   {
						     $('.intstd'+value).addClass('intrstd_clr');
						   }
						   else
						   {
							    $('.intstd'+value).removeClass('intrstd_clr');
						   }
					   }
						   else{
							   $(".int_show").html('error');
							   }
							   }
							   });
			});

			  /*ajax end here*/
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
}
</script>	
<!--search-->
<script type="text/javascript">
$(function(){
$(".chatsearch").keyup(function() 
{ 

var inputSearch = $(this).val();
var dataString = 'searchword='+ inputSearch;

  
     $.ajax({
     type: "POST",
     url: "{{ url('user/chat-autocomplete') }}",
     data: dataString,
     cache: false,
     success: function(html)
     {
     
     $(".chatlistcontent").html(html).show();
     }
  
     });
      
      
      
      
return false; 
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
});

jQuery(".result1").on("click",function(e){ 
     var $clicked = $(e.target);
     var $name = $clicked.find('.name').html();
     var decoded = $("<div/>").html($name).text();
     $('#inputSearch').val(decoded);
});
jQuery(document).on("click", function(e) { 
     var $clicked = $(e.target);
     if (! $clicked.hasClass("chatsearch")){
     jQuery(".result1").fadeOut(); 
     }
});
$('#inputSearch').click(function(){
     jQuery(".result1").fadeIn();
});
});


</script>  
	  
	  <script>
$(document).ready(function(){
    $(".loader_cls").hide(); 
     $(".a").click(function(){
      var value =$(this).attr('title') ;
      
      /*if(value=='turnoffchat')
      {
      $('#main_container').hide();  
      }
      else
      {
        $('#main_container').show();
      }*/
      $.ajax({
      type:'GET',
       url: "{{ url('user/status-update') }}",
       data:{'stat':value},
      success:function (status_update){
         console.log(status_update);
           $(".loader_cls").show(); 
         location.reload('user/search');
      
      }
        });
    });
});
        /*ajax end here*/
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
</script>

<script type="text/javascript" src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
<script>
  $('.scrollpart').slimscroll({
        size: '7px',
    
  });
</script>
<script>
$(document).ready(function(){
    $(".chat-btn-close").click(function(){
        $("#main_container").fadeOut();
    });
    $(".chat-btn").click(function(){
        $("#main_container").fadeIn();
    });
 
});

</script>