<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Reports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shadow-sm p-3 mb-3 bg-body">
    <h1 class="container fs-2 fst-normal tracking-tight text-dark mx-auto"><?= Html::encode($this->title) ?></h1>
</div>
<div class="container d-flex justify-content-end mb-3">
    <?= Html::a('Export PDF', ['export-pdf-report'], ['class' => 'btn btn-outline-dark', 'id' => 'export-pdf-btn']) ?>

</div>

<div style="height: 100vh;" class="container border bg-color rounded-3">
    <div style="margin-top: 40px;" class="container ">
        <div class="mt-2">
            <div class="card scrollable-content-sales">
                <table class="table  shadow ">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Data</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr style="height: 4rem;">
                            <td>Stock at Start</td>

                            <td style="padding-right: 120px;"><?= $totalProductsQuantity ?></td>
                        </tr>

                        <tr style="height: 4rem;">
                            <td>Stock Available</td>
                            <td><?= $availableStock ?></td>
                        </tr>
                        <tr>
                            <td>Total Items Sold</td>
                            <td><?= $totalSalesQuantity ?></td>
                        </tr>




                        <tr style="height: 4rem;">
                            <td>Total Sales Amount</td>
                            <td><?= $totalSalesPrice ?></td>
                        </tr>
                        <tr style="height: 4rem;">

                            <td>expense</td>
                            <td><?= $totalProductsexpense ?></td>
                        </tr>


                        <tr>
                            <th>Net Income</th>
                            <td><?= $netIncome ?> TSH</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>