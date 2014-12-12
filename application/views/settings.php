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
                                    <h3 class="box-title">Preferences</h3>
                                </div><!-- /.box-header -->
                                <?php $this->load->view('setting-top-menu'); ?>
                                <!-- form start -->
                                <?php $attributes = array('role' => 'form'); ?>
                                <?php echo form_open("settings/updatesetting", $attributes); ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Sitename</label>
                                            <input type="text" class="form-control" id="sitename" name="sitename" value="<?php echo $this->config->item('sitename'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Site Description</label>
                                            <input type="text" class="form-control" id="sitedescription" name="sitedescription" value="<?php echo $this->config->item('sitedescription'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Time Zone</label>&nbsp;<a href="http://php.net/manual/en/timezones.php" target="_blank">[Timezone]</a>
                                            <input type="text" class="form-control" id="sitedescription" name="timezone" value="<?php echo $this->config->item('timezone'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Currency </label> <a href="<?php echo base_url();?>settings/currency">[Add Currency]</a>
                                            
                                                    <select class="form-control" name="currency">
                                                        <option value="">--Select Currency--</option>
                                                        <?php
                                                        foreach($currency as $curr)
                                                            {?>
                                                        <option value="<?php echo $curr['currency_value'];?>" <?php if($this->config->item('currency')==$curr['currency_value']) echo 'selected';?>><?php echo $curr['currency_name'];?></option>
                                                        
                                                        <?php
                                                            }
                                                        ?>
                                                        

                                                    </select>
                                                
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Currency Position</label>
                                            
                                                    <select class="form-control" name="currencyposition">
                                                        <option value="">--Select Position--</option>
                                                        <option value="left" <?php if($this->config->item('currencyposition')=="left") echo 'selected';?>>LEFT</option>
                                                        <option value="right" <?php if($this->config->item('currencyposition')=='right') echo 'selected';?>>RIGHT</option>
                                                        

                                                    </select>
                                                
                                        </div>
                                        <div class="form-group">
                                            <label for="Debug">Debug</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="debug" id="optionsRadios1" value="TRUE" <?php if ($this->config->item('debug') == "TRUE") echo "checked"; ?>>
                                                    Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="debug" id="optionsRadios2" value="FALSE" <?php if ($this->config->item('debug') == "FALSE") echo "checked"; ?>>
                                                    No
                                                </label>
                                            </div>
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
    </body>
</html>