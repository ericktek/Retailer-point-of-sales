<?php

use yii\helpers\Html;

$this->title = 'Net Income PDF Report';

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

<h1><?= Html::encode($this->title) ?></h1>

<table class="table shadow">
    <thead>
        <tr>
            <th>Title</th>
            <th>Data</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Stock at Start</td>
            <td><?= $totalProductsQuantity ?></td>
        </tr>
        <tr>
            <td>Stock Available</td>
            <td><?= $availableStock ?></td>
        </tr>
        <tr>
            <td>Total Items Sold</td>
            <td><?= $totalSalesQuantity ?></td>
        </tr>
        <tr>
            <td>Total Sales Amount</td>
            <td><?= $totalSalesPrice ?></td>
        </tr>
        <tr>
            <td>Expense</td>
            <td><?= $totalProductsexpense ?></td>
        </tr>
        <tr>
            <td>Net Income</td>
            <td><?= $netIncome ?> TSH</td>
        </tr>
    </tbody>
</table>
