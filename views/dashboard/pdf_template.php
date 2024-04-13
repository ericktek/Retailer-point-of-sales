<?php

use yii\helpers\Html;

$this->title = 'Sales PDF Report';

?>

<!-- Add inline styles for better presentation -->
<style>
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        border: 1px solid #000;
        padding: 8px;
    }

    .table th {
        background-color: #000;
        color: #fff;
    }

    .table tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>

<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <table class="table table-striped card-text-size">
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
