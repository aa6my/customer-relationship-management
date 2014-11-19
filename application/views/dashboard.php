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
                <section class = "content">
                    <div class = "row">
                    <div class = "col-lg-3 col-xs-6">
                    <div class = "small-box bg-maroon">
                    <div class = "inner">
                    <h3><?php echo $product; ?></h3>
                    <p>Product</p>
                    </div>
                <div class = "icon">
                <i class ="ion ion-bag">
                </i>
                </div>
                <a href = "#" class = "small-box-footer">
                More Info
                <i class="fa fa-arrow-circle-right"></i>
                </a>
                </div>
                </div>
                <!--/.column-->
                <div class = "col-lg-3 col-xs-6">
                <div class = "small-box bg-yellow">
                <div class = "inner">
                <h3><?php echo $customer; ?>
                </h3>
                <p>Customer</p>
                </div>
                <div class = "icon">
                <i class = "ion ion-person"></i>
                </div>
                <a href = "#" class = "small-box-footer">
                More Info
                <i class="fa fa-arrow-circle-right"></i>
                </a>
                </div>
                </div>
                <!--/.column-->
                <div class = "col-lg-3 col xs-6">
                <div class = "small-box bg-purple">
                <div class = "inner">
                <h3><?php echo $vendor; ?></h3>
                <p>Vendor</p>
                </div>
                <div class = "icon">
                <i class = "ion ion-stats-bars">
                </i>
                </div>
                <a href = "#" class = "small-box-footer">
                More Info
                <i class="fa fa-arrow-circle-right"></i>
                </a>
                </div>
                </div>
                <!--/.column-->
                <div class = "col-lg-3 col xs-6">
                <div class = "small-box bg-aqua">
                <div class = "inner">
                <h3><?php echo $lead; ?></h3>
                <p>Leads</p>
                </div>
                <div class = "icon">
                <i class="ion ion-pie-graph">
                </i>
                </div>
                <a href="#" class = "small-box-footer">
                More Info
                <i class="fa fa-arrow-circle-right"></i>
                </a>
                </div>
                </div>

                <!--<div class ="row">-->
                <section class ="col-lg-7 connectedSortable ui-sortable">
                    <div class = "nav-tabs-custom" style="cursor: move;">
                    <ul class = "nav nav-tabs pull-right ui-sortable-handle">
                    <li class="active">
                        <a href="#bar-chart" data-toggle="tab">Bar Chart</a>
                    </li>
                <li class = "pull-left header">
                    <i class="fa fa-inbox"></i>
                    Sales
                    </li>
                    </ul>
                <div class="tab-content no padding">
                <!--Bar Chat-->
                <div class="box box-primary">
                    <div class="box-header">
                    <i class="fa fa-bar-chart-o"></i>
                    <h3 class="box-title">Bar Chart</h3>
                    </div>
                    <div class="box-body">
                    <div id="bar-chart" style="height: 300px; padding: 0px; position: relative;">
                    <canvas class="flot-base" width="632" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 735px; height: 300px;"></canvas>
                    <div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                    <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
                    <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 105px; top: 282px; left: 29px; text-align: center;">January</div>
                    <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 105px; top: 282px; left: 134px; text-align: center;">February</div>
                    <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 105px; top: 282px; left: 248px; text-align: center;">March</div>
                    <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 105px; top: 282px; left: 358px; text-align: center;">April</div>
                    <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 105px; top: 282px; left: 466px; text-align: center;">May</div>
                    <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 105px; top: 282px; left: 571px; text-align: center;">June</div>
                    <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 105px; top: 282px; left: 682px; text-align: center;">July</div>
                    </div>
                    <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
                    <div class="flot-tick-label tickLabel" style="position: absolute; top: 269px; left: 7px; text-align: right;">0</div>
                    <div class="flot-tick-label tickLabel" style="position: absolute; top: 202px; left: 7px; text-align: right;">5</div>
                    <div class="flot-tick-label tickLabel" style="position: absolute; top: 135px; left: 1px; text-align: right;">10</div>
                    <div class="flot-tick-label tickLabel" style="position: absolute; top: 68px; left: 1px; text-align: right;">15</div>
                    <div class="flot-tick-label tickLabel" style="position: absolute; top: 1px; left: 1px; text-align: right;">20</div>
                    </div>
                    <canvas class="flot-overlay" width="632" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 735px; height: 300px;">
                    </div>
        
                            </div>
                            </div>
                    </div><!-- /.box-body-->
                    </div>
                




                </section>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/dashboard.js" type="text/javascript"></script>

    </body>
</html>