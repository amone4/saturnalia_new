<?php
$error = '';
$success = '';
if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit'])) {
	$p=nullArray(array('email', 'name', 'message'));
	if (postVars($p, $err)) {
		if (validateEmail($p['email'])) {
			if (validateName($p['name'])) {
				// mail($p['email'], 'sat query by '.$p['name'], $p['message']);
				$success = 'mail sent';
			} else {
				$error .= 'enter valid name';
			}
		} else {
			$error .= 'enter valid email';
		}
	} else {
		$error .= 'enter valid '.$err;
	}
	$error .= '';
}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap -->
	<title>Saturnalia 2017</title>
</head>
<body>
<div class="col-md-offset-4 col-md-4" id="box">
<?php echo $success; echo $error; ?>
	<h2>Contact Us!</h2><hr>

	<form class="form-horizontal" action="" method="POST" id="contact_form">
		<fieldset>

			<div class="form-group">
				<div class="col-md-12">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input name="name" placeholder="Name" class="form-control" type="text">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-12">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
						<input name="email" placeholder="E-Mail Address" class="form-control" type="text">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-12 inputGroupContainer">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
						<textarea class="form-control" name="message" placeholder="Message"></textarea>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-12">
					<button type="submit" name="submit" class="btn btn-warning pull-right">Send <span class="glyphicon glyphicon-send"></span></button>
				</div>
			</div>

		</fieldset>
	</form>

	<script src="js/jquery-2.1.4.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</div>
</body>
</html>