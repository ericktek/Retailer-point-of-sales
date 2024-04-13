<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

if (Yii::$app->user->isGuest) {
    Yii::$app->response->redirect(['/auth/login'])->send();
    Yii::$app->end();
}

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'imageFile/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body style="height: 100vh;" class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">


<?php

    $brandLabel = 'Welcome, <span class="text-uppercase fs-6">' . Yii::$app->user->identity->username . '</span>';
    if (Yii::$app->user->identity->role === 'admin') {
        $brandLabel = 'Welcome, SuperUser <span class="text-uppercase fs-6">(' . Yii::$app->user->identity->username . ')</span>';
    }
    NavBar::begin([
        'brandLabel' => $brandLabel,
        'brandOptions' => ['class' => 'fw-normal fs-6 fst-italic'],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar navbar-expand-lg navbar-dark bg-dark fixed-top'],
    ]);


    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto'],
        
        'items' => [
            
            ['label' => 'Point of Sale', 'url' => ['/dashboard/index'],],
            ['label' => 'Stock', 'url' => ['/dashboard/stock'],],
            ['label' => 'Sales', 'url' => ['/dashboard/sales'],],
            ['label' => 'Reports', 'url' => ['/dashboard/report'], 'visible' => Yii::$app->user->identity->role === 'admin'],
           
        ]
        
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto'],
        
        'items' => [
           [
                'label' => 'Logout',
                'url' => ['/dashboard/logout'],
                'linkOptions' => ['class' => 'nav-link btn btn-link logout active border'],
                'options' => ['class' => 'nav-item'],
                'encodeLabels' => false, 
            ],
           
        ]
        
    ]);
    NavBar::end();
    ?>

</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="h-custom">
    
            <?= $content ?>
    
    </div>
</main>

<footer id="footer" class="footer mt-auto py-3">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; POS <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end">Powered by Group 'C' Team</div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage()
?>
