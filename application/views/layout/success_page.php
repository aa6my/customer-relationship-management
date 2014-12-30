<?php  $this->load->view('layout/header',array('title'=>$this->lang->line('Success'))) ?>
    <div class="middle-box text-center animated fadeInDown">
        <h1><span class="glyphicon glyphicon-ok"></span></h1>
        <?= $message?>
    </div>
<?php $this->load->view('layout/footer') ?>