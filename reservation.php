<?php session_start();
//  include "fonctions.php";

//  if(isset($_GET['id'])){

//  $hotels = AfficherHotel();
//  }
?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>Hotel Online Reservation</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "css/style.css" />
	</head>
<body>
<?php include "header.php" ?>

	<br><br>
    <br>
				<br style = "clear:both;" />
				<div class = "well col-md-4">
					<form method = "POST" enctype = "multipart/form-data">
					
                    <input type="hidden" name="hotel" value="">

						<div class = "form-group">
							<label>Check in</label>
							<input type = "date" class = "form-control" name = "date" required = "required" />
						</div>
                        <div class = "form-group">
							<label>Check out</label>
							<input type = "date" class = "form-control" name = "date" required = "required" />


						</div>
						<br />
						<div class = "form-group">
							<button class = "btn btn-info form-control" name = "add_guest"><i class = "glyphicon glyphicon-save"></i> Submit</button>
						</div>
					</form>
				</div>
                <?php require_once 'add_reserve.php'?>

		</div>
	</div>
	<br />
	<br />
	
</body>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>	
</html>