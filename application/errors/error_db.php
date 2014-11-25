<?php

function is_https(){ 
    if ( (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) 
    {   
        $protocol = "https";
        return $protocol; 
    }
    else 
    {
        $protocol = "http";
        return $protocol; 
    }
} 

$is = is_https();
$bsurl = $is."://".$_SERVER['HTTP_HOST'];
$bsurl .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
$config['base_url'] = "$bsurl";
?>
<html style="min-height: 749px;"><head>
        <meta charset="UTF-8">
        <title><?php echo $heading; ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link href="<?php echo $is; ?>://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!-- Theme style -->
        <link href="<?= $bsurl ?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue  pace-done" style="min-height: 749px;">
        <div class="wrapper row-offcanvas row-offcanvas-left" style="min-height: 749px;">
                <section class="content">
                    <div class="error-page">
                        <h2 class="headline text-info">DB</h2>
                        <div class="error-content">
                            <h3><i class="fa fa-warning text-yellow"></i> <?php echo $heading; ?></h3>
                            <p>
                                <?php echo $message; ?>
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
    </body>
</html>