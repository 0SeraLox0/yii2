<?php

/* @var $this yii\web\View */
/* @var $users app\models\User[] */

use yii\helpers\Html;

$this->title = 'Пользователи — Админка MUSIKZONE';
?>
<section class="screen-view active">
    <?= $this->render('_nav') ?>

    <div class="section-header-row" style="margin-bottom: 16px;">
        <h2 style="font-size: 18px; font-weight: 700;">Аккаунты пользователей (<?= count($users) ?>)</h2>
    </div>

    <div style="background: var(--color-bg-card); border: 1px solid var(--color-border-subtle); border-radius: var(--radius-lg); overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
            <thead>
                <tr style="border-bottom: 1px solid var(--color-border-subtle); text-align: left; color: var(--color-text-tertiary); font-size: 12px; text-transform: uppercase;">
                    <th style="padding: 14px 16px;">ID</th>
                    <th style="padding: 14px 16px;">Логин</th>
                    <th style="padding: 14px 16px;">Имя</th>
                    <th style="padding: 14px 16px;">Email</th>
                    <th style="padding: 14px 16px;">Роль</th>
                    <th style="padding: 14px 16px; text-align: right;">Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr style="border-bottom: 1px solid var(--color-border-subtle);">
                        <td style="padding: 12px 16px;"><?= $user->id ?></td>
                        <td style="padding: 12px 16px; font-weight: 700;"><?= Html::encode($user->username) ?></td>
                        <td style="padding: 12px 16px;"><?= Html::encode($user->display_name) ?></td>
                        <td style="padding: 12px 16px; color: var(--color-text-secondary);"><?= Html::encode($user->email) ?></td>
                        <td style="padding: 12px 16px;">
                            <span class="badge <?= $user->isAdmin() ? 'badge-gold' : 'badge-secondary' ?>">
                                <?= Html::encode($user->role) ?>
                            </span>
                        </td>
                        <td style="padding: 12px 16px; text-align: right;">
                            <?php if ((int)$user->id !== (int)Yii::$app->user->id): ?>
                                <?= Html::beginForm(['admin/user-role', 'id' => $user->id], 'post', ['style' => 'display: inline;']) ?>
                                    <button type="submit" class="btn btn-sm btn-outline">
                                        <?= $user->isAdmin() ? 'Сделать user' : 'Сделать admin' ?>
                                    </button>
                                <?= Html::endForm() ?>
                            <?php else: ?>
                                <span style="font-size: 12px; color: var(--color-text-tertiary);">Текущий аккаунт</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
