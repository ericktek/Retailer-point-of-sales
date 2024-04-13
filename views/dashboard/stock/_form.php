<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Products $model */
/** @var yii\widgets\ActiveForm $form */
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="shadow-sm p-3 mb-3 bg-body">
    <h1 class="container fs-2 fst-normal tracking-tight text-dark mx-auto"><?= Html::encode($this->title) ?></h1>
</div>


<div style="height: 100vh; " class="container border bg-color rounded-3">
    <div style="margin-top: 40px;" class="container mb">

        <div class="card products-form p-4 scrollable-content-sales">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Hill valley water']) ?>

            <?= $form->field($model, 'expense')->textInput(['maxlength' => true, 'placeholder' => '600']) ?>

            <?= $form->field($model, 'qty')->textInput(['placeholder' => '100']) ?>

            <?= $form->field($model, 'buying_price')->textInput(['maxlength' => true, 'placeholder' => '600']) ?>

            <?= $form->field($model, 'selling_price')->textInput(['maxlength' => true, 'placeholder' => '800']) ?>


            <div class="form-group ">
                <?= Html::submitButton('Save', ['class' => 'btn btn-dark ']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>

    </div>
</div>
</div>
</div>