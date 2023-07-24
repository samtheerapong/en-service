<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\repair\models\RepairTeam $model */

$this->title = Yii::t('app', 'Create Repair Team');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Repair Teams'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repair-team-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
