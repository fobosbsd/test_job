<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\bootstrap\Html;

$this->title = $name;
?>
<?php if (isset($exception->statusCode)) { ?>
    <?php if ($exception->statusCode == 404) { ?>
        <h1><?= $exception->statusCode ?></h1>
        <h3 class="text-uppercase">Page Not Found !</h3>
        <p class="text-muted m-t-30 m-b-30">YOU SEEM TO BE TRYING TO FIND HIS WAY HOME</p>
    <?php } elseif ($exception->statusCode == 400) { ?>
        <h1><?= $exception->statusCode ?></h1>
        <h3 class="text-uppercase">Page Not Found !</h3>
        <p class="text-muted m-t-30 m-b-30">YOU SEEM TO BE TRYING TO FIND HIS WAY HOME</p>
    <?php } elseif ($exception->statusCode == 403) { ?>
        <h1><?= $exception->statusCode ?></h1>
        <h3 class="text-uppercase">Forbidden Error</h3>
        <p class="text-muted m-t-30 m-b-30 text-uppercase">You don't have permission to access on this server.</p>
    <?php } elseif ($exception->statusCode == 500) { ?>
        <h1><?= $exception->statusCode ?></h1>
        <h3 class="text-uppercase">Internal Server Error.</h3>
        <p class="text-muted m-t-30 m-b-30">Please try after some time</p>
    <?php } elseif ($exception->statusCode == 503) { ?>
        <h1><?= $exception->statusCode ?></h1>
        <h3 class="text-uppercase">This site is getting a up in few minute.</h3>
        <p class="text-muted m-t-30 m-b-30">Please try after some time</p>
    <?php } else { ?>
        <h1><?= Html::encode($exception->statusCode) ?></h1>
        <p class="text-muted m-t-30 m-b-30"><?= nl2br(Html::encode($message)) ?></p>
    <?php } ?>
<?php } ?>