<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header>
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
            ],
        ]);
        $menuItems = [
            [
                'label' => Yii::t('app', 'Repair'),
                'url' => ['/repair/repair/index'],
            ],
            [
                'label' => Yii::t('app', 'Systems'),
                'items' => [
                    ['label' => Yii::t('app', 'Repair Priority'), 'url' => ['/repair/repair-priority/index']],
                    ['label' => Yii::t('app', 'Repair Status'), 'url' => ['/repair/repair-status/index']],
                    ['label' => Yii::t('app', 'Repair Type'), 'url' => ['/repair/repair-type/index']],
                ],
            ],

            // [
            //     'label' => Yii::t('app', 'Users'),
            //     'items' => [
            //         ['label' => Yii::t('app', 'User'), 'url' => ['/user'],],
            //         ['label' => Yii::t('app', 'Admin'), 'url' => ['/admin'],],
                    
            //     ],
            // ],
            [
                'label' => Yii::t('app', 'User Manage'),
                'items' => [
                    // ['label' => Yii::t('app', 'User'), 'url' => ['/admin/user'],],
                    ['label' => Yii::t('app', 'Users'), 'url' => ['/user'],],
                    ['label' => Yii::t('app', 'Assignment'), 'url' => ['/admin/assignment'],],
                    ['label' => Yii::t('app', 'Assigned users'), 'url' => ['/admin/role'],],
                    ['label' => Yii::t('app', 'Permission'), 'url' => ['/admin/permission'],],
                    ['label' => Yii::t('app', 'Route'), 'url' => ['/admin/route'],],
                    ['label' => Yii::t('app', 'Rule'), 'url' => ['/admin/rule'],],
                    
                ],
            ],
        ];
        // $menuItems[] = ['label' => 'Signup', 'url' => ['/user/registration/register']];
        // $menuItems[] = ['label' => 'Login', 'url' => ['/user/security/login']];
        // if (Yii::$app->user->isGuest) {
        //     $menuItems[] = ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']];
        // }

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
            'items' => $menuItems,
        ]);
        if (Yii::$app->user->isGuest) {
            echo Html::tag('div', Html::a(Yii::t('app', 'Login'), ['/site/login'], ['class' => ['btn btn-link login text-decoration-none']]), ['class' => ['d-flex']]);
        } else {
            $nameToDisplay = Yii::$app->user->identity->thai_name ? Yii::$app->user->identity->thai_name : Yii::$app->user->identity->username;

            echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
                . Html::submitButton(
                    Yii::t('app', 'Logout') . ' ( ' . $nameToDisplay . ' ) ',
                    ['class' => 'btn btn-link logout text-decoration-none']
                )
                . Html::endForm();
        }
        NavBar::end();
        ?>
    </header>

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer class="footer mt-auto py-3 text-muted">
        <div class="container">
            <p class="float-start">&copy; NFC <?= date('Y') ?></p>
            &nbsp; Code By Theerapong Khanta.
            <p class="float-end">Version 1.0.0</p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
