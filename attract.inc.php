<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap -->
	<title>Saturnalia 2017</title>

	<style type="text/css">
		.card {
			background-color: #eee;
			padding: 0;
			margin: 0;
		}

		.card-image-container {
			padding: 0;
			max-width: 300px;
			background-image: url('img/p2.jpg');
			overflow: hidden;
		}

		.card-content {
			margin-right: 0;
		}

		.card-image {
			padding: 0;
			height: 100%;
			width: auto;
		}

		.card-rules {
			float: right;
			cursor: pointer;
		}

		.card-name {
			font-size: 2.2em;
			line-height: 0.88;
			border-bottom: 1px black;
			border-bottom-style: dashed;
			text-shadow:
			2px 2px #eee,
			2px -2px #eee,
			-2px 2px #eee,
			-2px -2px #eee;
		}

		.card-price {
			position: absolute;
			right: 10px;
			top: 10px;
			font-size: 1.1em;
			text-transform: uppercase;
			letter-spacing: 1.5pt;
		}

		.card-details {
			list-style: none;
			margin:0;
			padding:0;
		}
	</style>

</head>

<body>

	<div class="container" id="cards"></div>

	<script src="js/jquery-2.1.4.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script><!--Bootstrap-->
	<script type="text/javascript">
		function toggle(i) {
			$('#rules'+i).slideToggle();
		}
		var x = JSON.parse(<?php echo getJSON('attract'); ?>);
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

				$content.append($('<a />').addClass('card-rules').attr('onclick', 'toggle('+i+');').text('rules'));

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