<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap4\Alert;
?>

<h1>Регистрация</h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>
<?= $form->field($model, 'password')->passwordInput() ?>

<div class="form-group">
    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
</div>

<?php ActiveForm::end(); ?>

<p>Уже есть аккаунт? <?= Html::a('Войти', ['site/login']) ?></p>
