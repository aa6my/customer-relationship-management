    <!DOCTYPE>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>[CRM] Customer Relationship Management | <?php echo $this->config->item('sitename'); ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="stylesheet" href="<?php echo $is;?>://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
        <link href="<?php echo $is;?>://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $is;?>://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>/assets/datepicker/datepicker.css">
        <script src="<?php echo $is;?>://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="<?php echo $is;?>://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

         
        
        <!-- AdminLTE App -->
        
        
    </head>
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
                            <div class="box-body">
                            <form action="" method="post">
                                <script type="text/javascript">
                                    $(function()
                                    {
                                        $('.date').datepicker( {autoclose: true, format: 'dd-mm-yyyy'} );
                                        $(".date").datepicker("setDate", new Date());
                                    });
                                </script>
                                <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Customer : </label>
                                        <select name="client_id" id="client_id" class="form-control">
                                        <option>Please select</option>
                                        <?php 
                                        foreach ($clients as $key => $value) {?>
                                        <option value="<?php echo $value['customer_id']; ?>"><?php echo $value['customer_name'];?></option>
                                        <?php  } ?>   
                                        </select>
                                    </div>
                                </div>
                                
                                    <div class="col-lg-3">
                                        <label>From : </label>
                                        <div class="form-group input-group date" style="margin-left:0;">
                                           <input class="form-control" size="16" type="text" name="from_date" readonly id="from_date"/>
                                            <span class="input-group-addon add-on"><i class="fa fa-calendar" style="display: inline"></i></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <label>To : </label>
                                        <div class="form-group input-group date" style="margin-left:0;">
                                           <input class="form-control" size="16" type="text" name="to_date" readonly id="to_date"/>
                                            <span class="input-group-addon add-on"><i class="fa fa-calendar" style="display: inline"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label> </label>
                                        <div class="form-group input-group" style="margin-left:0;">
                                        <input type="submit" name="search"/>
                                        </div>
                                    </div>
                                    </div>
                                    </form>
                                <div class="row">
                                    <div class="col-lg-12">
                                    <p><span class="bold-text" >Payments Summary</span>
                                    <span class="bold-text" >from <?php echo $from_date; ?></span>
                                    <span class="bold-text" >to <?php echo $to_date; ?></span></p>
                                    </div>
                                </div>
                                    <table class="table table-bordered">
                                    <thead>
                                      <tr class="table_header">
                                        <th>DATE </th>
                                        <th>PAYMENT METHOD</th>
                                        <th>CUSTOMER</th>
                                        <th class="text-right">AMOUNT</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                if( isset($invoices))
                                {
                                ?>
                                    <?php
                                    $total = 0;
                                    foreach ($invoices as $key => $value)
                                    {
                                    ?>
                                      <tr class="transaction-row">
                                        <td><?php echo $value['invoice_payment_date']; ?></td>
                                        <td><?php echo $value['payment_method']; ?></td>
                                        <td><?php echo $value['customer_name']; ?></td>
                                        <td class="text-right"><?php echo $value['invoice_payment_amount']; ?></td>
                                      </tr>
                                    <?php
                                        $total = $total + $value['invoice_payment_amount'];
                                    }
                                    ?>
                                    <tr class="table_header">
                                    <td><b>TOTAL </b></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right"><?php echo $total; ?></td>
                                    </tr>
                                <?php
                                }
                                else
                                {
                                ?>
                                <tr class="no-cell-border transaction-row">
                                <td colspan="7"> There are no records to display at the moment.</td>
                                </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                                </table>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
    </body>
</html>