var preloader = document.getElementById('preloader');
var spinner = document.getElementById('spinner');
var content = document.getElementById('content');
content.style.opacity = '0';
preloader.style.visibility = 'visible';

window.onload = function() {
	setTimeout(function(){
		spinner.style.opacity = '0';
		preloader.style.opacity = '0';
	},1000);
	setTimeout(function(){
		preloader.style.display = 'none';
	},1700);
	content.style.opacity = '1';
}