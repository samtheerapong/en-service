<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\docs\models\DocumentCategories $model */

$this->title = Yii::t('app', 'Create Document Categories');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Document Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
