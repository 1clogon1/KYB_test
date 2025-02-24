<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap4\Alert;
?>

<h1>Авторизация</h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>
<?= $form->field($model, 'password')->passwordInput() ?>

<div class="form-group">
    <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
</div>

<?php ActiveForm::end(); ?>

<p>Ещё нет аккаунта? <?= Html::a('Зарегистрироваться', ['site/signup']) ?></p>
