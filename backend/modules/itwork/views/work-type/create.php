<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\itwork\models\WorkType $model */

$this->title = Yii::t('app', 'Create Work Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Work Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
