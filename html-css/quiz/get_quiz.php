<?php
// Created to provide many exams
// Demo 3 different exams  - Fishing, C+, Java

    session_name("Jim");
	session_start();
	$path = "./";
	$examID = $_GET['examID'];
    $calledURL = basename($_SERVER['REQUEST_URI']);
	require '../../pinclude/dbConnect.inc'; 
	
	$sql="SELECT * FROM quiz WHERE examID = '$examID';";

//     if ((isset($_POST["1Option"])) ||  (isset($_POST["4Option"]))) { //

       if (isset($_POST["submitted"]))  {
         // Come back and want to grade quiz
         $grade = true;
echo '<h4 style="color:green;background:#FFFFBF">' . 'Correct Answers Appear'.'</h4>'; 
     }
     else {
        $grade = false;
     
     }//end of if
   
     //  echo "<h2>"  . $calledURL . "</h2>"; // testing variable $calledURL
?>

<!-- <form action = "get_quiz2.php?examID=1" method = "POST"> --> 

<form action = "<?php echo $calledURL; ?>"   method = "POST">  

 
 
    


<?php
    
	$result = mysqli_query($mysqli, $sql);

	$quiz_id = 0;

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_array($result)) {
			$quizName = $row['heading'];           
            echo '<h2>'.$quizName.'</h2>';
            $_SESSION['quiz']= $quizName;
            //  echo '<h1>' . $_SESSION['quiz'] . '</h1>';
		} //end of while
        
        
        $sqlQ ="SELECT * FROM questions WHERE examID = '$examID';";

        $resultQ = mysqli_query($mysqli, $sqlQ);
        
        $count = 1;

        if (mysqli_num_rows($resultQ) > 0) {
            while($rowQ = mysqli_fetch_array($resultQ)) {
                $question = $rowQ['question'];
                $questionID = $rowQ['questionID'];
                
                echo $count. '. <p style="display: inline-block;">'.$question.'</p><br/>';
                
                
                $count++;
                
                $sqlOptions ="SELECT * FROM multipleChoiceOptions WHERE questionID = '$questionID';";

                $resultOptions = mysqli_query($mysqli, $sqlOptions);


                if (mysqli_num_rows($resultOptions) > 0) {
                    $optionCount = 1;
                    while($rowOptions = mysqli_fetch_array($resultOptions)) {
                        $option = $rowOptions['mcOption'];
                        $c  = $rowOptions['isCorrect'];
                 
                        echo '&nbsp;&nbsp;&nbsp;&nbsp;'.$optionCount.') <label ';
                        
                        if($grade && $c == 1 ){
        echo 'style="font-weight:bold;color:green;background:#FFFFBF;"';
                        }
                        echo '>'.$option.'</label>
                       
                       
    <input name="'.$questionID.'Option"  value="'.$c.'" type="radio" />            <br/>';
                        
                        $optionCount++;

                    } //end of while
                    
                    echo "<p>&nbsp;</p>";

                } // end of getting options
                
            } //end of while
            
        
            
            
            
        }// end of getting question
		
	} // end of getting quiz

?>
    
     		<div id="button">
			<input type = "submit"  name="submitted" value="SUBMIT">
		</div><!-- end of div for submit button -->   
</form>
