<html <?php language_attributes(); ?> ng-app="view">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<?php
	$args = array(
	        'theme_location'  => 'main-menu',
	        'container'       => 'div',
	        'container_class' => 'menu-items',
	        'items_wrap'      => '<ul class="list-inline">%3$s</ul>',
	);
?>