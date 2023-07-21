<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\repair\models\Repairman $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="repairman-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ticket_id')->textInput() ?>

    <?= $form->field($model, 'ticket_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'technician_team')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'repair_start')->textInput() ?>

    <?= $form->field($model, 'repair_end')->textInput() ?>

    <?= $form->field($model, 'repair_type_id')->textInput() ?>

    <?= $form->field($model, 'spare_part')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'image')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
