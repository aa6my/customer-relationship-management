<html>
<head>
<script src="<?php echo base_url();?>assets/popup/sweet-alert.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/popup/sweet-alert.css">
</head>
<body onload="load()">
<script>
function load(){
    swal({
        title: "<?php echo $title;?>",
        text: "<?php echo $text;?>",
        timer: <?php echo $timer;?>
    });

    setTimeout(function () {
       window.location.href = "<?php echo base_url().$classfunc;?>"; //will redirect to your blog page (an ex: blog.html)
    }, 2000); //will call the function after 2 secs.
};
</script>
</body>
</html>
