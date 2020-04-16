<style>
	form {
		width: 300px;
		height: 400px;
		margin: 7% auto;
		/* position: absolute; */
		padding: 20px 70px 50px 70px;
		background: rgb(255, 255, 255);
		box-shadow: 0 5px 15px 0 rgba(193, 21, 255, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
	}

	body {
		background: rgba(83, 82, 82, 0.2);
	}

	body .login_title {
		color: #000000;
		height: 58px;
		margin-top: 20px;
		font-weight: 600;
		width: 88%;
		text-align: left;
		font-size: 27px;
		text-align: center;
		font-family: inherit;
	}

	input#login,
	input#captcha,
	input#password {
		border: none;
		padding: 15px 10px;
		border-radius: 3px;
		background: rgb(230, 230, 230);
		width: 106%;
	}

	input#login:focus,
	input#captcha:focus,
	input#password:focus {
		background: rgb(255, 255, 255);
	}

	input[type="submit"] {
		background: #1161ee;
		border: none;
		padding: 15px 20px;
		border-radius: 3px;
		/* background: rgba(255,255,255,.1); */
		width: 92%;
		color: #fff;
		display: block;
		text-transform: uppercase;
		box-sizing: border-box;
	}

	td {
		padding: 5px 0px;
		width: 100%;
		display: inherit;
	}

	a {
		color: inherit;
		text-decoration: none;
		padding: 0px 32px;
		margin-top: 20px;
		color: #0300ff;
		border-left: 16px solid;
	}

	a:hover {
		color: #ff009a;
	}

	hr {
		width: 92%;
		float: left;
	}

	img {
		width: 250px;
	}

	a.social-signin {
		margin-bottom: -7px;
		padding-top: 13px;
		width: 218px;
		float: left;
		height: 31px;
		border: none;
		border-radius: 2px;
		color: #FFF;
		font-family: 'Roboto', sans-serif;
		font-weight: 500;
		transition: 0.2s ease;
		cursor: pointer;
	}

	.social-signin:hover,
	.social-signin:focus {
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
		transition: 0.2s ease;
	}

	.social-signin:active {
		box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
		transition: 0.2s ease;
	}

	.social-signin.facebook {
		background: #1751f3;
	}

	.social-signin.twitter {
		background: #55ACEE;
	}

	.social-signin.google {
		background: #DD4B39;
	}
</style>


<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'placeholder'	=> 'Enter E-mail',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($login_by_username and $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'placeholder'	=> 'Enter Password',
	'class'	=> 'check',
	'size'	=> 30,
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<form action="<?php echo base_url(); ?>auth/login" method="post" accept-charset="utf-8">
	<table>
		<div class='login_title'>
			<span>Login to your account</span>
		</div>
		<tr>
			<td><?php echo form_input($login); ?></td>
			<td style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']]) ? $errors[$login['name']] : ''; ?></td>
		</tr>
		<tr>
			<td><?php echo form_password($password); ?></td>
			<td style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']]) ? $errors[$password['name']] : ''; ?></td>
		</tr>

		<tr>
			<td colspan="3">
				<?php echo form_checkbox($remember); ?>
				<?php echo form_label('Remember me', $remember['id']); ?>
			</td>
		</tr>
	</table>
	<?php echo form_submit('submit', 'Sing In'); ?>
	<hr>
	<?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register an Account'); ?>
	<?php #echo anchor('/auth/forgot_password/', 'Forgot password'); 
	?><br>

	<div id="connect-with-buttons">
		<a href="<?php echo base_url() ?>auth_oa2/session/google" class="connect-with-button marginleft13 account-sprites account-sprites-google social-signin google" title="Log in Use Google Account">Log in with Google</a><br>
	</div>
	<?php echo form_close(); ?>