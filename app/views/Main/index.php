

<!-- этот див в админку -->

 <!-- <div class="topic">
  <input type="text" id="myInput" placeholder="Продукт...">
  <button id="push" class="addBtn">Добавить</button>
</div> -->


<ul>
<?php if (!empty($tasks)): ?>
    <?php foreach ($tasks as $task): ?>
  <li><?= $task['task'] ?> ( <?= $task['status'] ?> )</li>
  <?php endforeach; ?>
<?php endif; ?>
</ul>