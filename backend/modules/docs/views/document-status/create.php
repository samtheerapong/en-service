<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\docs\models\DocumentStatus $model */

$this->title = Yii::t('app', 'Create Document Status');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Document Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
