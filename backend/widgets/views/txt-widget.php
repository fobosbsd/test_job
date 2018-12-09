<?php

use yii\bootstrap\Html;

if (count($headers) > 0) {
    foreach ($headers as $title => $arrstr) :
        ?>
        <h1 class="col-12"><?= Html::encode(Yii::$app->parameters->get(Html::encode($title))) ?></h1>
        <?php
        if (isset($arrstr) && is_array($arrstr)) {
            foreach ($arrstr as $item) :
                ?>
                <br/><?= Html::encode(Yii::$app->parameters->get(Html::encode($item))) ?>
                <?php
            endforeach;
        }
        ?>
        <?php
    endforeach;
}
?>