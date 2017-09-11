<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap -->
	<link href='css/card.css' rel='stylesheet' type='text/css'>
	<title>Saturnalia 2017</title>
</head>

<body>

	<div class="container" id="cards"></div>

	<script src="js/jquery-2.1.4.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script><!--Bootstrap-->
	<script type="text/javascript">
		function toggle(i) {
			$('#rules'+i).slideToggle();
		}
		var x = JSON.parse(<?php echo getJSON('culture'); ?>);
		$(document).ready(function() {
			for (var i = 0; i < x.length; i++) {

				var $card = $('<div/>').addClass("card row");

				$card.append(
					$('<div />')
					.addClass('card-image-container col-xs-4')
					.append('<img>')
						.attr('src', 'img/'+x[i].photo+'.jpg')
						.addClass('card-image')
				);

				var $content = $('<div />').addClass('card-content col-xs-8');
				$content.append($('<h4 />').addClass('card-name').text(x[i].title));
				$content.append($('<p />').addClass('card-desc').text(x[i].desc));
				$content.append($('<div />').addClass('card-price').text(x[i].prize));

				var $desc = $('<ul />').addClass('card-details');
				$desc.append($('<li />').addClass('card-date').text(x[i].date));
				$desc.append($('<li />').addClass('card-venue').text(x[i].venue));
				$desc.append($('<li />').addClass('card-time').text(x[i].time));
				$content.append($desc);


				$content.append($('<span />').addClass('card-rules-toggle fa fa-chevron-down').attr('onclick', 'toggle('+i+');').text(' Rules'));

				var $rules = $('<div />').addClass('card-rules').attr('id', 'rules'+i);

				var $list = $('<ol />').addClass('card-rule-list');
				for (var j = 0; j < x[i].rules.length; j++) {
					$list.append($('<li />').text(x[i].rules[j].desc));
				}
				$rules.append($list);
				$content.append($rules.hide());

				$card.append($content);

				$('#cards').append($card);
			}
		});
	</script>
</body>
</html>