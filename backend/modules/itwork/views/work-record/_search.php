<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\itwork\models\WorkRecordSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="work-record-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'work_number') ?>

    <?= $form->field($model, 'priority_id') ?>

    <?= $form->field($model, 'work_group_id') ?>

    <?= $form->field($model, 'work_type_id') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'start_date') ?>

    <?php // echo $form->field($model, 'end_date') ?>

    <?php // echo $form->field($model, 'images') ?>

    <?php // echo $form->field($model, 'docs') ?>

    <?php // echo $form->field($model, 'member') ?>

    <?php // echo $form->field($model, 'cost') ?>

    <?php // echo $form->field($model, 'work_status_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
