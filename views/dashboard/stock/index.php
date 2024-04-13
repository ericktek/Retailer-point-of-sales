<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\Products $model */

$this->title = 'Stock';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="shadow-sm p-3 mb-3 bg-body">
  <h1 class="container fs-2 fst-normal tracking-tight text-dark mx-auto"><?= Html::encode($this->title) ?></h1>
</div>

<div class="container d-flex justify-content-end mb-4">
  <?= Html::a('Add stock', ['create'], ['class' => 'btn btn-dark']) ?>

</div>

<div style="height: 100vh;" class="container border bg-color rounded-3">
  <div style="margin-top: 40px;" class="container">
    <div class="mt-2">
    <?php $form = ActiveForm::begin([
        'action' => ['stock'],
        'method' => 'get',
    ]); ?>
  <div>
    <?php ActiveForm::end(); ?>
    
    <div>
    <div style="margin-top: 10px; margin-bottom: 20px;" class="d-flex gap-3 ">
    <?= $form->field($searchModel, 'name', ['options' => ['class' => 'w-100'], 'labelOptions' => ['style' => 'display: none;']])->textInput(['placeholder' => 'Search', 'class' => 'form-control me-2 ']) ?>
        <?= Html::submitButton('Search', ['class' => 'btn btn-outline-dark text-end']) ?>
    </div>
</div>

      </div>
      <div class="card scrollable-content-stock">
        <table class="table table-striped card-text-size">
          <thead>
            <tr>
              <th class="size" scope="col">SN</th>
              <th class="size" scope="col">Name</th>
              <th class="size" scope="col">Expenses</th>
              <th class="size" scope="col">Quantity</th>
              <th class="size" scope="col">Buying Price</th>
              <th class="size" scope="col">Selling Price</th>
              <th class="size" scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($dataProvider->models as $index => $product) : ?>
              <tr>
                <td><?= $index + 1 ?></td>
                <td><?= Html::encode($product->name) ?></td>
                <td><?= $product->expense ?></td>
                <td><?= $product->qty ?></td>
                <td><?= $product->buying_price ?></td>
                <td><?= $product->selling_price ?></td>

                <td>
                  <?= Html::a('Edit', ['update', 'id' => $product->id], [
                    'class' => 'btn btn-primary btn-sm',
                    
                  ]) ?>
                  <?= Html::a('Delete', ['delete', 'id' => $product->id], [
                    'class' => 'btn btn-danger btn-sm',
                    'data' => [
                      'confirm' => 'Are you sure you want to delete this item?',
                      'method' => 'post',
                    ],
                  ]) ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>