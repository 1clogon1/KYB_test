<?php
/* @var $this yii\web\View */
/* @var $user app\models\User */
/* @var $records app\models\Record[] */
/* @var $isAdmin bool */

use yii\helpers\Html;

$this->title = 'Дашборд';
?>

<h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

<h2>Ваша информация</h2>
<div class="card mb-4">
    <div class="card-body">
        <table class="table table-borderless">
            <tr>
                <th>Логин</th>
                <td><?= Html::encode($user->login) ?></td>
            </tr>
            <tr>
                <th>Роль</th>
                <td><?= Html::encode($user->role) ?></td>
            </tr>
            <tr>
                <th>Дата регистрации</th>
                <td><?= date('Y-m-d', $user->created_at) ?></td>
        </table>
    </div>
</div>

<?php if ($isAdmin): ?>
    <?php if ($isAdmin): ?>
        <p><?= Html::a('Добавить новую запись', ['site/add-record'], ['class' => 'btn btn-primary']) ?></p>
    <?php endif; ?>

    <h2>Список всех записей</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Название записи</th>
                <th>Описание</th>
                <th>Дата создания</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($records as $record): ?>
                <tr>
                    <td><?= Html::encode($record->id) ?></td>
                    <td><?= Html::encode($record->title) ?></td>
                    <td><?= Html::encode($record->description) ?></td>
                    <td><?= date('Y-m-d', $record->created_at) ?></td>
                    <td>
                        <?= Html::a('Редактировать', ['site/edit-record', 'id' => $record->id], ['class' => 'btn btn-warning btn-sm']) ?>
                        <?= Html::a('Удалить', ['site/delete-record', 'id' => $record->id], [
                            'class' => 'btn btn-danger btn-sm',
                            'data' => [
                                'confirm' => 'Вы уверены, что хотите удалить эту запись?',
                                'method' => 'post',
                            ]
                        ]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <h2>Список записей</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Название записи</th>
                <th>Описание</th>
                <th>Дата создания</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($records as $record): ?>
                <tr>
                    <td><?= Html::encode($record->id) ?></td>
                    <td><?= Html::encode($record->title) ?></td>
                    <td><?= Html::encode($record->description) ?></td>
                    <td><?= date('Y-m-d', $record->created_at) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>
