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
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-19175540-9', 'auto');
            ga('send', 'pageview');
        </script>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <section id="wrapper" class="error-page">
            <div class="error-box">
                <div class="error-body text-center">
                    <?= Alert::widget() ?>
                    <?= $content ?>
                    <footer class="footer text-center"><?= date('Y') ?> &copy; Oazis.com</footer>
                </div>
        </section>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
