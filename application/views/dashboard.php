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
                    











<script type="text/javascript">
$(function () {


    var options = {
        chart: {
                    renderTo: 'container',
                    type: 'line',
                    marginRight: 130,
                    marginBottom: 25
        },
        title: {
            text: 'Monthly Sales By Year',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: Invoices',
            x: -20
        },
        xAxis: {
            categories: []
        },
        yAxis: {
            title: {
                text: 'Overall Amount (RM)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#CF9601'
            }]
        },
        tooltip: {
            valuePrefix: 'RM'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{ }]
        
   }

   chart = new Highcharts.Chart(options);
 
   $('#tahun').on('change', function(){


               $.ajax({
                type : "POST",
                url : "<?php echo base_url();?>dashboard/data_hightchart",
                data : "tahun="+ $(this).val(),
                dataType : 'json',
                success:function(json){
                   
                    options.xAxis.categories = json[1].month;
                    options.series[0].name = json[0].name;
                    options.series[0].data = json[0].data;
                    //console.log(options.xAxis.categories);
                    chart = new Highcharts.Chart(options);
                }
               });
     });


});
        </script>
<span id="cuba"></span>


                <!--<div class ="row">-->
                <section class ="col-lg-7 connectedSortable ui-sortable">
                    <div class = "nav-tabs-custom" style="cursor: move;">
                    <ul class = "nav nav-tabs pull-right ui-sortable-handle">
                     
                    <li class="active">
                <a href="#revenue-chart data-toggle="tab"">Year</a>
                
                        <label>
                        <select size="1" name="546c075c38f60_length" aria-controls="546c075c38f60" id="tahun">
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
                    <div id="container" style="min-width: 310px; height: 300px; margin: 0 auto"></div>
                    
                </div>
            </div>
            <!--box-body-->
        </div>
         </section>



                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
    </body>
</html>





<!-- <div id="bar-chart" style="height: 300px; padding: 0px; position: relative;">
                    <canvas class="flot-base" width="632" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 735px; height: 300px;"></canvas>
                    <div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                    <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
             
                    </div>
                    <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
              
                    </div>
                    <canvas class="flot-overlay" width="632" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 735px; height: 300px;"> -->