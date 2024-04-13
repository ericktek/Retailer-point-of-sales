<?php


namespace app\controllers;

use Yii;
use app\models\User;
use yii\web\Controller;
use yii\web\Response;
use app\models\LoginForm;
use yii\web\UploadedFile;


class AuthController extends Controller
{

    public $layout = "auth-main";
    
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

  


    /**
     * Login action.
     *
     * @return Response|string
     */
  

     public function actionLogin($message = null)
     {
         $model = new LoginForm();

         if ($message !== null) {
            $model->registrationMessage = $message;
        }
         if ($model->load(Yii::$app->request->post()) && $model->login()) {
             return $this->redirect(['/dashboard']);
         }
     
         return $this->render('login', [
             'model' => $model,
         ]);
     }

     public function actionSignup()
     {
         $model = new User();
         $model->role = User::ROLE_USER;
     
         if ($this->request->isPost) {
             $model->load($this->request->post());

             // Check if the user already exists
            //  $existingUser = User::find()->where(['username' => $model->username])->orWhere(['email' => $model->email])->one();
            //  if ($existingUser !== null) {
            //      Yii::$app->session->setFlash('error', 'User already exists. Please choose a different username or email.');
            //      return $this->redirect(['signup']);
            //  }
             
             // Generate auth_key
             $model->auth_key = Yii::$app->security->generateRandomString();
     
             // Handle image upload
             $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
             if ($model->imageFile) {
                 $model->upload();
             }
     
             if ($model->save()) {
                // $message = 'Registered successfully. Please! Login  ';
                //['message' => $message]
                return $this->redirect(['login']);
             }
         }
     
         return $this->render('signup', [
             'model' => $model,
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
}