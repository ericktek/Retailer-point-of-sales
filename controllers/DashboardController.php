<?php

namespace app\controllers;

use Yii;
use Mpdf\Mpdf;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use app\models\Sale;
use app\models\Products;
use app\models\ProductSearch;
use yii\web\NotFoundHttpException;



class DashboardController extends Controller
{
    /**
     * {@inheritdoc}
     */

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['login', 'logout', 'signup', 'dashboard'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout', 'dashboard'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionDashboard()
    {
        // Check if the user is a guest
        if (Yii::$app->user->isGuest) {
            // Redirect the guest user to the login page
            return $this->redirect(['login']);
        }

        // If the user is authenticated, render the dashboard
        return $this->render('dashboard');
    }


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionFilterProducts()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->orderBy(['created_at' => SORT_DESC]);
        return $this->renderPartial('_product_list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionIndex()
    {

        // Instantiate the Sale model
        $saleModel = new Sale();

        // Check if the form is submitted
        if (Yii::$app->request->isPost) {
            // Load the form data into the model
            $saleModel->load(Yii::$app->request->post());

            // Validate the form data
            if ($saleModel->validate()) {
                // Save the data
                if ($saleModel->save()) {
                    Yii::$app->session->setFlash('success', 'Sale data saved successfully.');
                    return $this->redirect('/dashboard');
                } else {
                    // Handle the case where saving failed
                    Yii::$app->session->setFlash('error', 'Failed to save the sale data.');
                }
            }
        }

        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->orderBy(['created_at' => SORT_DESC]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'saleModel' => $saleModel,

        ]);
    }




    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionSales()
    {

        $saleProvider = new \yii\data\ActiveDataProvider([
            // 'query' => Sale::find()->orderBy(['created_at' => SORT_DESC]),
            'query' => Sale::find(),
            'pagination' => false,


        ]);



        return $this->render('sales', [
            'saleProvider' => $saleProvider,
        ]);
    }



    public function actionReport()
    {

        // Calculate total quantity of all products and sales items
        $totalProductsQuantity = Products::find()->sum('qty');
        $totalProductsexpense = Products::find()->sum('expense');
        $totalSalesQuantity = Sale::find()->sum('totalQuantity');
        $totalSalesPrice = Sale::find()->sum('totalPrice');

        $availableStock = $totalProductsQuantity - $totalSalesQuantity;
        $netIncome = $totalSalesPrice - $totalProductsexpense;


        return $this->render('report', [
            'totalProductsQuantity' => $totalProductsQuantity,
            'totalSalesQuantity' => $totalSalesQuantity,
            'totalSalesPrice' => $totalSalesPrice,
            'totalProductsexpense' => $totalProductsexpense,
            'availableStock' => $availableStock,
            'netIncome' => $netIncome,
        ]);
    }

    public function actionStock()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // Order the search results by created_at column in descending order
        $dataProvider->query->orderBy(['created_at' => SORT_DESC]);

        return $this->render('stock/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }



    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['dashboard/stock/']);
    }

    protected function findModel($id)
    {
        if (($model = Products::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCreate()
    {
        $model = new Products();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['dashboard/stock', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('stock/create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['stock', 'id' => $model->id]);
        }

        return $this->render('stock/update', [
            'model' => $model,
        ]);
    }

    public function actionExportPdf()
    {
        $saleProvider = new \yii\data\ActiveDataProvider([
            'query' => Sale::find(),
        ]);
    
        $mpdf = new Mpdf();
    
        $html = $this->renderPartial('pdf_template', [
            'saleProvider' => $saleProvider,
        ]);

    
        // Write HTML content to PDF
        $mpdf->WriteHTML($html);
    
        // Output PDF to browser
        $mpdf->Output('sales.pdf', 'D'); 
    }

    public function actionExportPdfReport()
    {
        // Retrieve data for the report table
        $totalProductsQuantity = Products::find()->sum('qty');
        $totalSalesQuantity = Sale::find()->sum('totalQuantity');
        $availableStock = $totalProductsQuantity - $totalSalesQuantity;
        $totalSalesPrice = Sale::find()->sum('totalPrice');
        $totalProductsexpense = Products::find()->sum('expense');
        $netIncome = $totalSalesPrice - $totalProductsexpense;
        
        // Render the PDF template view and get the HTML content
        $html = $this->renderPartial('pdf_template_report', [
            'totalProductsQuantity' => $totalProductsQuantity,
            'availableStock' => $availableStock,
            'totalSalesQuantity' => $totalSalesQuantity,
            'totalSalesPrice' => $totalSalesPrice,
            'totalProductsexpense' => $totalProductsexpense,
            'netIncome' => $netIncome,
        ]);
    
        // Create a new instance of Mpdf
        $mpdf = new Mpdf();
        
        $mpdf->WriteHTML($html);
    
        $mpdf->Output('report.pdf', 'D'); 
    }
    

    
}
