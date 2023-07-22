<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">
<p>
            <?= Html::a('<i class="fas fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), ['index'], ['class' => 'btn btn-primary']) ?>
        </p>

    <?php $form = ActiveForm::begin(); ?>
    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">

            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'thai_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'status')->dropDownList([
                '10' => 'Enable',
                '9' => 'Disable',
            ], ['prompt' => Yii::t('app', 'Select...')]) ?>

            <?= $form->field($model, 'role')->dropDownList([
                '10' => 'Admin',
                '5' => 'Manager',
                '1' => 'User',
            ], ['prompt' => Yii::t('app', 'Select...')]) ?>


            <br>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>