<?php
use yii\helpers\Html;
?>

<!-- begin admin-header -->
<div class="clearfix admin-header J-admin-header">

	<?php if($brand) { ?>
	<div class="brand">
		<?= $brand ?>
	</div>
	<? } ?>

	<?php if($mainMenu) { ?>
	<!-- begin admin-menu -->
	<div class="menu">
		<?= $mainMenu ?>
	</div>
	<!-- end admin-menu -->
	<? } ?>

</div>
<!-- end admin-header -->

<?php if($sidebar) { ?>
<!-- begin admin-sidebar -->
<div class="admin-sidebar J-admin-sidebar">
	<div class="sidebar-scroller">
		<div class="sidebar-control"><?= Html::tag('i', null, ['class' => 'glyphicon glyphicon-align-justify']) ?></div>
		<?= $sidebar ?>
	</div>
</div>
<!-- end admin-sidebar -->
<? } ?>

<!-- begin admin-body -->
<div class="admin-body">
	<?= $content ?>
</div>
<!-- end admin-body -->

<!-- begin admin-footer -->
<!-- <div class="admin-footer"></div> -->
<!-- end admin-footer -->
