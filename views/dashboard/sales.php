<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Sales';
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="shadow-sm p-3 mb-3 bg-body">
    <h1 class="container fs-2 fst-normal tracking-tight text-dark mx-auto"><?= Html::encode($this->title) ?></h1>
</div>
<div class="container d-flex justify-content-end mb-3">
<?= Html::a('Export PDF', ['export-pdf'], ['class' => 'btn btn-outline-dark', 'id' => 'export-pdf-btn']) ?>
</div>

<div style="height: 100vh;" class="container border bg-color rounded-3">
    <div style="margin-top: 40px;" class="container ">
        <div class="mt-2">
            <div class="card scrollable-content-sales">

              <div class="container">
              <table class="table table-striped card-text-size ">
                    <thead>
                        <tr>
                            <th class="size" scope="col">S/N</th>
                            <th class="size" scope="col">Receipt No</th>
                            <th class="size" scope="col">Total Items</th>
                            <th class="size" scope="col">Total Quantity</th>
                            <th class="size" scope="col">Payment Amount</th>
                            <th class="size" scope="col">Date</th>
                            
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($saleProvider->getModels() as $index => $sale) : ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td>SR<?= $sale->id ?></td>
                                <td><?= $sale->totalItems ?></td> 
                                <td><?= $sale->totalQuantity ?></td>
                                <td><?= $sale->totalPrice ?></td>
                                <td><?= Yii::$app->formatter->asDate($sale->created_at) ?></td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>

              </div>
            </div>
        </div>
    </div>
</div>