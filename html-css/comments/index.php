<?php
// Arquette, John
// ISTE 240.04
require "../../pinclude/dbConnect.inc";

if ($mysqli) {
	if(!empty($_GET['name']) && !empty($_GET['comment'])) {

		$stmt=$mysqli->prepare("insert into comments (name, comment) values (?, ?)"); //bind param fills '?' with data below, 'prepare' gets compiled so it runs faster, and it's more secure because it cleanses the data.
		$stmt->bind_param("ss",$_GET['name'],$_GET['comment']); //s becuase get 'name' is a string, strips anything typed
		$stmt->execute();
		$stmt->close();

	}
	  //get contents of table and send back...
    $sql = "SELECT name, comment FROM comments";
	$res =$mysqli->query($sql);
	if($res){
		while($rowHolder = mysqli_fetch_array($res,MYSQLI_ASSOC)){ // $rowHolder['name'] $rowHolder['comment']
			$records[] = $rowHolder;                               // $records[3]['name']['comment']
		}
//var_dump($records); //Used to debug your while loop. Display the database table comments
	  }
	}// end of if $mysqli
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Comments/Feedback</title>
</head>
<body>
<h3>Previous comments above</h3>
<div id="list">
	<ul>
	<?php
		foreach($records as $this_row){
			
		} // end of foreach loop
	?>
	</ul>
</div>
<hr/>
<h3>Tell us what you think:</h3>
<form action="index.php" method="GET">		
	Name: <input type="text" id="name" name="name" widt="40" placeholder="Enter your name" />
	<p>&nbsp;</p>
    Comment:<br /> <textarea id="comment" name="comment" cols="90" rows="10"></textarea>
    <p><input type="submit" value="Add to the List"/></p>
</form>

    
    
<!-- GET Date from operating System -->    
<?php
$filename = 'index.php';
if (file_exists($filename)) {
    echo "Last modified: " . date ("l, F d Y h:ia", filemtime($filename));
}
?>

</body>
</html>