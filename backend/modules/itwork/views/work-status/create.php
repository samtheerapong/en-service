<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\itwork\models\WorkStatus $model */

$this->title = Yii::t('app', 'Create Work Status');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Work Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
