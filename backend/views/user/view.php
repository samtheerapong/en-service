<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\User $model */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">
    <div style="display: flex; justify-content: space-between;">
        <p>
            <?= Html::a('<i class="fas fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), ['index'], ['class' => 'btn btn-primary']) ?>
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

            <?= DetailView::widget([
                'model' => $model,
                'template' => '<tr><th style="width: 250px;">{label}</th><td> {value}</td></tr>',
                'attributes' => [
                    // 'id',
                    'username',
                    'thai_name',
                    'auth_key',
                    'password_hash',
                    'password_reset_token',
                    'email:email',
                    'created_at:date',
                    'updated_at:date',
                    'verification_token',
                    // 'role',
                    [
                        'attribute' => 'role',
                        'format' => 'raw',
                        'value' => function ($model) {
                            if ($model->role === 10) {
                                return '<span class="badge" style="background-color:#0079FF">Admin</span>';
                            } elseif ($model->role === 5) {
                                return '<span class="badge" style="background-color:#F86F03">Manager</span>';
                            } else {
                                return '<span class="badge" style="background-color:#6528F7">User</span>';
                            }
                        },
                    ],
                    // 'status',
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->status === 10 ? '<span class="badge" style="background-color:green">Enable</span>' : '<span class="badge" style="background-color:red">Disable</span>';
                        },
                    ]
                ],
            ]) ?>


        </div>
    </div>
</div>