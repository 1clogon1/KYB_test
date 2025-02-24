<?php
/* @var $this yii\web\View */
/* @var $model app\models\Record */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Редактировать запись';
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="record-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
