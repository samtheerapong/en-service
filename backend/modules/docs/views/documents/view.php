<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\modules\docs\models\Documents $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Documents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="documents-view">
<div style="display: flex; justify-content: space-between;">
        <p>
            <?= Html::a('<i class="fas fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), ['index'], ['class' => 'btn btn-primary']) ?>
            <!-- <?= Html::a('<i class="fas fa-download"></i> ' . Yii::t('app', 'Download'), ['download', 'id' => $model->id], ['class' => 'btn btn-info']) ?> -->
        </p>

        <p style="text-align: right;">
            <?= Html::a('<i class="fas fa-edit"></i> ' . Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>

            <?= Html::a('<i class="fas fa-trash"></i> ' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>

        </p>
    </div>


    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">

            <div class="col-md-12">
                <div class="<?= $model->getDaysToExpiration() < $model->days_left ? 'alert alert-danger' : 'alert alert-success' ?>">
                    เอกสารนี้จะหมดอายุในอีก: <?= $model->getDaysToExpiration() ?> วัน
                </div>
            </div>

            <?= DetailView::widget([
                'model' => $model,
                'template' => '<tr><th style="width: 250px;">{label}</th><td> {value}</td></tr>',
                'attributes' => [
                    // 'id',
                    'numbers',
                    'title',
                    'description:ntext',
                    // 'expiration_date:date',
                    [
                        'attribute' => 'expiration_date',
                        'format' => 'html',
                        'value' => Yii::$app->formatter->asDate($model->expiration_date, 'php:d M Y') .
                            ' <span class="badge" style="background-color: ' . ($model->getDaysToExpiration() < $model->days_left ? 'red' : 'green') . ';">' . $model->getDaysToExpiration() . ' days left</span>'
                    ],
                    'days_left',
                    'created_at:date',
                    'updated_at:date',
                    // 'created_by',
                    [
                        'attribute' => 'created_by',
                        'format' => 'html',
                        'value' => function ($model) {
                            $user = $model->createdBy->thai_name;
                            return $user ? $model->createdBy->thai_name : $model->createdBy->username;
                        },
                    ],
                    // 'updated_by',
                    // [
                    //     'attribute' => 'updated_by',
                    //     'format' => 'html',
                    //     'value' => function ($model) {
                    //         $user = $model->createdBy->thai_name;
                    //         return $user ? $model->createdBy->thai_name : $model->createdBy->username;
                    //     },
                    // ],
                    // 'categories_id',
                    [
                        'attribute' => 'categories_id',
                        'format' => 'html',
                        'value' => function ($model) {
                            return '<span class="badge" style="background-color:'
                                . $model->categories->color . ';"><b>'
                                . $model->categories->name
                                . ' </b></span>';
                        },
                    ],
                    // 'status_id',
                    [
                        'attribute' => 'status_id',
                        'format' => 'html',
                        'value' => function ($model) {
                            return '<span class="badge" style="background-color:'
                                . $model->status->color . ';"><b>'
                                . $model->status->name
                                . ' </b></span>';
                        },
                    ],
                    // 'ref',
                    // 'files:ntext',
                    [
                        'attribute' => 'docs',
                        'format' => 'html',
                        'value' => $model->listDownloadFiles('docs')
                    ],
                ],
            ]) ?>

        </div>
    </div>
</div>
