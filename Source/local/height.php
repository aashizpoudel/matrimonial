<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		.labelpadding {
    padding: 15px 30px 0 0
}
.edwid2 {
    width: 492px
}
.fl {
    float: left
}
.fontlig {
    font-family: "Roboto", "sans-serif";
    font-weight: 300
}
.f15 {
    font-size: 15px
}
.color11 {
    color: #34495e
}
.opa90 {
    opacity: 0.9;
    filter: alpha(opacity=90)
}
.pt5 {
    padding-top: 5px
}
.disp_ib {
    display: inline-block
}
.pr5 {
    padding-right: 5px
}
.bg-white {
    background-color: #fff
}
.dpp-sel {
    border: 1px solid #d9d9d9;
    border-radius: 2px
}
.prehide {
    display: none
}
.wid50p {
    width: 50%
}
.txtc {
    text-align: center
}
.padalla {
    padding: 14px 0
}
.pos_rel,
.pos-rel {
    position: relative
}
.pos_abs,
.pos-abs {
    position: absolute
}
.cursp {
    cursor: pointer
}
.sprite2 {
    background-image: url(https://static.jeevansathi.com/images/jspc/commonimg/sprite-two.png);
    background-repeat: no-repeat
}






.dppbox {
    border: 1px solid #d9475c;
    background-color: #fff;
    border-radius: 2px
}
.dppbox {
    display: none
}
.dppbox ul {
    list-style-type: none
}
.dppbox ul.list-agemin li,
.dppbox ul.list-agemax li {
    width: 38px
}
.dppbox ul li {
    float: left;
    border-bottom: 1px solid #d9d9d9;
    line-height: 40px
}
.dppbox ul li:hover {
    background-color: #d9475c;
    color: #fff
}
.dppbox ul li.opa50.bg-white:hover {
    background-color: #fff;
    color: #000
}

.dpp-drop-down {
    background-position: -2px -1px;
    width: 17px;
    height: 10px
}
.dpp_pos1 {
    right: 10px;
    top: 5px
}
.dpp-pos2 {
    bottom: -4px
}
.z1 {
    z-index: 1;
}
.z2 {
    z-index: 2;
}
.dpp-up-arrow {
    background-position: -2px -31px;
    width: 14px;
    height: 11px
}
.disp-none {
    display: none
}
.wid380 {
    width: 380px
}
.dpp-pos3 {
    top: 47px;
    left: 0
}
.scrolla {
    overflow: auto
}
.hgt200 {
    height: 200px
}
.js-selected {
    background-color: #d9475c;
    color: #fff
}


	</style>
</head>
<body>
	<div class="clearfix pt20" id="dpp-p_ageParent">


<label class="labelpadding">Age</label>
<div id="ageRange" class="edwid2 fl">
<!--start:prefiller values-->
<p class="fontlig f15 color11 opa90 pt5 posthide" js-devalue1="2" style="display: none;"><span><span class="disp_ib pr5">18 - 23 years of age</span></span></p>
<!--end:prefiller values-->
<!--start:edit on-->
<div class="bg-white dpp-sel clearfix prehide" style="display: block;">
<div class="fl wid50p txtc padalla dppselopt pos_rel cursp" id="agemin" data-attr="agemin">
<div id="dpp1-p_age" class="pos_rel color11 f15 opa90 js-rangeDiv1"> <span>18</span> years <i class="sprite2 pos_abs dpp_pos2 dpp-drop-down dpp_pos1"></i></div>
<!--start:drop down icon-->
<i class="sprite2 pos_abs z2 dpp-up-arrow disp-none drop-agemin dpp-pos2 hide1" style="display: none; left: 114.5px;"></i>
<!--end:drop down icon-->
<!--start:drop down box-->
<div class="dppbox pos_abs wid380 z1 dpp-pos3 scrolla hgt200 hide1" style="display: none;">
<ul class="clearfix list-agemin">
<li data-dbval="18" class="js-selected">18</li>
<li data-dbval="19">19</li>
<li data-dbval="20">20</li>
<li data-dbval="21">21</li>
<li data-dbval="22">22</li>
<li data-dbval="23">23</li>
<li data-dbval="24">24</li>
<li data-dbval="25">25</li>
<li data-dbval="26">26</li>
<li data-dbval="27">27</li>
<li data-dbval="28">28</li>
<li data-dbval="29">29</li>
<li data-dbval="30">30</li>
<li data-dbval="31">31</li>
<li data-dbval="32">32</li>
<li data-dbval="33">33</li>
<li data-dbval="34">34</li>
<li data-dbval="35">35</li>
<li data-dbval="36">36</li>
<li data-dbval="37">37</li>
<li data-dbval="38">38</li>
<li data-dbval="39">39</li>
<li data-dbval="40">40</li>
<li data-dbval="41">41</li>
<li data-dbval="42">42</li>
<li data-dbval="43">43</li>
<li data-dbval="44">44</li>
<li data-dbval="45">45</li>
<li data-dbval="46">46</li>
<li data-dbval="47">47</li>
<li data-dbval="48">48</li>
<li data-dbval="49">49</li>
<li data-dbval="50">50</li>
<li data-dbval="51">51</li>
<li data-dbval="52">52</li>
<li data-dbval="53">53</li>
<li data-dbval="54">54</li>
<li data-dbval="55">55</li>
<li data-dbval="56">56</li>
<li data-dbval="57">57</li>
<li data-dbval="58">58</li>
<li data-dbval="59">59</li>
<li data-dbval="60">60</li>
<li data-dbval="61">61</li>
<li data-dbval="62">62</li>
<li data-dbval="63">63</li>
<li data-dbval="64">64</li>
<li data-dbval="65">65</li>
<li data-dbval="66">66</li>
<li data-dbval="67">67</li>
<li data-dbval="68">68</li>
<li data-dbval="69">69</li>
<li data-dbval="70">70</li>
`
</ul>
</div>
<!--end:drop down box-->
</div>
<div class="fl brdrl-1 wid49p txtc padalla dppselopt pos_rel cursp" id="agemax" data-attr="agemax">
<div id="dpp2-p_age" class="pos_rel color11 f15 opa90 js-rangeDiv2"> <span>23</span> years <i class="sprite2 pos_abs dpp_pos2 dpp-drop-down dpp_pos1"></i> </div>
<!--start:drop down icon-->
<i class="sprite2 pos_abs z2 dpp-up-arrow disp-none drop-agemax dpp-pos2 hide1" style="display: none; left: 112.547px;"></i>
<!--end:drop down icon-->
<!--start:drop down box-->
<div class="dppbox pos_abs wid380 z1 dpp-pos4 scrolla hgt200 hide1" style="display: none;">
<ul class="clearfix list-agemax">
<li data-dbval="18">18</li>
<li data-dbval="19">19</li>
<li data-dbval="20">20</li>
<li data-dbval="21">21</li>
<li data-dbval="22">22</li>
<li data-dbval="23" class="js-selected">23</li>
<li data-dbval="24">24</li>
<li data-dbval="25">25</li>
<li data-dbval="26">26</li>
<li data-dbval="27">27</li>
<li data-dbval="28">28</li>
<li data-dbval="29">29</li>
<li data-dbval="30">30</li>
<li data-dbval="31">31</li>
<li data-dbval="32">32</li>
<li data-dbval="33">33</li>
<li data-dbval="34">34</li>
<li data-dbval="35">35</li>
<li data-dbval="36">36</li>
<li data-dbval="37">37</li>
<li data-dbval="38">38</li>
<li data-dbval="39">39</li>
<li data-dbval="40">40</li>
<li data-dbval="41">41</li>
<li data-dbval="42">42</li>
<li data-dbval="43">43</li>
<li data-dbval="44">44</li>
<li data-dbval="45">45</li>
<li data-dbval="46">46</li>
<li data-dbval="47">47</li>
<li data-dbval="48">48</li>
<li data-dbval="49">49</li>
<li data-dbval="50">50</li>
<li data-dbval="51">51</li>
<li data-dbval="52">52</li>
<li data-dbval="53">53</li>
<li data-dbval="54">54</li>
<li data-dbval="55">55</li>
<li data-dbval="56">56</li>
<li data-dbval="57">57</li>
<li data-dbval="58">58</li>
<li data-dbval="59">59</li>
<li data-dbval="60">60</li>
<li data-dbval="61">61</li>
<li data-dbval="62">62</li>
<li data-dbval="63">63</li>
<li data-dbval="64">64</li>
<li data-dbval="65">65</li>
<li data-dbval="66">66</li>
<li data-dbval="67">67</li>
<li data-dbval="68">68</li>
<li data-dbval="69">69</li>
<li data-dbval="70">70</li>
</ul>
</div>
<!--end:drop down box-->
</div>
</div>

<!--end:edit on-->
</div><div class="edwid2 fl ml193 pt10 suggestMain" id="suggest_new_AGE"><div class="fontlig f12 wid134 disp_ib color11 mr10">Suggested (click to add)</div><div class="disp_ib suggestParentBox wid345 disp_none vtop"><div class="suggestBoxList"><div id="suggestAge" class="fontlig f14 disp_ib color11 cursp suggestBoxNew"><span id="suggestLAGE">17</span>&nbsp;years&nbsp;-&nbsp;<span id="suggestHAGE">23</span>&nbsp;years</div></div></div></div>

<!-- ending desired partner text section-->
<!--start:filter button-->
<div class="filbtn fl pos-rel h31">
<div class="filterset posthide ml10 cursp" id="AGE-filter" style="display: none;"><span class="colrw"><span>Strict Filter ON</span></span></div>
<div class="pos-abs edwid3 z2 edpos1 filterhover">
<div class="edp3">
<div class="pos-rel fullwid edbr1 padall-10 bg-white"> <i class="sprite2 pos-abs edpop1"></i>
<input type="hidden" id="AGE-hint" value="Age">
<div class="txtc fontreg">
<p class="js-AGE-filter colr5 f15 lh30">Age set as strict filter</p>
<p class="f13 color11 lnHt">Interests from people outside this age range will go to your Filtered Inbox, and they will also not be able to see your Phone/EmailID. </p>
</div>
</div>
</div>
</div>
</div>
<!--end:filter button-->
</div>
</body>
</html>






<?php 



for ($ft=4; $ft < 7; $ft++) { 
	for($in=1; $in<12;$in++){
		if($ft==4 && $in<5 ){
			continue;
		}
		$i =  floor(($ft*12+$in)*2.54);
		echo $ft."ft ".$in."in - ".$i."cm <br>";
	}
}

	$cm = 154;
	$inches = ceil($cm/2.54);
    $feet = floor(($inches/12));
    $measurement = $feet."' ".($inches%12).'"';

    echo $measurement;



 ?>


 											<div class="row pdng25">
											<div class="col-md-8">
												Country :<br>
												<select class=" multiple_country" name="country_livingin" id="country_id"">
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