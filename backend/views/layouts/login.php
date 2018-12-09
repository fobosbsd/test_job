<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\bootstrap\Html;
use backend\assets\AppAsset,
    backend\assets\BackendAsset;
use common\widgets\Alert;

AppAsset::register($this);
BackendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <!-- Preloader -->
        <div class="preloader">
            <div class="cssload-speeding-wheel"></div>
        </div>
        <section id="wrapper" class="login-register">
            <div class="login-box">
                <div class="white-box">
                    <?= Alert::widget() ?>
                    <?= $content ?>
                </div>
            </div>
        </section>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
