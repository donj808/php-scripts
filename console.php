<?php

/**
 *  A php web console to run php scripts
 * 
 */

?>

<style>
	.code-box {
		border: 1px solid #dde6ed;
		background: #fbfbfc;
		padding: 1em;
	}

</style>

<div class="container" style="margin:2em;">
	<h1>PHP Console</h1>
	<div class="code-box"> 
		<form action="" method="post">
			<div class="form-group" style="margin-top:0.5em;">
				<textarea name="code" style="width: 100%;height:400px;"><?php echo $_POST['code']; ?></textarea>
			</div>
			<div class="form-group" style="margin-top:0.5em;">
				<input type="submit" value="Run PHP" style="padding:0.5em;">
			</div>
		</form>
	</div>

	<div class="generate">
		<div class="code-box">
			<p>
				<?php 
					if ( isset($_POST['code']) && !empty($_POST['code'] ) ) {
						ob_start(); 	
						ini_set( 'display_errors', true );
			            eval( $_POST['code']?:"" ); 
			          	$debug_output = ob_get_clean();	
			          	if ( isset( $debug_output ) ) {
							echo "<pre>" . $debug_output . "</pre>" ?:"";
						}
			        } 
				?>
			</p>
		</div>
	</div>
</div>
