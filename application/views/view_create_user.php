<?php
$this->load->view('header');
?>

<form name ="userinput" action="settings/create_user_now" method="post">

<ul>
	<li>
	<label>User role</label>
	<div>
		<input type="text" name="userrole" value="" size="50" />
	</div>
	</li>
	<li>
	<label>Firstname</label>
	<div>
		<input type="text" name="firstname" value="" size="50" />
	</div>
	</li>
	<li>
	<label>Lastname</label>
	<div>
		<input type="text" name="lastname" value="" size="50" />
	</div>
	</li>
	<li>
	<label>Email</label>
	<div>
		<input type="text" name="email" value="" size="50" />
	</div>
	</li>
	<li>
	<label>Password</label>
	<div>
		<input type="text" name="password" value="" size="50" />
	</div>
	</li>
	<li>
	<label>Status</label>
	<div>
		<input type="text" name="status" value="" size="50" />
	</div>
	</li>
	<li>
	<div>
		<input type="submit" value="Submit" />
	</div>
	</li>