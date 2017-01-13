<div class="navigation">
	<div class="col-md-1 icon">
		<a href="<?php echo admin_url(); ?>" target="_blank"><i class="fa fa-wordpress"></i></a>
	</div>
	<div class="col-md-10 menu">
		<?php wp_nav_menu($args); ?>
	</div>
	<div class="col-md-1 icon">
		<a href="<?php echo wp_logout_url(); ?>"><i class="fa fa-sign-out"></i></a>
	</div>
</div>