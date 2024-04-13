<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Products $model */
$this->title = 'Create Product';

?>
<div class="products-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>


