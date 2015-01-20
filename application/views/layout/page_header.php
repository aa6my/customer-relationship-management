<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle count-info" href="mailbox">
                    <i class="fa fa-envelope"></i>
                    <?php if ($messages>0){?>
                    <span class="label label-warning"><?= $messages?></span>
                    <?php }?>
                </a>
            </li>
            <li>
                <a href="profile/logout">
                    <i class="fa fa-sign-out"></i> <?= $this->lang->line('Log out')?>
                </a>
            </li>
         </ul>
    </nav>
</div>