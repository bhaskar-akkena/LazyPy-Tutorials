<?php
	$page='feedback';
	$path='../';
	require ($path.'assets/inc/header2.php');
?>

<?php
	include($path.'assets/inc/nav.php');
?>
	<!--<h1>Home page stuff...</h1>
	<div>(eventually, each page will be some includes and a db call only!)</div>-->
	<?php

require $path.'../../../dbConnect.inc';           
		$sql = "SELECT content FROM modularSite where page='$page'";
		$result = $mysqli->query($sql);

		if($result->num_rows > 0){
			//output the data for each row
			while ($row = $result->FETCH_ASSOC()) {
				echo $row['content'];
			}
		}else{
			echo "0 results, did something wrong!";
		}
	?>
<?php
    require($path.'assets/inc/footer1.php');
     mysqli_close($mysqli);

?>