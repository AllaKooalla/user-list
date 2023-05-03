<?php
use shop\View;
/** @var $this View */
?>


<!doctype html>
	<html lang="en">
	<head>
        <base href="/">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?= PATH ?>/assets/css/main.css">
		<?= $this->getMeta(); ?>
	</head>
<body>

<header class="header">
<a href="/" class="logo">Список пользователей</a>
  <div class="header-right">
	<?php if(empty($_SESSION['user'])): ?>
		<a class="active" href="user/login">Авторизация</a>
	<?php else: ?>
		<a class="active" href="admin">Панель администратора</a>
		<a href="user/logout">Выход</a>
	<?php endif; ?>
  </div>
</header>