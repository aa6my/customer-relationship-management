<?php
$this->load->view('header');
?>

<form name ="userinput" action="<?php echo base_url(); ?>settings/create_user_now" method="post">

<ul>
	<li>
	<label>User role</label>
    <select name="userrole">
	<?php 
	foreach ($user_role as $key => $value) {?>
	<option value="<?php echo $value['id']; ?>"><?php echo $value['role_name'];?></option>
	<?php  } ?>		                                              
    </select>
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
	<div>
		<input type="submit" value="Submit" />
	</div>
	</li>