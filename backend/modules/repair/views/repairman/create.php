<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\repair\models\Repairman $model */

$this->title = Yii::t('app', 'Create Repairman');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Repairmen'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repairman-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
