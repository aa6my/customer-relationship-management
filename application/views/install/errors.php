<?php $this->load->view('layout/header',array('title'=>$this->lang->line('Errors')));?>
    <div class="middle-box text-center animated fadeInDown">
        <h1><span class="glyphicon glyphicon-remove"></span></h1>
        <div class="alert alert-error">
            <ol class="text-left">
                <?php foreach($errors as $error){?>
                <li><?= $error?></li>
                <?php }?>
            </ol>
        </div>
        <h4><?= $this->lang->line('Fix these errors and refresh this page to be able to continue installation')?></h4>
    </div>
<?php $this->load->view('layout/footer') ?>