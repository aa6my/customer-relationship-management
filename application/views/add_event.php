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

    <div style="margin: 20px">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>calendar">Calendar</a></li>
            <li><a href="<?php echo base_url() ?>calendar/events">Add Event</a></li>
        </ol>
     <?php echo form_open(base_url('calendar/save')) ?>
        <div class="col-sm-8 col-sm-offset-2">
           <div class='col-md-6'>
                <div class="form-group">
                    <div class='input-group date' id='from'>
                        <input type='text' name="from" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>
                </div>
            </div>
            <div class='col-md-6'>
                <div class="form-group">
                    <div class='input-group date' id='to'>
                        <input type='text' name="to" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-12 control-label">Type of event</label>
                <div class="col-sm-12">
                    <select class="form-control" name="class">
                        <option value="event-info">Info</option>
                        <option value="event-success">Success</option>
                        <option value="event-inverse">Inverse</option>
                        <option value="event-important">Important</option>
                        <option value="event-warning">Warning</option>
                        <option value="event-special">Special</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="title" class="col-sm-12 control-label">Title</label>
                <div class="col-sm-12">
                  <input type="text" name="title" class="form-control" id="title" placeholder="Enter a title">
                </div>
            </div>
            <div class="form-group">
                <label for="body" class="col-sm-12 control-label">Event</label>
                <div class="col-sm-12">
                  <textarea id="body" name="event" class="form-control" rows="3"></textarea>
                </div>
            </div>

             <input style="margin-top: 10px" type="submit" class="pull-right btn btn-success" value="Add Event">
            </div>
        </div>
    <?php echo form_close() ?>
    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/calendar/moment/moment.js"></script>
        <script src="<?php echo base_url() ?>assets/calendar/eonasdan-bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>
        <script type="text/javascript">
            $(function () {
                $('#from').datetimepicker({
                    language: 'en',
                    minDate: new Date()
                });
                $('#to').datetimepicker({
                    language: 'en',
                    minDate: new Date()
                });
                
            });
        </script>

    </body>
</html>
