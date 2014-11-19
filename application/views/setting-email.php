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
                                    <h3 class="box-title">Email Preferences</h3>
                                </div><!-- /.box-header -->
                                <?php $this->load->view('setting-top-menu'); ?>
                                <!-- form start -->
                                <?php $attributes = array('role' => 'form'); ?>
                                <?php echo form_open("settings/updateemail", $attributes); ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="Email">Email</label>
                                            <input type="text" class="form-control" name="email" value="<?php echo $this->config->item('email'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="Password">Password</label>
                                            <input type="text" class="form-control" name="emailpassword" value="<?php echo $this->config->item('emailpassword'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="Protocol">Protocol</label>
                                            <input type="text" class="form-control" name="protocol" value="<?php echo $this->config->item('protocol'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="SMTP Host">SMTP Host</label>
                                            <input type="text" class="form-control" name="smtp_host" value="<?php echo $this->config->item('smtp_host'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="SMTP Port">SMTP Port</label>
                                            <input type="text" class="form-control" name="smtp_port" value="<?php echo $this->config->item('smtp_port'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="SMTP Timeout">SMTP Timeout</label>
                                            <input type="text" class="form-control" name="smtp_timeout" value="<?php echo $this->config->item('smtp_timeout'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="Charset">Charset</label>
                                            <input type="text" class="form-control" name="charset" value="<?php echo $this->config->item('charset'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="Newline">Newline</label>
                                            <input type="text" class="form-control" name="newline" value="<?php echo $this->config->item('newline'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="Wordwrap">Wordwrap</label>
                                            <input type="text" class="form-control" name="wordwrap" value="<?php echo $this->config->item('wordwrap'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="Mailtype">Mailtype</label>
                                            <input type="text" class="form-control" name="mailtype" value="<?php echo $this->config->item('mailtype'); ?>">
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                <?php echo form_close(); ?>
                            </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
    </body>
</html>
