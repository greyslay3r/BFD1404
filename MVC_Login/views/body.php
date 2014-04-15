<?php
//data is coming from the viewModel
echo "<center>";

foreach($data as $d){

	echo $d["name"];
	echo " ";
	echo $d["fullname"];
	echo " <a href=?action=details&id=".$d["id"].">details</a>";
	echo "<br>";
}
echo "</center>";

?>