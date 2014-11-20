<!DOCTYPE html>
<html>
    <?php $this->load->view('header'); ?>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php $this->load->view('top'); ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <?php $this->load->view('sidebar-userpanel'); ?>
                    <!-- search form -->
                    <?php $this->load->view('sidebar-search'); ?>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <?php $this->load->view('sidebar-menu'); ?>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo $top_title;?>
                        <small><?php echo $top_desc;?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo $top_title;?></li>
                    </ol>
                </section>
				

                <!-- Main content -->
                <section class="content">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Edit User</h3>
                                </div><!-- /.box-header -->
                                <?php $this->load->view('setting-top-menu'); ?>
                                <form name ="userinput" action="<?php echo base_url(); ?>settings/update_user_now/<?php echo $this->uri->segment(4); ?>" method="post">
                                <div class="box-body">
                                    <div class="form-group">
                                   
                                    <label>User role</label>
                                    <select class="form-control" name="userrole">
                                    <?php 
                                    foreach ($user_role as $key => $value) {?>
                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['role_name'];?></option>
                                    <?php  } ?>                                                   
                                    </select>
                                    </div>
                                    <div class="form-group">
                                    <label>Firstname</label>
                                    <input type="text" name="firstname" value="<?php echo $details[0]['first_name']; ?>" class="form-control" placeholder="Enter ..." REQUIRED>
                                    </div>
                                    <div class="form-group">
                                    <label>Lastname</label>
                                    <input type="text" name="lastname" value="<?php echo $details[0]['last_name']; ?>" class="form-control" placeholder="Enter ..." REQUIRED>
                                    </div>
                                    <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="<?php echo $details[0]['email']; ?>" class="form-control" placeholder="Enter ..." REQUIRED>
                                    </div>
                                    <div class="form-group">
                                    <label>Password</label> - please insert new password !
                                    <input type="text" name="password" class="form-control" placeholder="Enter ..." REQUIRED>
                                    </div> 
                                    <div>
                                        <input type="submit" value="Submit" />
                                    </div>
                                </div>

                                </form>
                            </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- AdminLTE App -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
    </body>
</html>
