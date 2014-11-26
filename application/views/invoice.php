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
                <div class="pad margin no-print">
                    <div style="margin-bottom: 0!important;">
                        
                        
                    </div>
                </div>      
                <section class="content invoice">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-10">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i> <?php echo $this->config->item('sitename'); ?>
                                
                            </h2>
                        </div><!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-3 invoice-col">
                            From
                            <address>
                                <strong></strong><br>
                                <br>
                                <br>
                                <br>
                                
                            </address>
                        </div><!-- /.col -->
                        <div class="col-sm-3 invoice-col">
                            To
                            <address>
                                <strong>

                                <?php echo $invoice['customer_name'];?>
                                </strong><br>
                                <?php echo $invoice['customer_address'];?><br>
                                <?php echo $invoice['customer_postcode'];?><br>
                                <?php echo $invoice['customer_state'];?><br>
                                
                                
                                
                                
                            </address>

                        </div><!-- /.col -->
                        <div class="col-sm-2 invoice-col">
                        <br>
                        <br>
                            <b>Tel<span style="padding-left:21px">:</span> </b><?php echo $invoice['customer_phone']; ?><br>
                           
                            
                            <b>Fax<span style="padding-left:19px">: </span></b><?php echo $invoice['customer_fax']; ?><br>
                            <b>Email<span style="padding-left:7px">:</span> </b><?php echo $invoice['customer_email']; ?>
                            
                        </div><!-- /.col -->
                        <div class="col-sm-3 invoice-col">
                            <br>
                            <br>
                            <b>Invoice No<span style="padding-left:10px">: </span></b><?php echo $invoice['invoice_number']; ?><br>
                            
                            
                            <b>Date Issued<span style="padding-left:5px">: </span></b><?php echo $invoice['invoice_date_created']; ?><br>
                            <b>Valid Until<span style="padding-left:12px">: </span></b><?php echo $invoice['invoice_valid_until']; ?>
                            
                            
                        </div><!-- /.col -->

                    </div><!-- /.row -->

                    <!-- Table row -->
                    <br>
                    <div class="row">
                        <div class="col-xs-10 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Product</th>
                                       
                                        <th><div align ="center">Quantity</div></th>
                                        <th><div align = "center">Price</div></th>
                                        <th><div align = "center">Discount(%)</div></th>
                                        <th><div align = "center">Subtotal</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $a=1; 
                                    $sum = 0;
                                foreach($invoice_items as $key => $val)
                                    foreach ($invoice_payments as $key => $value) {
                                        
                                    }{
                                ?>
                                    <tr>
                                        <td><?php echo $a++ ?></td>
                                        <td><?php echo $val['invoice_item_name'];?></td>
                                        
                                        <td><div align ="center"><?php echo $val['invoice_item_quantity']; ?></div></td>
                                        <td><div align ="center"><?php echo $val['invoice_item_price'];?></div></td>
                                        <td><div align = "center"><?php echo $val['invoice_item_discount']; ?></div></td>
                                        <td><div align = "center"><?php 

                                        $sum += $val['invoice_item_subtotal'];
                                        echo $val['invoice_item_subtotal'];?></div></td>
                                    </tr>
                                <?php
                            }
                                ?>
                                </tbody>
                            </table>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                       
                        <div class="col-xs-5">
                        <br>
                        <br>
                        
                            <p class="lead">Amount Due :   </p>
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                        <th style="width:50%">Subtotal<span style="padding-left:32px">:</span></th>
                                        <td><?php echo $sum ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tax (9.3%)<span style="padding-left:19px">:</span></th>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <th>Shipping<span style="padding-left:30px">:</span></th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Total<span style="padding-left:52px">:</span></th>
                                        <td></td>
                                    </tr>
                                     <tr>
                                        <th>Amount Paid<span style="padding-left:4px">:</span></th>
                                        <td><?php 
                                        $tot = 0;
                                        //print_r($invoice_payments);
                                            foreach($invoice_payments as $key => $value){
                                                $tot = $tot + $value['invoice_payment_amount'];
                                            }
                                            echo  $tot;
                                            ?>
                                          </td>
                                    </tr>
                                    <tr>
                                        <th>Balance<span style="padding-left:34px">:</span></th>
                                        <td><?php 
                                        $c= $sum - $tot ?>
                                        <?php echo $c ?></td>
                                    </tr> 
                                </tbody></table>
    
                                </tbody>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                            <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                            <button class="btn bg-blue pull-right"><i class="fa fa-credit-card"></i>Submit Payment</button>
                            <button class="btn bg-maroon pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> 
                            <a href="<?php echo base_url(); ?>invoicess/pdf/<?php echo $invoice_id ?>">Generate PDF</a></button>
                        </div>
                    </div>
                </section>      

                <!-- Main content -->

            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
    </body>
</html>