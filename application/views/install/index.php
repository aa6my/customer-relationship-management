

<?php $this->load->view('layout/header',array('title'=>$this->lang->line('Install'),'forms'=>TRUE))?>
<div class="middle-box loginscreen animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name">CRM INSTALL</h1>
        </div>
        <h3>Install CRM</h3>
        <form class="m-t" role="form" action="index.php/install/save_config" method="POST" id="install_form">
            <div id="save_result"></div>
            <div class="form-group has-feedback">
                <label class="control-label" for="database_host">Database host<sup class="mandatory">*</sup></label>
                <input type="text" id="database_host" name="database_host" class="form-control required" value="localhost" />
            </div>
            <div class="form-group has-feedback">
                <label class="control-label" for="database_name">Database name<sup class="mandatory">*</sup></label>
                <input type="text" name="database_name" id="database_name" class="form-control required" value="c"/>
            </div>
            <div class="form-group has-feedback">
                <label class="control-label" for="database_user">Database user<sup class="mandatory">*</sup></label>
                <input type="text" name="database_user" id="database_user" class="form-control required" value="root"/>
            </div>
            <div class="form-group has-feedback">
                <label class="control-label" for="database_password">Database password<sup class="mandatory">*</sup></label>
                <input type="password" name="database_password" id="database_password">
            </div>
            <div class="form-group has-feedback">
                <label for="username">Your Firstaname<sup class="mandatory">*</sup></label>
                <input type="text" name="firstname" id="firstname" class="form-control required" value="Ahmad">
            </div>
            <div class="form-group has-feedback">
                <label for="username">Your Lastname<sup class="mandatory">*</sup></label>
                <input type="text" name="lastname" id="lastname" class="form-control required" value="Pintu">
            </div>
            <div class="form-group has-feedback">
                <label for="username">Your Phone<sup class="mandatory">*</sup></label>
                <input type="text" name="phone" id="phone" class="form-control required" value="012345678">
            </div>
            <div class="form-group has-feedback">
                <label for="username">Your username<sup class="mandatory">*</sup></label>
                <input type="email" name="username" id="username" class="form-control required email" value="a@admin.com">
            </div>
            <div class="form-group has-feedback">
                <label class="control-label" for="admin_password">Your password<sup class="mandatory">*</sup></label>
                <input type="password" name="admin_password" id="admin_password" class="form-control required" value="qwe123">
            </div>
            <button type="button" onclick="submit_form('#install_form','','<?php echo base_url();?>assets/img/ajax-loader-install.gif')" class="btn btn-primary block full-width m-b">Install</button>
        </form>
        <!-- <p class="m-t text-center"><small><?= $this->lang->line('EMS')?> &copy; <?= date('Y')?></small></p> -->
    </div>
</div>
<?php $this->load->view('layout/footer');?>