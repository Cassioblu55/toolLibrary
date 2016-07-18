<?php

	function sendErrorMessage($message){
		echo '<div class="container-fluid">
				<div class="row">
					<div id="error-box" class="col-md-6 col-md-offset-3 error-box">
						<div class="error-text text-center">$message</div>
					</div>
				</div>
			 </div>
		';
	}
?>

<style>

	.error-box{
		opacity: 1;
		background: rgb(255, 0, 0);
		position: fixed;

		border-radius: 25px;

		color: white;
		text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
		font-size: large;
		font-weight: bold;

		background: rgb(200, 14, 39);
		margin-top: 2%;
		margin-bottom: 5px;

		-moz-transition: opacity 1.5s;
		-webkit-transition: opacity 1.5s;
		-o-transition: opacity 1.5s;
		transition: opacity 2.5s;
		transition-delay: 3s;

		z-index: 100;
	}

	.fade-out-error-box{
		opacity: 0;
	}

</style>

<script>
	window.onload = function(){
		var errorBox = document.getElementById('error-box');
		if(errorBox){
			errorBox.className = errorBox.className +" fade-out-error-box";
		}
	}
</script>
