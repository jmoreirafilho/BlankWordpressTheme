<?php
/**
 * Blank Wordpress Theme
 *
 **/

/* Enqueue stylesheets and scripts */
function blank_scripts () {
    // enfileira arquivos CSS
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/includes/font-awesome/css/font-awesome.min.css', array(), '1.0', false);
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/scripts/css/bootstrap.min.css', array(), '3.3.2', false);
    wp_enqueue_style('style', get_stylesheet_uri());

    // enfileira arquivos JS
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/scripts/js/jquery.min.js', array(), '2.1.4', true);
    wp_enqueue_script('angular', get_template_directory_uri() . '/scripts/js/angular.min.js', array(), '1.0', true);
    wp_enqueue_script('bootstrapJs', get_template_directory_uri() . '/scripts/js/bootstrap.min.js', array(), '3.3.2', true);
    wp_enqueue_script('jquery_mask_plugin', get_template_directory_uri() . '/scripts/js/jquery_mask_plugin.min.js', array(), '1.0', true);
    wp_enqueue_script('theme_angular_scripts', get_template_directory_uri() . '/scripts/js/theme_angular_scripts.js', array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'blank_scripts');

/* Remove Posts from admin menu */
function customize_menu () {
    remove_menu_page('edit.php');
    remove_menu_page('edit-comments.php');
}

add_action('admin_menu', 'customize_menu'); 

/* Turn-off feeds */
remove_action('do_feed_rdf', 'do_feed_rdf', 10, 1);
remove_action('do_feed_rss', 'do_feed_rss', 10, 1);
remove_action('do_feed_rss2', 'do_feed_rss2', 10, 1);
remove_action('do_feed_atom', 'do_feed_atom', 10, 1);

/* Remove user bar */
$blogusers = get_users();
foreach ($blogusers as $user) {
    update_user_meta( $user->ID, 'show_admin_bar_front', 'false' );
}

/* Remove meta tag generator */
remove_action('wp_head', 'wp_generator');

/* Create Menus */
register_nav_menus(array(
    'main-menu' => __('Menu Principal'),
));

/* Allow use of custom single.php based on category */
add_filter('single_template', create_function('$t', 'foreach( (array) get_the_category() as $cat ) { if ( file_exists(TEMPLATEPATH . "/single-{$cat->term_id}.php") ) return TEMPLATEPATH . "/single-{$cat->term_id}.php"; } return $t;' ));

/**
* Redirects user to initial page after login
**/
function my_login_redirect( $redirect_to, $request, $user ) {
    global $user;
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {
        if ( in_array( 'administrator', $user->roles ) ) {
            return $redirect_to;
        } else {
            return home_url();
        }
    } else {
        return $redirect_to;
    }
}
add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );
?>
