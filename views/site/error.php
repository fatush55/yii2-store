<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error" style="margin: 100px">

    <h2 class="text-center" style="margin-bottom: 50px"><?= Html::encode($this->title) ?></h2>

    <div class="alert alert-danger text-center">
        <?= nl2br(Html::encode($message)) ?>
    </div>

</div>
