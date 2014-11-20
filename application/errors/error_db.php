<html style="min-height: 749px;"><head>
        <meta charset="UTF-8">
        <title>Page not found</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css">
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue  pace-done" style="min-height: 749px;"><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
        <!-- header logo: style can be found in header.less -->
        <header class="header">
          
            <!-- Header Navbar: style can be found in header.less -->
            
                <!-- Sidebar toggle button-->
                
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left" style="min-height: 749px;">
            <!-- Left side column. contains the logo and sidebar -->
          

            <!-- Right side column. Contains the navbar and content of the page -->
          
                <!-- Content Header (Page header) -->
                <!--<section class="content-header">-->
                   

                <!-- Main content -->
                <section class="content">

                    <div class="error-page">
                        <h2 class="headline text-info">DB</h2>
                        <div class="error-content">
                            <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
                            <p>
                                <div id="container">
		                          <h1><?php echo $heading; ?></h1>
		                              <?php echo $message; ?>
		                        </div>
                                
                            </p>
                            <button class="btn btn-primary btn-sm"onclick="goBack()">Go Back</button>
                            <script>
                            function goBack() {
                            	window.history.back()
                            }
                            </script>

                        </div><!-- /.error-content -->
                    </div><!-- /.error-page -->

                </section><!-- /.content -->
      
        </div><!-- ./wrapper -->

        <script src="<?php echo base_url() ?>/assets/grocery_crud/js/jquery_plugins/jquery.fancybox-1.3.4.js"></script>
        <script src="<?php echo base_url() ?>/assets/grocery_crud/js/jquery_plugins/jquery.easing-1.3.pack.js"></script>
        <script src="<?php echo base_url() ?>assets/js/job/hour_calculate.js"></script>

<div class="no-print" style="padding: 10px; 
position: fixed; top: 130px; right: -200px; border: 3px solid rgba(0, 0, 0, 0.701961); width: 200px; z-index: 999999; background: rgb(255, 255, 255);">
<h4 style="margin: 0 0 5px 0; border-bottom: 1px dashed #ddd; padding-bottom: 3px;">Layout Options</h4><div 
class="form-group no-margin">
<div class=".checkbox"><label><input type="checkbox" onchange="change_layout();"> Fixed layout</label>
</div>
</div>
<h4 style="margin: 0 0 5px 0; border-bottom: 1px dashed #ddd; padding-bottom: 3px;">Skins</h4>
<div class="form-group no-margin"><div class=".radio"><label>
<input name="skins" type="radio" onchange="change_skin(&quot;skin-black&quot;);"> Black</label>
</div>
</div>
<div class="form-group no-margin"><div class=".radio">
<label>
<input name="skins" type="radio" onchange="change_skin(&quot;skin-blue&quot;);" checked="checked"> Blue</label>
</div>
</div>
</div>
</body>
</html>