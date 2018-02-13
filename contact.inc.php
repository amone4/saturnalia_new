<?php
$error = '';
$success = '';
if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit'])) {
	$p=nullArray(array('email', 'name', 'message', 'dept'));
	if (postVars($p, $err)) {
		if (validateEmail($p['email'])) {
			if (validateName($p['name'])) {
				if (validateName($p['dept'])) {

					$email = '';
					if ($p['dept']=='cultural') {
						$email = '';
					} elseif ($p['dept']=='technical') {
						$email = '';
					} elseif ($p['dept']=='hospitality') {
						$email = '';
					} else {
						$email = '';
					}
					$header = 'From: '.$p['email'];
					mail($email, 'sat query '.$p['name'], $p['message'], $header);
					$success = '<i class="glyphicon glyphicon-ok"></i> Message sent';

				} else {
					$error .= 'Select a valid department';
				}
			} else {
				$error .= 'Enter a valid name';
			}
		} else {
			$error .= 'Enter a valid email';
		}
	} else {
		$error .= 'Enter a valid '.$err;
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
	<link rel="stylesheet" href="css/contact.min.css"> <!-- Resource style -->
	<link rel="stylesheet" href="css/preload.css"> <!-- Resource style -->
	<title>Saturnalia 2017</title>
</head>
<body>
	<div id="preloader">
		<svg id="spinner" width="300px" height="200px" viewBox="0 0 187.3 93.7" preserveAspectRatio="xMidYMid meet" style="left: 50%; top: 50%; position: absolute; transform: translate(-50%, -50%) matrix(1, 0, 0, 1, 0, 0);">
			<path stroke="#ededed" id="outline" fill="none" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M93.9,46.4c9.3,9.5,13.8,17.9,23.5,17.9s17.5-7.8,17.5-17.5s-7.8-17.6-17.5-17.5c-9.7,0.1-13.3,7.2-22.1,17.1c-8.9,8.8-15.7,17.9-25.4,17.9s-17.5-7.8-17.5-17.5s7.8-17.5,17.5-17.5S86.2,38.6,93.9,46.4z" />
			<path id="outline-bg" opacity="0.05" fill="none" stroke="#ededed" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M93.9,46.4c9.3,9.5,13.8,17.9,23.5,17.9s17.5-7.8,17.5-17.5s-7.8-17.6-17.5-17.5c-9.7,0.1-13.3,7.2-22.1,17.1c-8.9,8.8-15.7,17.9-25.4,17.9s-17.5-7.8-17.5-17.5s7.8-17.5,17.5-17.5S86.2,38.6,93.9,46.4z" />
		</svg>
	</div>
	<div class="content">
		<div class="bck" id="home">
			<video loop="" autoplay="" muted="" id="html5video" poster="img/static-wrapper.jpg">
				<source src="bck.mp4" type="video/mp4"/>
			</video>
			<div class="middle">
				<div id="inner">
					<h2>
						Queries?<br>
						<small>
							Feel free to drop a message
						</small>
						<hr>
					</h2>
					<span class="error"><?php echo $error;?></span>
					<span class="success"><?php echo $success;?></span>
					

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
									<div class="input-group">
										<span class="input-group-addon">Department</span>
										<div class="form-control" style="padding: 0">
											<div class="col-xs-3">
												<label class="radio-inline">
													<input type="radio" name="dept" value="technical" checked>Technical
												</label>
											</div>
											<div class="col-xs-3">
												<label class="radio-inline">
													<input type="radio" name="dept" value="cultural">Cultural
												</label>
											</div>
											<div class="col-xs-3">
												<label class="radio-inline">
													<input type="radio" name="dept" value="hospitality">Hospitality
												</label>
											</div>
											<div class="col-xs-3">
												<label class="radio-inline">
													<input type="radio" name="dept" value="others">Others
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-12">
									<button type="submit" name="submit" class="btn btn-primary pull-right">Send <span class="glyphicon glyphicon-send"></span></button>
								</div>
							</div>

						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="js/preload.js"></script>
	<script src="js/jquery-2.1.4.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
<!-- 					<div class="form-group text-capitalize">
						<div class="col-md-12">
							<div class="radio-group">
								<div class="col-xs-3">
									<label>technical</label>
									<input type="radio" name="dept" value="technical">
								</div>
								<div class="col-xs-3">
									<label>cultural</label>
									<input type="radio" name="dept" value="cultural">
								</div>
								<div class="col-xs-3">
									<label>hospitality</label>
									<input type="radio" name="dept" value="hospitality">
								</div>
								<div class="col-xs-3">
									<label>others</label>
									<input type="radio" name="dept" value="others">
								</div>
							</div>
						</div>
					</div> -->
