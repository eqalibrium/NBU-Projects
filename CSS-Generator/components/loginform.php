<div class="login">
	<form method="post" action="login.php"
		id="loginform">
		<div id="error"></div>
		<legend>Login to CSS Generator</legend>
		<fieldset>
			<div class="inputfield">
				<label>Username: </label> <input type="text" name="username"
					maxlength="60" class="textfield"
					value="<?php echo (isset($_POST['username']) ? $_POST['username'] : ''); ?>" required placeholder="Enter email address" />
			</div>
			<div class="inputfield">
				<label>Password:</label> <input type="password" name="password" class="textfield"
					value="<?php echo(isset($_POST['password']) ? $_POST['password'] : '') ;?>" required placeholder="Enter password"/>
			</div>
			<div class="formactions">
				<input type="button" name="register" id="registerformbutton" value="Register" class="registerformbutton">
				<input type="submit" value="Login" name="login" id="login" />
			</div>
		</fieldset>
	</form>
</div>
<script>
	$("#loginform").validate({
	  submitHandler: function(form) {
		  jQuery('#loginform').submit(function(){
		        var data = jQuery('#loginform').serialize();
		        $.ajax({
		            url:"login.php",
		            method: "post",
		            data : data,
		            success:function(result){
		                if (result != 'false' && result != '0'){
		                    jQuery('#mainbody').html(result);
		                    jQuery('#logout').show();
		                } else {
		                    jQuery('#error').show().html("user or password not correct")
		                }
		          }});
		          return false;
		    })
	  }
	});
	$('#registerformbutton').click(function(){
		$("#loginform").hide();
		$("#registerform").show();
	});
</script>