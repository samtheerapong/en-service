<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\itwork\models\WorkGroup $model */

$this->title = Yii::t('app', 'Create Work Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Work Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
