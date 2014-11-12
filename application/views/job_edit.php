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
                <?php

                if($this->session->flashdata('save'))

                {
                    ?>

              
                                    <div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b><?php echo $this->session->flashdata('save');?> </b> 
                                    </div>
                <?php
                }
                else if($this->session->flashdata('record'))
                {
                ?>
                                    <div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b><?php echo $this->session->flashdata('record');?> </b> 
                                    </div>
                <?php
                }
                
                else if($this->session->flashdata('error'))
                {
                ?>
                                   <div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b><?php echo $this->session->flashdata('error');?> </b> 
                                    </div>
                <?php
                }
                ?>
                <form action="" method="post">
                <div class="row">
                        <div class="col-md-4">
                            <div class="box">


                            




                                <div class="box-header">

                                    <h3 class="box-title">Edit Job</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                
                               
                                <table class="table table-striped">
                                        <tbody>
                                       
                                        <tr>
                                            
                                            <td align="right" width="100">Job Title</td>
                                            <td>
                                            
                                               <div class="col-xs-9">
                                                    <input type="text" class="form-control input-sm" placeholder="" name="job_title" value="<?php echo $jobs['job_title'];?>">
                                                </div>
                                            
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Type</td>
                                            <td>
                                               <div class="col-xs-7">
                                                    <select class="form-control" name="job_type_id" REQUIRED>
                                                        <option value="">Please select</option>
                                                        <?php
                                                        foreach($groupData['job_type'] as $type)
                                                        {
                                                            ?>
                                                        
                                                        <option value="<?php echo $type['job_type_id'];?>" <?php if($jobs['job_type_id']==$type['job_type_id']) echo 'selected';?>><?php echo $type['job_type_name'];?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                        
                                                    </select>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Hourly Rate</td>
                                            <td>
                                               <div class="col-xs-3">
                                                     <input type="text" class="form-control input-sm" placeholder="" name="job_hour" value="<?php echo $jobs['job_hour'];?>">
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Status</td>
                                            <td>
                                               <div class="col-xs-7">
                                                    <select class="form-control" name="job_status">
                                                        <option value="" <?php if($jobs['job_status']=="") echo 'selected';?>>Please Select</option>
                                                        <option value="0" <?php if($jobs['job_status']==0) echo 'selected';?>>New</option>
                                                        <option value="1" <?php if($jobs['job_status']==1) echo 'selected';?>>Existing</option>
                                                        
                                                    </select>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Quote Date</td>
                                            <td>
                                               <div class="col-xs-5">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                            <input type="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="job_quote_date" value="<?php echo $jobs['job_quote_date'];?>">
                                                    </div>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Start Date</td>
                                            <td>
                                               <div class="col-xs-5">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                            <input type="date" class="form-control datepicker" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="job_date_start" value="<?php echo $jobs['job_date_start'];?>">
                                                    </div>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Start Time</td>
                                            <td>
                                               <div class="col-xs-6">
                                                    <div class="input-group">
                                                         <div class="input-group-addon">
                                                                    <i class="fa fa-clock-o"></i>
                                                         </div>
                                                        <input type="text" class="form-control timepicker" name="job_start_time" value="<?php echo $jobs['job_start_time'];?>">
                                                           
                                                    </div>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                         <tr>
                                            
                                            <td align="right">End Time</td>
                                            <td>
                                               <div class="col-xs-6">
                                                    <div class="input-group">
                                                         <div class="input-group-addon">
                                                                    <i class="fa fa-clock-o"></i>
                                                         </div>
                                                        <input type="text" class="form-control timepicker" name="job_end_time" value="<?php echo $jobs['job_end_time'];?>">
                                                           
                                                    </div>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Due Date</td>
                                            <td>
                                               <div class="col-xs-5">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                            <input type="date" class="form-control input-sm datepicker" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="job_due_date" value="<?php echo $jobs['job_due_date'];?>">
                                                    </div>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Finished Date</td>
                                            <td>
                                               <div class="col-xs-5">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                            <input type="date" class="form-control input-sm datepicker" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="job_complete_date" value="<?php echo $jobs['job_complete_date'];?>">
                                                    </div>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                         <tr>
                                            
                                            <td align="right">Staff Member</td>
                                            <td>
                                               <div class="col-xs-7">
                                                    <select class="form-control" name="user_id">
                                                     <option value="">Please Select</option>
                                                        <?php 
                                                        foreach ($groupData['staff'] as $key => $value) {?>
                                                            <option value="<?php echo $value['user_id']; ?>" <?php if($jobs['user_id']==$value['user_id']) echo 'selected';?>><?php echo $value['first_name'].' '.$value['last_name'];?></option>
                                                      <?php  } ?>
                                                        
                                                    </select>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Tax</td>
                                            <td>
                                               <div class="col-xs-3">
                                                    <input type="text" class="form-control input-sm" placeholder="" name="job_tax" value="<?php echo $jobs['job_tax'];?>">
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Currency</td>
                                            <td>
                                             <?php
                                            //waiting nizam make the universal code for this one
                                            //currently use standard style
                                            ?>
                                               <div class="col-xs-5">
                                                    <select class="form-control" name="job_currency">
                                                        <option value="">Please Select</option>
                                                        <option value="0" <?php if($jobs['job_currency']==0) echo 'selected';?>>RM</option>
                                                        <option value="1" <?php if($jobs['job_currency']==1) echo 'selected';?>>USD</option>
                                                        <option value="2" <?php if($jobs['job_currency']==2) echo 'selected';?>>AUD</option>
                                                        
                                                    </select>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                         <tr>
                                            
                                            <td align="right"></td>
                                            <td>
                                            <div class="col-xs-7">
                                                <button class="btn btn-warning btn-sm" type="reset">Reset</button>
                                               <input class="btn btn-primary btn-sm" name="save" type="submit" value="Save">

                                            </div>
                                            </td>
                                           
                                        </tr>
                                        
                                    </tbody></table>

                                    
                               
                                    
                                </div><!-- /.box-body -->
                               


                               
                            </div><!-- /.box -->

















                             <!-- job description part -->
                        <div class="col-bg-6">
                                    <div class="box">
                                        <div class="box-header">
                                            <h3 class="box-title">Job Description</h3>
                                        </div>
                                         <div class="box-body">
                                                <table class="table table-striped">
                                                        <tbody>
                                                       
                                                        <tr>
                                                            
                                                            
                                                            <td>
                                                            
                                                               <div class="col-xs-12">
                                                                    <textarea class="form-control" rows="3" placeholder="" name="job_description"><?php echo $jobs['job_description'];?></textarea>
                                                                </div>
                                                            
                                                            </td>
                                                           
                                                        </tr>
                                                        
                                                        
                                                    </tbody></table>
                                        </div>
                                    </div>
                        </div>
                        <!-- end job description -->

                        <!-- job notes part -->
                        <div class="col-bg-6">
                                    <div class="box">
                                        <div class="box-header">
                                            <h3 class="box-title">Job Notes</h3>
                                        </div>
                                         <div class="box-body">
                                                <table class="table table-striped">
                                                        <tbody>
                                                       
                                                        <tr>
                                                            
                                                            
                                                            <td>
                                                            
                                                               <div class="col-xs-12">
                                                                    <textarea class="form-control" rows="3" placeholder="" name="job_note"><?php echo $jobs['job_note'];?></textarea>
                                                                </div>
                                                            
                                                            </td>
                                                           
                                                        </tr>
                                                        
                                                        
                                                    </tbody></table>
                                        </div>
                                    </div>
                        </div>
                        <!-- end job notes -->


                        










                        <div class="col-bg-6">
                                    <div class="box">
                                        <div class="box-header">
                                            <h3 class="box-title">Advanced</h3>
                                        </div>
                                         <div class="box-body">
                                                <table class="table table-striped">
                                        <tbody>
                                       
                                        <tr>
                                            
                                            <td align="right" width="100">Assign Website</td>
                                            <td>
                                            
                                               <div class="col-xs-7">
                                                    <select class="form-control" name="website_id">
                                                    <option value="">Please Select</option>
                                                        <?php 
                                                        foreach ($groupData['website'] as $value ) {
                                                            ?>
                                                            <option value="<?php echo $value['website_id'];?>" <?php if($jobs['website_id']==$value['website_id']) echo 'selected';?>><?php echo $value['website_url'];?></option>
                                                      <?php  } ?>
                                                        
                                                    </select>
                                                </div>
                                            
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right" width="100">Assign Customers</td>
                                            <td>
                                            
                                               <div class="col-xs-7">
                                                    <select class="form-control" name="customer_id">
                                                     <option value="">Please Select</option>
                                                        <?php 
                                                        foreach ($groupData['customer'] as $value ) {
                                                            ?>
                                                            <option value="<?php echo $value['customer_id'];?>" <?php if($jobs['customer_id']==$value['customer_id']) echo 'selected';?>><?php echo $value['customer_name'];?></option>
                                                      <?php  } ?>
                                                        
                                                    </select>
                                                </div>
                                            
                                            </td>
                                           
                                        </tr>
                                      <!--  
                                    Database Quote not ready yet...waiting from ZACK
                                      <tr>
                                            
                                            <td align="right" width="100">Assign Customers</td>
                                            <td>
                                            
                                               <div class="col-xs-5">
                                                    <select class="form-control" name="job_type">
                                                        <?php 
                                                        foreach ($customer as $value ) {
                                                            ?>
                                                            <option value="<?php echo $value['customer_id'];?>"><?php echo $value['customer_name'];?></option>
                                                      <?php  } ?>
                                                        
                                                    </select>
                                                </div>
                                            
                                            </td>
                                           
                                        </tr> -->


                                        <!-- need to add automatic renewal tick checkbox -->
                                        <tr>
                                            
                                            <td align="right">Renewal Date</td>
                                            <td>
                                               <div class="col-xs-5">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                            <input type="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="job_renewal_date" value="<?php echo $jobs['job_renewal_date'];?>">
                                                    </div>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Task type</td>
                                            <td>
                                               <div class="col-xs-7">
                                                    <select class="form-control" name="job_task_type">
                                                    <option value="">Please Select</option>
                                                        <option value="0" <?php if($jobs['job_task_type']==0) echo 'selected';?>>Hourly rate & Amount</option>
                                                        <option value="1" <?php if($jobs['job_task_type']==1) echo 'selected';?>>Quantity & Amount</option>
                                                        <option value="2" <?php if($jobs['job_task_type']==2) echo 'selected';?>>Amount Only</option>
                                                        
                                                    </select>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Discount Amount</td>
                                            <td>
                                               <div class="col-xs-3">
                                                    <input type="text" class="form-control input-sm" placeholder="" name="job_discount_amount" value="<?php echo $jobs['job_discount_amount'];?>">
                                                </div>
                                            </td>
                                           
                                        </tr>
                                         <tr>
                                            
                                            <td align="right">Discount Name</td>
                                            <td>
                                               <div class="col-xs-7">
                                                    <input type="text" class="form-control input-sm" placeholder="" name="job_discount_name" value="<?php echo $jobs['job_discount_name'];?>">
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            
                                            <td align="right">Discount type</td>
                                            <td>
                                               <div class="col-xs-7">
                                                    <select class="form-control" name="job_discount_type">
                                                    <option value="">Please Select</option>
                                                        <option value="0" <?php if($jobs['job_discount_type']==0) echo 'selected';?>>Before Tax</option>
                                                        <option value="1" <?php if($jobs['job_discount_type']==1) echo 'selected';?>>After Tax</option>
                                                        
                                                        
                                                    </select>
                                                </div>
                                            </td>
                                           
                                        </tr>
                                         <tr>
                                            
                                            <td align="right"></td>
                                            <td>
                                            <div class="col-xs-7">
                                                <button class="btn btn-warning btn-sm" type="reset">Reset</button>
                                               <input class="btn btn-primary btn-sm" name="save" type="submit" value="Save">

                                            </div>
                                            </td>
                                           
                                        </tr>
                                        
                                    </tbody></table>
                                        </div>
                                    </div>
                        </div>
 























                            
                        </div><!-- /.col -->




                        <div class="col-md-8">

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Job Task</h3>
                                    <!-- <div class="box-tools">
                                        <ul class="pagination pagination-sm no-margin pull-right">
                                            <li><a href="#">«</a></li>
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">»</a></li>
                                        </ul>
                                    </div> -->
                                </div><!-- /.box-header -->
                                <div class="box-body no-padding">

                                    <table class="table table-striped" id="task">
                                        <tbody>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th style="width: 430px">Description</th>
                                            <th>Hours</th>
                                            <th>Amount</th>
                                            <th>Due Date</th>
                                            <!-- <th>Done Date</th> -->
                                            <th>Staff</th>
                                            <th>%</th>
                                            <th>Action</th>
                                        </tr>
                                         <tr>
                                            <td>
                                               
                                                    <!-- <input type="text" class="form-control input-sm" placeholder="" name="job_discount_name" style="width:40px;">
                                                 -->
                                            </td>
                                            <td>
                                                    <input type="text" class="form-control input-sm" placeholder="" name="job_task_description">
                                                
                                            </td>
                                            <td>
                                                <input type="text" class="form-control input-sm" placeholder="" name="job_task_hour" style="width:40px;">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control input-sm" placeholder="" name="job_task_amount" style="width:40px;">
                                            </td>
                                            <td>
                                               
                                                  
                                                        
                                                            <input type="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="job_task_due_date" style="width:150px">
                                                  
                                            </td>
                                            <!-- <td>Done Date</td> -->
                                            <td>
                                                <select class="form-control" name="user_id" style="width:100px">
                                                        <?php 
                                                        foreach ($staff as $key => $value) {?>
                                                            <option value="<?php echo $value['user_id']; ?>"><?php echo $value['first_name'].' '.$value['last_name'];?></option>
                                                      <?php  } ?>
                                                        
                                               </select>
                                            </td>
                                            <td>
                                                
                                       
                                            
                                            <input type="checkbox" style="position: absolute; opacity: 0;" name="job_task_percentage" value="1">
                                           
                                        
                                       
                                   
                                                   
                                               
                                           
                                            </td>
                                            <td>
                                            <!-- <input type="submit" class="btn btn-success btn-sm" value="New Task" name="save_task"> -->
                                            <input type="button" class="btn btn-success btn-sm button_task" value="New Task" name="save_task">
                                            </td>
                                        </tr>
                                        
                                        
                                    </tbody></table>
                                    <span id="loading"></span>

                                    <script>
                                    $(function()
                                    {
                                        var myObj = {

                                            table_selector : $('#task'),
                                            button_selector : $('#task input[type=button]'),
                                            loading_part : $('#loading')
                                        
                                        ,
                                        displayContent : function(){

                                            $.ajax({

                                                type : 'post',
                                                url : 'http://localhost/customer-relationship-management/jobs/ajax_job_task',
                                                //url : '"'<?php echo base_url().'jobs/ajax_job_task/$job_id';?>,
                                                data : 'job_id='+<?php echo $job_id;?>,
                                                beforeSend : function(){
                                                    // do display loading image her
                                                },
                                                success : function(a){
                                                    myObj.table_selector.append(a);
                                                },
                                                error : function(){
                                                    //do error staff display here
                                                }
                                            })
                                        }

                                    }

                                        myObj.displayContent();
                                        //alert(myObj.loading_part.attr('id'));
                                    })
                                    </script>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                            
                        </div><!-- /.col -->
                    </div>
</form>
                
                
               
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
    </body>
</html>
