
<!-- Default box -->
<div class="card">
    <div class="card-header">

        <a href="<?= ADMIN ?>/task/add" class="btn btn-default btn-flat"><i class="fas fa-plus"></i>Добавить пользователя</a>

    </div>

</div>
<div class="card-body">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Пользователи</th>
                <th>Статус</th>
                <th style="width: 20px">Удалить</th>
            </tr>
        </thead>
        <tbody>

            <?php if (!empty($tasks)): ?>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= $task['task'] ?></td>
                        <td><?= $task['status'] ?></td>
                        <td><?= '<a class="btn btn-danger btn-sm delete" href="' . ADMIN . '/task/delete?id=' . $task->id . '"><i class="far fa-trash-alt"></i></a>' ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>

        </tbody>
    </table>
</div>

</div>
<!-- /.card -->