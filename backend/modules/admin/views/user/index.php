<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\modules\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\admin\models\searchs\User */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('rbac-admin', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'username',
                        'email:email',
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return $model->status == 0 ? 'Inactive' : 'Active';
                            },
                            'filter' => [
                                0 => 'Inactive',
                                10 => 'Active'
                            ]
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => Helper::filterActionColumn(['view', 'activate', 'delete']),
                            'buttons' => [
                                'activate' => function ($url, $model) {
                                    if ($model->status == 10) {
                                        return '';
                                    }
                                    $options = [
                                        'title' => Yii::t('rbac-admin', 'Activate'),
                                        'aria-label' => Yii::t('rbac-admin', 'Activate'),
                                        'data-confirm' => Yii::t('rbac-admin', 'Are you sure you want to activate this user?'),
                                        'data-method' => 'post',
                                        'data-pjax' => '0',
                                    ];
                                    return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, $options);
                                }
                            ]
                        ],
                    ],
                ]);
                ?>
            </div>
        </div>
    </div>
</div>