<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\bootstrap\Html,
    yii\widgets\Breadcrumbs;
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
        <div id="wrapper">
            <!-- Top Navigation -->
            <?= $this->render('_navbar') ?>
            <!-- End Top Navigation -->
            <!-- Left navbar-header -->
            <?= $this->render('_leftbar') ?>
            <!-- Left navbar-header end -->
            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <?=
                    Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ])
                    ?>
                    <?= Alert::widget() ?>
                    <?= $content ?>
                </div>
                <!-- /.container-fluid -->
                <footer class="footer text-center"> <?= date('Y') ?> &copy; Test Job </footer>
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->



        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
