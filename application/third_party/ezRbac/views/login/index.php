<?php
    $CI =& get_instance();
    $CI->load->library('user_agent');
    if ($CI->agent->browser() == 'Internet Explorer' && $CI->agent->version() <= 8){
    echo "Please use Google Chrome only";
    $this->output->enable_profiler(FALSE);
}else{
?>

<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/sweetalert/sweet-alert.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box" <?php if ($this->input->post('action') == 'recover_password') echo "style='display:none'" ?>>
            <div class="header">Sign In</div>
            <form action="" method="post">
                <div class="body bg-gray">                
                        <?php if ($this->input->post('action') != 'recover_password'): ?>
                        <?php echo $form_error?>
                        <?php endif; ?>           
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Email"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                </div>
                <div class="footer">
                    <div class="showcase sweet">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Sign me in</button>  
                    </div>
                    <p><a href="javascript:" onclick="display.password()">I forgot my password</a></p>
                </div>
            </form>

            <!--div class="margin text-center">
                <span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div-->
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo $this->ezuri->assets_url('js/login_js.js')?>" type="text/javascript" ></script>
        <script src="<?php echo base_url(); ?>assets/js/sweetalert/sweet-alert.min.js" type="text/javascript"></script>

    </body>
</html>

<?php
}
?>