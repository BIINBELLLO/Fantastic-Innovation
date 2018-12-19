<?php
// $a=array("a"=>"red","b"=>"green","c"=>"blue");
$a = array();
array_push($a, "yellow");
array_push($a, "blue");
array_push($a, "green");
array_push($a, "red");
$res = -1;
$res = array_search("red",$a);

if ($res!= -1) {
	# code...
	echo "Yees";
}else{
	echo "Good";
}
?>