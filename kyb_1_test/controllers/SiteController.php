<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\User;
use app\models\Record;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            return $this->redirect(['site/login']);
        }

        return $this->render('signup', ['model' => $model]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['site/dashboard']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['site/dashboard']);
        }

        return $this->render('login', ['model' => $model]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionDashboard()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        $user = Yii::$app->user->identity;
        $records = Record::find()->all();

        $users = User::find()->all();

        if ($user->role === 'admin') {
            return $this->render('dashboard', [
                'user' => $user,
                'records' => $records,
                'isAdmin' => true,
                'users' => $users,
            ]);
        }

        return $this->render('dashboard', [
            'user' => $user,
            'isAdmin' => false,
            'records' => $records,
        ]);
    }

    public function actionAddRecord()
    {
        if (Yii::$app->user->identity->role !== 'admin') {
            return $this->redirect(['site/dashboard']);
        }

        $model = new Record();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['site/dashboard']);
        }

        return $this->render('add-record', ['model' => $model]);
    }

    public function actionEditRecord($id)
    {
        if (Yii::$app->user->identity->role !== 'admin') {
            return $this->redirect(['site/dashboard']);
        }

        $model = $this->findRecord($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['site/dashboard']);
        }

        return $this->render('edit-record', ['model' => $model]);
    }

    public function actionDeleteRecord($id)
    {
        if (Yii::$app->user->identity->role !== 'admin') {
            return $this->redirect(['site/dashboard']);
        }

        $this->findRecord($id)->delete();
        return $this->redirect(['site/dashboard']);
    }

    protected function findRecord($id)
    {
        if (($model = Record::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запись не найдена.');
    }
}


