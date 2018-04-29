  <!--  chat-->
            <div id="main_container">
              <button class="chat-btn-close">
           X
           </button>
<ul class="headofchat">
  <li><img src="{{asset('assets/images/chat/chaticon.png')}}"></li>
  <li>Online Members</li>
</ul>
<div class="chatlistcontent">

<?php
$data = $results['chat_users'];

foreach($data as $status)
{

  ?>
 

<a title="" data-placement="left" data-toggle="tooltip" data-original-title="Tooltip on left" href="javascript:void(0)" onClick="javascript:chatWith('<?php echo $status->username;?>', '<?php echo $status->name;?>')">
       <?php if($status->status =='online') {?>
                <img class="" src="{{asset('assets/images/chat/online.png')}}"><?php }
        elseif($status->status =='busy') {?>
                <img class="" src="{{asset('assets/images/chat/busy.png')}}"> <?php }
        else {?><img class="" src="{{asset('assets/images/chat/offline.png')}}">
        <?php }?>&nbsp;&nbsp;
                 <?php if(empty($status->path))
            {?>
                       <img  class="imagechat" src="{{asset('assets/images/default_profile.jpg')}}">
                        <?php } else
            {
              ?>
               <img class="imagechat" src="{{asset($status->path)}}">
              <?php } ?>
              &nbsp;&nbsp;  <?php echo $status->name;?></a>
             
             


<!-- YOUR BODY HERE -->
<?php }?>
</div>
<ul class="searchlistchat">
  <li class="textarealist"><img class="" src="{{asset('assets/images/chat/chat-search-icon.gif')}}">
    <input class="chatsearchfield chatsearch" type="text" id="inputSearch"   autocomplete="off" name="chatsearch" placeholder="Find a Member"></li>
    
    <div class="result1">
</div>





  <li class="statusdrpdwn">
  <div data-example-id="static-dropup" class="bs-example">
    <div class="dropup">
      <a aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown" id="dropdownMenu2" class="dropdown-toggle"><img class="" src="{{asset('assets/images/chat/chatstatus.png')}}"></a>
          
      <ul aria-labelledby="dropdownMenu2" class="dropdown-menu chatstatusdrpdw">
        <li><a href="#" class="a" title="offline"><span class="statuschat">Offline</span> <img class="statuschatimg" src="{{asset('assets/images/chat/offline.png')}}"></a></li>
        <li><a href="#" class="a" title="online"><span class="statuschat" >Online</span> <img class="statuschatimg" src="{{asset('assets/images/chat/online.png')}}"></a></li>
        <li><a href="#" class="a" title="busy"><span class="statuschat">Busy</span> <img class="statuschatimg" src="{{asset('assets/images/chat/busy.png')}}"></a></li>
      <!--   <li><a href="#" class="a" title="turnoffchat"><span class="statuschat">Turn Off Chat</span> </a></li> -->
    
      </ul>
    </div>
  </div>
  
  </li>
</ul>
</div>