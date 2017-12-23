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