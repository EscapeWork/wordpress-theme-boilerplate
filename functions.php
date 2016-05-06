<?php 
/*
|--------------------------------------------------------------------------
| Wordpress theme > functions.php
|--------------------------------------------------------------------------
*/

# suporte para thumbnails
add_theme_support('post-thumbnails', array('post', 'page'));

# sidebar
register_sidebar(array(
    'name'          => __('Sidebar - Geral', 'theme_sidebar_default'),
    'id'            => 'theme-sidebar-default',
    'before_widget' => '<div id="%1$s" class="sidebar-box widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="sidebar-title">',
    'after_title'   => '</h2>'
));

# menus
register_nav_menus(array(
    'primary' => __('Menu principal', 'produtividade'),
));

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="btn btn-primary"';
}

function post_featured_image($size)
{
    $thumb_id        = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, $size, true);
    return $thumb_url_array[0];
}

function post_category_name()
{
    $category = get_the_category();

    if ($category[0]->cat_name == 'Destaque') {
        return $category[1]->cat_name;
    }

    return $category[0]->cat_name;;
}