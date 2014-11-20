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
                 
                <form action="<?php echo base_url('jobs/index/add'); ?>" method="post">
                <div class="row">


                        <div class="col-md-5">
                            <div class="box">

                                <!-- <div class="box-header">
                               
                                    <h3 class="box-title">Add Quote</h3>
                                </div> --><!-- /.box-header -->
                                <div class="box-body">
                                
                                <table class="table table-striped">
                                        <tbody>
                                       
                                         <tr>
                                            
                                            <td align="right">Quote Date</td>
                                            <td>
                                               <div class="col-xs-5">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                            <input type="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="quote_date_created">
                                                    </div>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                         <tr>
                                            
                                            <td align="right">Valid Until</td>
                                            <td>
                                               <div class="col-xs-5">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                            <input type="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="quote_valid_until">
                                                    </div>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Status</td>
                                            <td>
                                                <div class="col-xs-5">
                                                    <select class="form-control" name="quote_status">
                                                        <option value="0">APPROVED</option>
                                                        <option value="1">REJECTED</option>
                                                        <option value="2">CANCEL</option>
                                                          
                                                    </select>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        
                                       
                                        
                                       
                                        <!--  <tr>
                                            
                                            <td align="right"></td>
                                            <td>
                                            <div class="col-xs-7">
                                                <button class="btn btn-warning btn-sm" type="reset">Reset</button>
                                               <input class="btn btn-primary btn-sm" name="save" type="submit" value="Save">

                                            </div>
                                            </td>
                                           
                                        </tr> -->
                                        
                                    </tbody></table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                        </div><!-- /.column -->













                        <div class="col-md-7">
                            <div class="box">

                                <!-- <div class="box-header">
                               
                                    <h3 class="box-title">Add Quote</h3>
                                </div> --><!-- /.box-header -->
                                <div class="box-body">
                                
                                <table class="table table-striped">
                                        <tbody>
                                       
                                         <tr>
                                            
                                           
                                            <td>

                                               
                                                               <div class="col-xs-12">
                                                               <strong>Quote Subject</strong><br/>
                                                                    <textarea class="form-control" rows="3" placeholder="" name="quote_subject"></textarea>
                                                                </div>
                                                            
                                              </td>   
                                        </tr>

                                        <tr>
                                            
                                           
                                            <td>

                                               
                                                               <div class="col-xs-12">
                                                              <strong>Quote Terms</strong><br/>
                                                                    <textarea class="form-control" rows="3" placeholder="" name="job_description"></textarea>
                                                                </div>
                                                            
                                              </td>   
                                        </tr>
                                         
                                       
                                        
                                       
                                        <!--  <tr>
                                            
                                            <td align="right"></td>
                                            <td>
                                            <div class="col-xs-7">
                                                <button class="btn btn-warning btn-sm" type="reset">Reset</button>
                                               <input class="btn btn-primary btn-sm" name="save" type="submit" value="Save">

                                            </div>
                                            </td>
                                           
                                        </tr> -->
                                        
                                    </tbody></table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                        </div><!-- /.column -->
                     </div><!-- /.row -->


<div class="row">
                       

                        <div class="col-md-12">
                            <!-- Primary box -->
                            <div class="box box-primary">
                                <div class="box-header" data-toggle="tooltip" title="" data-original-title="Item from task job or products">
                                    <h3 class="box-title"><strong>Quote Items</strong> <!-- <button class="btn btn-success btn-sm">Add Item From Products</button> --></h3>
                                    
                                </div>
                                <div class="box-body">
                                   
                                    <table class="table table-bordered" id="quote">
                                        <tbody>
                                            <tr>
                                                <th width="300">Item</th>
                                                <th width="400">Description</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Discount</th>
                                                <th>Subtotal</th> 
                                            </tr>
                                             <tr id="quote_template"><!-- form template -->
                                                <td>
                                                    <input type="text" class="form-control input-sm" placeholder="" id="quote_#index#_phone" name="person[phones][#index#][phone]">
                                                    <br/>
                                                    <button class="btn btn-success btn-sm">Add Item From Products</button>
                                                    
                                                    </td>
                                               <td>
                                                    <textarea class="form-control" rows="3" placeholder="" id="quote_#index#_description" name="person[descriptions][#index#][description]"></textarea>
                                                </td>
                                                  <td align="center">
                                                    <input type="text" class="form-control input-sm" placeholder="" name="job_task_amount" id="quote_#index#_description" name="person[descriptions][#index#][quantity]" >
                                                </td>
                                                <td align="center">
                                                    <input type="text" class="form-control input-sm" placeholder="" name="job_task_amount" id="quote_#index#_description" name="person[descriptions][#index#][price]">
                                                </td>
                                                
                                                <td align="center">
                                                    <input type="text" class="form-control input-sm" placeholder="" name="job_task_amount" id="quote_#index#_description" name="person[descriptions][#index#][discount]" >
                                                </td>
                                                <td align="center">
                                                    <input type="text" class="form-control input-sm" placeholder="" name="job_task_amount" id="quote_#index#_description" name="person[descriptions][#index#][subtotal]">
                                                </td> 
                                            </tr> <!-- end form template -->
                                                                             
                                        </tbody>
                                    </table>
                                    

                                </div><!-- /.box-body -->
                                
                            </div><!-- /.box -->
                        </div><!-- /.col -->

                       
                    </div>












                    </div>
</form>
                
                
               
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

       

    </body>
</html>
