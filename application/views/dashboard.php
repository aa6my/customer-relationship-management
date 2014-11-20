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
                    <p>Products</p>
                    </div>
                <div class = "icon">
                <i class ="ion ion-bag">
                </i>
                </div>
                <a href = "<?php echo base_url(); ?>/products" class = "small-box-footer">
                <span>More Info</span>
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
                <p>Customers</p>
                </div>
                <div class = "icon">
                <i class = "ion ion-person-stalker"></i>
                </div>
                <a href = "<?php echo base_url(); ?>/customers" class = "small-box-footer">
                <span>More Info</span>
                <i class="fa fa-arrow-circle-right"></i>
                </a>
                </div>
                </div>
                <!--/.column-->
                <div class = "col-lg-3 col xs-6">
                <div class = "small-box bg-orange">
                <div class = "inner">
                <h3><?php echo $vendor; ?></h3>
                <p>Vendors</p>
                </div>
                <div class = "icon">
                <i class = "ion ion-network">
                </i>
                </div>
                <a href = "<?php echo base_url(); ?>/vendors" class = "small-box-footer">
                <span>More Info</span>
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
                <i class="ion ion-thumbsup">
                </i>
                </div>
                <a href="<?php echo base_url(); ?>/leads" class = "small-box-footer">
                <span>More Info</span>
                <i class="fa fa-arrow-circle-right"></i>
                </a>
                </div>
                </div>
                <!--/.column-->
                <div class="col-lg-3 col xs-6">
                <div class="small-box bg-purple">
                <div class="inner">
                <h3><?php echo $job; ?></h3>
                <p>Jobs</p>
                </div>
                <div class="icon">
                <i class="ion ion-briefcase">
                </i>
                </div>
                <a href="<?php echo base_url(); ?>/jobs" class="small-box-footer">
                <span>More Info</span>
                <i class="fa fa-arrow-circle-right"></i>
                </a>
                </div>
                </div>
                <!--/.column-->
                <div class="col-lg-3 col xs-6">
                <div class="small-box bg-red">
                <div class="inner">
                <h3><?php echo $event; ?></h3>
                <p>Events</p>
                </div>
                <div class="icon">
                <i class ="ion ion-clipboard">
                </i>
                </div>
                <a href="<?php echo base_url(); ?>/events" class="small-box-footer">
                <span>More Info</span>
                <i class="fa fa-arrow-circle-right"></i>
                </a>
                </div>
                </div>
                <!--/.column-->
                <div class="col-lg-3 col xs-6">
                <div class="small-box bg-green">
                <div class="inner">
                <h3><?php echo $invoice; ?></h3>
                <p>Invoices</p>
                </div>
                <div class="icon">
                <i class = "ion ion-cash">
                </i>
                </div>
                <a href="<?php echo base_url(); ?>/invoices" class="small-box-footer">
                <span>More Info</span>
                <i class="fa fa-arrow-circle-right"></i>
                </a>
                </div>
                </div>
                <!--/.column-->
                <div class="col-lg-3 col xs-6">
                <div class="small-box bg-blue">
                <div class="inner">
               
                <h3>""</h3>
                <p>Quotes</p>
                </div>
                <div class="icon">
                <i class ="ion ion-pricetag">
                </i>
                </div>
                <a href="<?php echo base_url(); ?>/quotes" class="small-box-footer">
                <span>More Info</span>
                <i class ="fa fa-arrow-circle-right"></i>
                </a>
                </div>
                </div>


                <!--<div class ="row">-->
                <section class ="col-lg-7 connectedSortable ui-sortable">
                    <div class = "nav-tabs-custom" style="cursor: move;">
                    <ul class = "nav nav-tabs pull-right ui-sortable-handle">
                     
                    <li class="active">
                <a href="#revenue-chart data-toggle="tab"">Year</a>
                
                        <label>
                        <select size="1" name="546c075c38f60_length" aria-controls="546c075c38f60">
                        <?php 
                        $end = 2015;
                        $j = 2007;
                        for($i=2007; $i<=$end; $i++)
                        { ?>
                             <option value="<?php echo $i;?>"><?php echo $j++;?></option>
                       <?php  }

                        ?>
                       </select>
                       
                        </label></a>
                    </li>
                <li class = "pull-left header">
                    <i class="fa fa-inbox"></i>
                    Sales
                    </li>
                    </ul>
                <div class="tab-content ">
                <!--Bar Chat-->
                <div class="box box-primary id="bar-chart" style="position:relative; height: 300px;"">
                    <div class="box-header">
                    </div>
                    <div class="box-body">
                    <div id="bar-chart" style="height: 300px; padding: 0px; position: relative;">
                    <canvas class="flot-base" width="632" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 735px; height: 300px;"></canvas>
                    <div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                    <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
             
                    </div>
                    <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
              
                    </div>
                    <canvas class="flot-overlay" width="632" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 735px; height: 300px;">
                </div>
            </div>
            <!--box-body-->
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