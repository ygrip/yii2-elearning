<?php

namespace app\controllers;

use app\models\SignUpForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\helpers\Url;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;   
use app\models\UploadFile;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    // public function behaviors()
    // {
    //     return [
    //         'access' => [
    //             'class' => AccessControl::className(),
    //             'only' => ['logout'],
    //             'rules' => [
    //                 [
    //                     'actions' => ['logout'],
    //                     'allow' => true,
    //                     'roles' => '@',
    //                 ]
    //             ],
    //         ],
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'logout' => ['post'],
    //             ],
    //         ],
    //     ];
    // }

    /**
     * @inheritdoc
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
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {

        // Login handler
        $session = Yii::$app->session;
        $request = Yii::$app->request;

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['site/index']);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
            'identifier' => $request->get('identifier')
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        $session = Yii::$app->session;
        $session->removeAll();
        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRegister(){

        $model = new SignUpForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            return $this->redirect(['login']);
        }
        $model->password = '';
        return $this->render('signup',[
            "model"=> $model
        ]);

    }

    public function actionCourse()
    {
        return $this->render('course');
    }

    public function actionPortal(){
        return $this->render("portal");
    }

    public function actionFreebies(){
        return $this->render("freebies",[
            "navbar"=>true
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    
    public function actionMycourse()
    {
        return $this->render('course\index');
    }

    public function actionCoba(){
        $request = Yii::$app->request;

        return $request->get('id')." Punya Coba";
    }

    public function actionProfile(){
        $request = Yii::$app->request;

        return $request->get('id')." Punya Profile";
    }

    public function actionInsertfreebies()
    {
        $model = new UploadFile();

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->upload()) {
                // file is uploaded successfully
                return $this->redirect(['freebies']);
            }
        }

        return $this->render('insertfreebies', ['model' => $model]);
    }

    public function actionLinechatbot()
    {
        return $this->render('linechatbot');
    }

    public function actionGeneraterandom()
    {
        $length = rand(4,4);
        $chars = array_merge(range(0,9));
        shuffle($chars);
        $random_angka = implode(array_slice($chars, 0,$length));

        return $this->render('generaterandom', array('random_angka' => $random_angka,));
    }
}
