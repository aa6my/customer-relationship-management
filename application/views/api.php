<ul>
	<!-- <li><a href="<?php echo site_url('api/example/users');?>">Users</a> - defaulting to XML</li>
	<li><a href="<?php echo site_url('api/example/users/format/csv');?>">Users</a> - get it in CSV</li>
	<li><a href="<?php echo site_url('api/example/user/id/1');?>">User #1</a> - defaulting to XML</li> -->
	<li><a href="<?php echo site_url('apps/dataAll/type/invoices/format/json');?>">Get Data</a> - get it in JSON</li>
	<li><a href="<?php echo site_url('apps/dataAll/4');?>">Delete Data</a></li>
	<!-- <li><a id="ajax" href="<?php echo site_url('api/example/users/format/json');?>">Users</a> - get it in JSON (AJAX request)</li> -->
</ul>

<form action="<?php echo base_url();?>apps/dataAll/cuba/test_je_ni" method="POST">
<input type="text" name="website_name">
<input type="submit" value="Try lah tekan button ni jadi ke x" name="save">

</form>