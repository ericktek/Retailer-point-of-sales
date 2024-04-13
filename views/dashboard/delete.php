<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Point of Sale';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shadow-sm p-3 mb-5 bg-body">
    <h1 class="container fs-2 fst-normal tracking-tight text-dark mx-auto"><?= Html::encode($this->title) ?></h1>
</div>

<div class="container border bg-color rounded-3 ">
    <div class="container ">
        <div style="margin-top:20px" class="container-fluid">
            <div class="row">
                <div class="col-md-3  pt-6">
                    <?php $form = ActiveForm::begin([
                        'action' => ['index'],
                        'method' => 'get',
                    ]); ?>


                    <div class="">


                        <div style="margin-top: 10px; margin-bottom: 10px;" class="d-flex gap-2">
                            <?= $form->field($searchModel, 'name', ['options' => ['class' => 'w-100 '], 'labelOptions' => ['style' => 'display: none;']])->textInput(['placeholder' => 'Search', 'class' => 'form-control me-2 ']) ?>
                            <?= Html::submitButton('Search', ['class' => 'btn btn-outline-dark text-end']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>

                        <div style=" margin-top: 10px;" class="scrollable-content">

                            <table class=" table table-secondary shadow">
                                <thead>
                                    <tr>
                                        <th scope="col">SN</th>
                                        <th scope="col">NAME</th>
                                        <th scope="col">PRICE</th>
                                    </tr>
                                </thead>
                            </table>
                            <table class="table table-striped">

                                <tbody>

                                    <?php foreach ($dataProvider->models as $index => $product) : ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td><?= $product->name ?></td>
                                            <td><?= $product->price ?></td>


                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <div class="col-md-4 scrollable-content">
                    <div class=" mt-2 mb-3">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div style="padding: 1.25rem;" class="">
                                    <div class="card-body">
                                        <h5 class="card-title fs-4 mb-4">Product and Payments </h5>

                                        <form>
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <h2 style="color: #35374B;" class="fs-5 ">Hill Vally Water</h2>
                                            </div>
                                            <div class="mb-3">
                                                <label for="price" class="form-label">Price</label>
                                                <h2 style="color: #35374B;" class="fs-5 ">TSH 700</h2>
                                            </div>
                                           
                                            <div class="mb-3">
                                                <label for="quantity" class="form-label">Select Quantity</label>


                                                <div class="row">

                                                    <div class="d-flex gap-3">
                                                        <div><span>-</span></div>
                                                        <input type="number" class="form-control text-center" id="quantity" name="quantity" min="1" value="1">
                                                        <div><span>+</span></div>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="mb-3">
                                                <p class="card-text">Payment Amount: <span id="paymentAmount">1400</span> TSH</p>
                                            </div>
                                            <button type="submit" class="btn btn-dark">Add to Cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-5 ">

                    <div style="margin-bottom: 40px; " class="mt-3">
                        <div class="card card-custom scrollable-content-cart">

                                <table class=" table table-secondary shadow ">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                                <table class="table table-striped">

                                    <tbody>
                                        <tr>
                                            <td>Mark</td>
                                            <td>700</td>
                                            <td>100</td>
                                            <td class="d-flex justify-content-center">
                                                <button type="button" class="btn btn-danger btn-sm opacity-75">
                                                    Remove </button>
                                            </td>

                                        </tr>

                                        <tr>
                                            <td>Mark</td>
                                            <td>23000</td>
                                            <td>23</td>
                                            <td class="d-flex justify-content-center">
                                                <button type="button" class="btn btn-danger btn-sm btn-rounded opacity-75">
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jacob</td>
                                            <td>400</td>
                                            <td>90</td>
                                            <td class="d-flex justify-content-center">
                                                <button type="button" class="btn-sm btn-rounded btn btn-danger opacity-75">
                                                    Remove </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mark</td>
                                            <td>200</td>
                                            <td>11</td>
                                            <td class="d-flex justify-content-center">
                                                <button type="button" class=" btn-sm btn-rounded btn btn-danger opacity-75">
                                                    Remove </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mark</td>
                                            <td>200</td>
                                            <td>11</td>
                                            <td class="d-flex justify-content-center">
                                                <button type="button" class=" btn-sm btn-rounded btn btn-danger opacity-75">
                                                    Remove </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mark</td>
                                            <td>200</td>
                                            <td>11</td>
                                            <td class="d-flex justify-content-center">
                                                <button type="button" class=" btn-sm btn-rounded btn btn-danger opacity-75">
                                                    Remove </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mark</td>
                                            <td>200</td>
                                            <td>11</td>
                                            <td class="d-flex justify-content-center">
                                                <button type="button" class=" btn-sm btn-rounded btn btn-danger opacity-75">
                                                    Remove </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jacob</td>
                                            <td>23000</td>
                                            <td>500</td>
                                            <td class="d-flex justify-content-center">
                                                <button type="button" class="btn-sm btn btn-danger opacity-75">
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="col">
                            <div class="mb-2">
                                <p class="card-text fs-5">Total Items: <span id="paymentAmount">10</span></p>
                            </div>
                            <div class="mb-2">
                                <p class="card-text fs-5">Total Quantity: <span id="paymentAmount">8</span> </p>
                            </div>
                            <div class="mb-3">
                                <p class="card-text fs-5 fw-bold">Total Price: <span id="paymentAmount">10400</span> TSH</p>
                            </div>
                            <div class="mb-3">
                                <button type="button" class="btn btn-dark ">Complete Sale</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>