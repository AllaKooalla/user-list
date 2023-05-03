<?php
use shop\View;

/** @var $this View */
?>

<?php $this->getPart('parts/header'); ?>


<!-- -------------------------------------- -->


<?php if (!empty($_SESSION['errors'])): ?>
    <?php echo $_SESSION['errors']; unset($_SESSION['errors']); ?>
<?php endif; ?>

<?php if (!empty($_SESSION['success'])): ?>
    <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
<?php endif; ?>

<?php echo $this->content; ?>


<!-- -------------------------------------- -->


<?php $this->getPart('parts/footer'); ?>