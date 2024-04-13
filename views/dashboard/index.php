<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Point of Sale';
$this->params['breadcrumbs'][] = $this->title;

// Include the JavaScript file
$this->registerJsFile('@web/js/script.js', ['depends' => [\yii\web\JqueryAsset::class]]);
?>


<div class="shadow-sm p-3 mb-5 bg-body">
    <h1 class="container fs-2 fst-normal tracking-tight text-dark mx-auto"><?= Html::encode($this->title) ?></h1>
</div>

<div class="container border bg-color rounded-3 ">
    <div class="container p-4">
        <div style="margin-top:10px;" class="container-fluid">
            <div class="row justify-content-between ">
                <div class="col-md-5  pt-6 border rounded-3 mb-4">
                    <!-- Search Form -->
                    <?php $form = ActiveForm::begin([
                        'id' => 'search-form',
                        'action' => ['dashboard/filter-products'],
                        'method' => 'get',
                    ]); ?>

                    <div style="margin-top: 10px; margin-bottom: 10px;" class="d-flex gap-2">
                        <?= $form->field($searchModel, 'name', ['options' => ['class' => 'w-100 '], 'labelOptions' => ['style' => 'display: none;']])->textInput(['placeholder' => 'Search', 'class' => 'form-control me-2']) ?>
                        <?= Html::submitButton('Search', ['class' => 'btn btn-outline-dark text-end']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>

                    <!-- Product List -->
                    <div style=" margin-top: 10px;" class="scrollable-content">
                        <table class=" table table-striped shadow">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <!-- Product List -->
                            <?= $this->render('_product_list', ['dataProvider' => $dataProvider, 'layout' => false]) ?>

                        </table>
                    </div>
                </div>

                <!-- Cart Display -->


                <div class="col-md-6 ">

                    <div style="margin-bottom: 40px; " class="mt-3">
                        <?php if (Yii::$app->session->hasFlash('success')) : ?>

                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </symbol>
                                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                                </symbol>
                                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </symbol>
                            </svg>

                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="16" height="16" role="img" aria-label="Success:">
                                    <use xlink:href="#check-circle-fill" />
                                </svg>
                                <div>
                                    <?= Yii::$app->session->getFlash('success') ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (Yii::$app->session->hasFlash('error')) : ?>

                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </symbol>
                                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                                </symbol>
                                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </symbol>
                            </svg>
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>

                                <?= Yii::$app->session->getFlash('error') ?>
                            </div>
                        <?php endif; ?>
                        <div class="card card-custom scrollable-content-cart">

                            <table class=" table" id="cart-table">
                                <thead class="table-light shadow">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Cart items will be dynamically added here -->
                                </tbody>
                            </table>
                        </div>
                        <?php $form = ActiveForm::begin(); ?>

                        <div class="mb-2 mt-4">

                            <p class="card-text fs-5">Total Items: <span id="total-items">0</span></p>
                            <?= $form->field($saleModel, 'totalItems')->hiddenInput(['id' => 'total-items-input'])->label(false) ?>
                            <div class="mb-2">
                                <p class="card-text fs-5">Total Quantity: <span id="total-quantity">0</span></p>
                                <?= $form->field($saleModel, 'totalQuantity')->hiddenInput(['id' => 'total-quantity-input'])->label(false) ?>
                            </div>
                            <div class="mb-3">
                                <p class="card-text fs-5 fw-bold">Total Price: <span id="total-price">0.00</span> TSH</p>
                                <?= $form->field($saleModel, 'totalPrice')->hiddenInput(['id' => 'total-price-input'])->label(false) ?>
                            </div>
                            <div class="mb-3">
                                <?= Html::submitButton('Complete Sale', ['class' => 'btn btn-dark', 'id' => 'submit-button']) ?>
                            </div>
                        </div>

                        <?php ActiveForm::end(); ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>