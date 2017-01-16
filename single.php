<?php get_header(); ?>
<?php require('includes/menu.php'); ?>

<?php 
	while(have_posts()){
		the_post();
		the_content();
	}
 ?>

<?php get_footer(); ?>
