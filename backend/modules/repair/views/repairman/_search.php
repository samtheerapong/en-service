<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\repair\models\RepairmanSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="repairman-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ticket_id') ?>

    <?= $form->field($model, 'ticket_number') ?>

    <?= $form->field($model, 'technician_team') ?>

    <?= $form->field($model, 'repair_start') ?>

    <?php // echo $form->field($model, 'repair_end') ?>

    <?php // echo $form->field($model, 'repair_type_id') ?>

    <?php // echo $form->field($model, 'spare_part') ?>

    <?php // echo $form->field($model, 'cost') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
