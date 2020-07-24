<?php

/**
 * Generates a SHA256 Hash password
 *
 */


function generate_sha256_password()
{
	if ( !empty($_POST) && ($_POST['pwd']) !== '' ) {
		$pwd = $_POST['pwd'];
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%*_";
		$hash = hash('sha256', $pwd);
		return $hash;
	}
}

$hash = generate_sha256_password();


?>

<div class="container" style="margin:2em;">
	<div class="form"> 
		<form action="" method="post">
			<div class="form-group" style="margin-top:0.5em;">
				<div class="label">Enter Password</div>
				<input name="pwd" id="pwd">
			</div>
			<div class="form-group" style="margin-top:0.5em;">
				<input type="submit" value="Generate" style="padding:0.5em;">
			</div>
		</form>
	</div>

	<div class="generate">
		<div class="pwd">
			<p><?php echo ( !empty($hash)? $hash:'') ; ?></p>
		</div>
	</div>
</div>
