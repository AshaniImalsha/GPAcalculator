<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" href="result.css" type="text/css">
		<title> GPA Calculator </title>
		
	</head>
	
	<body>
	<h1> Result Sheet</h1>
	
	<button class= "btn" type="button" onclick="window.print()">Print</button>
	<br>
	<br>
	</body>
</html>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $name = $_POST['submit'];
  
  if (empty($name)) {
    echo "Name is empty";
	
	} else {
		//print_r ($_POST);
		$count=count($_POST,COUNT_RECURSIVE)-1;
		$rowSize = $count/3;
		
		$tot=0.0;
		$credits=0;
		$grade_a=array('A+'=>4.0,'A'=>4.0,'A-'=>3.7,'B+'=>3.3,'B'=>3,'B-'=>2.7,'C+'=>2.3,'C'=>2,'C-'=>1.7,"-"=>0);
		
		echo "<table style=\"width:100%;\" border cellpadding=3>";

		echo "<tr><th>Subject</th><th>Credit</th><th>Grade</th></tr>";
		
		for ($x = 0; $x < $rowSize; $x++) {
			
				
				if(isset($_POST['Grade'][$x])){
					
				echo "<tr><td>".$_POST['Subject'][$x]."</td><td>".$_POST['Credit'][$x]."</td><td>".$_POST['Grade'][$x]."</td></tr>";
				$tot=$tot+intval($_POST['Credit'][$x])*floatval($grade_a[$_POST['Grade'][$x]]);
				$credits=$credits+intval($_POST['Credit'][$x]);
			}
		}
		
		
		if($credits>0)
			$gpa=$tot/$credits;
		else
			$gpa=0;
		
		
		echo "<tr style=\"background-color:lightgrey; text-align:center;\"><td colspan='2'>GPA</td><td>".$gpa."</td></tr>";
		
		echo "</table>";
	}
	 
}

?>