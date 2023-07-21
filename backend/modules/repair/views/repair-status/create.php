<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\repair\models\RepairStatus $model */

$this->title = Yii::t('app', 'Create Repair Status');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Repair Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repair-status-create">

    <p>
        <?= Html::a('<i class="fa fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), ['index'], ['class' => 'btn btn-primary']) ?>
    </p>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>