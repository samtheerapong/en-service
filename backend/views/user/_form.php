<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([
        '10' => 'เปิดใช้งาน',
        '9' => 'ปิดใช้งาน',
    ], ['prompt' => Yii::t('app', 'Select...')]) ?>

    <?= $form->field($model, 'role')->dropDownList([
        '10' => 'Admin',
        '9' => 'QC',
        '8' => 'Sale',
        '5' => 'Manager',
        '1' => 'User',
    ], ['prompt' => Yii::t('app', 'Select...')]) ?>

    <?= $form->field($model, 'thai_name')->textInput(['maxlength' => true]) ?>

    <br>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>