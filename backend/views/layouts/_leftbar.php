<?php

use yii\bootstrap\Html,
    yii\helpers\Url;
?>
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <div class="user-profile">
            <div class="dropdown user-pro-body">
                <div><img src="/backend/web/plugins/images/users/varun.jpg" alt="user-img" class="img-circle"></div>
            </div>
        </div>
        <ul class="nav" id="side-menu">
            <li class="nav-small-cap m-t-10">&nbsp;&nbsp; <?= Yii::t('backend', 'Parameters') ?></li>
            <li><a href="/settings/index" class="waves-effect"><i data-icon=")" class="fa fa-cogs fa-fw"></i> <span class="hide-menu"><?= Yii::t('backend', 'Settings') ?></a></li>
        </ul>
    </div>
</div>

