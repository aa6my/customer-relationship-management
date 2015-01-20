<?php  $this->load->view('layout/header',array('title'=>$this->lang->line('Error'))) ?>
<div class="middle-box text-center animated fadeInDown">
    <h1><?= $this->lang->line('Error')?></h1>
    <div class="error-desc">
        <?= $message?>
    </div>
</div>
<?php $this->load->view('layout/footer') ?>