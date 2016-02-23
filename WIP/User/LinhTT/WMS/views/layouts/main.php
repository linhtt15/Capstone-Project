<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Dropdown;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

    <?php

    NavBar::begin([
        'brandLabel' => 'Home',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],

        'items' => [
            [
                'label' => 'Toa xe',  'visible' =>!Yii::$app->user->isGuest,
                'items' => [
                   // '<li class="dropdown-header">Quản lý toa xe</li>',
                    ['label' => 'Thêm mới toa xe', 'url' => '#'],
                    '<li class="divider"></li>',
                    ['label' => 'Danh sách quản lý toa', 'url' => '#'],
                    '<li class="divider"></li>',
                    ['label' => 'Xác nhận toa xe', 'url' => '#'],
                ],
            ],
            [
                'label' => 'Ga xe',  'visible' =>!Yii::$app->user->isGuest,
                'items' => [
                   // '<li class="dropdown-header">Quản lý ga xe</li>',
                    ['label' => 'Thêm mới ga xe', 'url' => '#'],
                    '<li class="divider"></li>',
                    ['label' => 'Danh sách ga xe', 'url' => '#'],
                ],
            ],
            [
                'label' => 'Vận đơn',  'visible' =>!Yii::$app->user->isGuest,
                'items' => [
                    //'<li class="dropdown-header">Quản lý vận đơn</li>',
                    ['label' => 'Tạo vận đơn', 'url' => '#'],
                    '<li class="divider"></li>',
                    ['label' => 'Danh sách vận đơn', 'url' => '#'],
                ],
            ],
            [
                'label' => 'Người dùng',  'visible' =>!Yii::$app->user->isGuest,
                'items' => [
                    // '<li class="dropdown-header">Quản lý người dùng</li>',
                    ['label' => 'Thêm người dùng', 'url' => ['/user/create']],
                    '<li class="divider"></li>',
                    ['label' => 'Danh sách người dùng', 'url' => ['/user']],
                ],
            ],
            [
                'label' => 'Tài khoản',  'visible' =>!Yii::$app->user->isGuest,
                'items' => [
                    // '<li class="dropdown-header">Quản lý người dùng</li>',
                    ['label' => 'Thông tin tài khoản', 'url' => '#'],
                    '<li class="divider"></li>',
                    ['label' => 'Đổi mật khẩu', 'url' => '#'],
                ],
            ],
            [
                'label' => 'Loại hàng',  'visible' =>!Yii::$app->user->isGuest,
                'items' => [
                    // '<li class="dropdown-header">Quản lý người dùng</li>',
                    ['label' => 'Thêm loại hàng', 'url' => '#'],
                    '<li class="divider"></li>',
                    ['label' => 'Danh sách loại hàng', 'url' => '#'],
                ],
            ],




            Yii::$app->user->isGuest ?

                ['label' => 'Login', 'url' => ['/site/login']] :
                [
                    'label' => '(' . Yii::$app->user->identity->username . ')',
                    'items' => [
                        // '<li class="dropdown-header">Quản lý người dùng</li>',
                        ['label' => 'Thông tin tài khoản', 'url' => '#'],
                        '<li class="divider"></li>',
                        ['label' => 'Đổi mật khẩu', 'url' => '#'],
                        '<li class="divider"></li>',
                        ['label'=>'Đăng xuất','url' => ['/site/logout'],'linkOptions' => ['data-method' => 'post']],
                    ],
                ],
//                [
//                    'label' => '(' . Yii::$app->user->identity->username . ')',
//                    'item' =>[
//                    ['label'=>'Đăng xuất','url' => ['/site/logout'],
//                    'linkOptions' => ['data-method' => 'post']],
//                    '<li class="divider"></li>',
//                    ['label' => 'Thông tin tài khoản', 'url' => '#'],
//                    '<li class="divider"></li>',
//                    ['label' => 'Đổi mật khẩu', 'url' => '#'],
//                    ],
//
//                ],


        ],
    ]);
    NavBar::end();
    ?>
<!--    <div class="dropdown">-->
<!--        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Label <b class="caret"></b></a>-->
<!--        --><?php
//        echo Dropdown::widget([
//            'items' => [
//                ['label' => 'DropdownA', 'url' => '/'],
//                ['label' => 'DropdownB', 'url' => '#'],
//            ],
//        ]);
//        ?>
<!--    </div>-->
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
