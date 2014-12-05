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
                <a href = "<?php echo base_url(); ?>products" class = "small-box-footer">
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
                <a href = "<?php echo base_url(); ?>customers" class = "small-box-footer">
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
                <a href = "<?php echo base_url(); ?>vendors" class = "small-box-footer">
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
                <a href="<?php echo base_url(); ?>leads" class = "small-box-footer">
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
                <a href="<?php echo base_url(); ?>jobs" class="small-box-footer">
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
                <a href="<?php echo base_url(); ?>calendar" class="small-box-footer">
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
                <a href="<?php echo base_url(); ?>invoices" class="small-box-footer">
                <span>More Info</span>
                <i class="fa fa-arrow-circle-right"></i>
                </a>
                </div>
                </div>
                <!--/.column-->
                <div class="col-lg-3 col xs-6">
                    <div class="small-box bg-blue">
                    <div class="inner">
                   
                        <h3><?php echo $quote; ?></h3>
                        <p>Quotes</p>
                    </div>
                    <div class="icon">
                        <i class ="ion ion-pricetag">
                        </i>
                    </div>
                        <a href="<?php echo base_url(); ?>quotes" class="small-box-footer">
                        <span>More Info</span>
                        <i class ="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>











<script type="text/javascript">
$(function () {


    var options = {
        chart: {
                    renderTo: 'container',
                    type: 'area',
                    marginRight: 130,
                    marginBottom: 25
                   /* plotBackgroundColor : '#F2EAB5'*/

        },
        title: {
            /*text: 'Monthly Sales By Year',*/
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
                text: 'Overall Amount (<?php echo $this->config->item("currency");?>)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#CF9601'
            }]
        },
        tooltip: {
            <?php
            if($this->config->item("currencyposition")=="left")
            {
                ?>
            
            valuePrefix: '<?php echo $this->config->item("currency");?>'
            <?php
            }
            else
                {?>
            valueSuffix: '<?php echo $this->config->item("currency");?>' 
            <?php
            }
            ?>     
        },
        legend: {
            backgroundColor : '#FFF',
            borderColor : '#F38C7D',
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0

            
        },
        credits: {
            text : 'SegiMidaeInfocomn',
            href : 'http://segimidae.net',
            style : {
                color : '#55A3D1',
                padding : '3px',
                border: '1px solid #55A3D1'
            }
        },
        series: [{ }]
        
   }

   render_chart(false);

   
 
   $('#tahun').on('change', function(){
        var tahun = $(this).val();
        render_chart(Number(tahun));
               
     });

   function render_chart(year){

        var new_year;
        if(year!=false){
            new_year = year;
        }
        else{
            new_year = "";
        }
        $.ajax({
                type : "POST",
                url : "<?php echo base_url();?>dashboard/data_hightchart",
                data : "tahun="+ new_year,
                dataType : 'json',
                success:function(json){
                   
                    options.xAxis.categories = json[1].month;
                    options.series[0].name = json[0].name;
                    options.series[0].data = json[0].data;
                    options.title.text = "Monthly sales "+json[2].tahun;
                    
                    chart = new Highcharts.Chart(options);
                }
               });
   }


});
        </script>
<span id="cuba"></span>


                <!--<div class ="row">-->
               
                <section class ="col-lg-12"> <div class="box box-primary" id="bar-chart" style="position:relative; height: 300px;">
                    <div class = "nav-tabs-custom" style="cursor: move;">
                    <ul class = "nav nav-tabs pull-right ">
                     
                    <li class="active">
                <a href="#revenue-chart data-toggle="tab"">Year :  <label>
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
                <!-- <div class="box box-primary" id="bar-chart" style="position:relative; height: 300px;"> -->
                    <div class="box-header">
                    </div>
                        <div class="box-body">
                            <div id="container" style="min-width: 310px; height: 300px; margin: 0 auto">
                                
                            </div>
                        
                        </div>
                <!-- </div> -->
                </div>
            <!--box-body-->
        </div></div>
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