<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\repair\models\RepairType $model */

$this->title = Yii::t('app', 'Update') . ' : ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Repair Type'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="repair-type-update">

    <p>
        <?= Html::a('<i class="fa fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>