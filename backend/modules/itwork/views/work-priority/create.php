<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\itwork\models\WorkPriority $model */

$this->title = Yii::t('app', 'Create Work Priority');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Work Priorities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-priority-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
