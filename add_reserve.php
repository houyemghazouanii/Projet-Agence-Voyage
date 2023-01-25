
<?php 

if(isset($_POST['add_guest'])){

	$checkin = $_POST['date'];
	$checkout = $_POST['date'];
	$hotel= $_POST['hotel'];
	
   
	include "fonctions.php";
	 $conn= connect();

		if($checkin < date("Y-m-d", strtotime('+8 HOURS'))){	
		echo "<script>alert('Must be present date')</script>";
 			}

 
  else{			
		$conn->query("INSERT INTO reservation(checkin, checkout) VALUES('$checkin','$checkout')");
		header("location:reply_reserve.php");			
				}



 

}



?>









<!-- <?php

// $conn = new mysqli("localhost", "root", "", "agence") or die(mysqli_error($conn));


// 	if(ISSET($_POST['add_guest'])){

// 		$checkin = $_POST['date'];
// 		$checkout = $_POST['date'];

// 		if($checkin < date("Y-m-d", strtotime('+8 HOURS'))){	
// 				echo "<script>alert('Must be present date')</script>";
// 			}
			
			
			// else{			
			// 	$conn->query("INSERT INTO reservation(checkin, checkout) VALUES('$checkin','$checkout')") or die(mysqli_error($conn));
			// 	header("location:reply_reserve.php");			
			// 			}
						
			// 	}	
				
?> -->