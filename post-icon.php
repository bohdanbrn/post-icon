<?php
/*
Plugin Name: Post icon
Description: Додає іконку в кінець заголовків вказаних в панелі адміністрування постів
Author URI: https://www.facebook.com/profile.php?id=100003936097779
Version: 1.0
*/

//створення підменю для розділу "Settings"
add_action('admin_menu', 'post_icon_submenu');
function post_icon_submenu() {
    add_submenu_page(
        'options-general.php',                  //parent_slug
        'Settings Post icon',                   //page_title
        'Post icon',                            //menu_title
        'edit_dashboard',                       //capability
        'post-icon',                            //menu_slug
        'render_post_icon_settings_page'        //function
    );
}

//підключення html - форми, через яку здійснюється управління плагіном
function render_post_icon_settings_page() {
    require_once 'settings.php';
}

//зміна виведення заголовку поста
add_filter('the_title', 'post_icon');
function post_icon($title) {
    $posts_id = get_option('posts_id');
	$icon_class = get_option('icon_class');
	$active = get_option('active');
	$icon_position = get_option('icon_position');

    //якщо чекбокс активний
    if ($active == "on") {
        global $post;
        
        //перетворення рядка у масив
        $posts_id = explode(",", $posts_id );
        
        //пошук поточного ідентифікатора в масиві ідентифікаторів плагіну
        $key = array_search($post->ID, $posts_id);
        
        //якщо в масиві ідентифікаторів є ID поточного поста
        if ( $key !== false ) {
            //вивід іконки
            $icon = '<span class="' . $icon_class . '"></span>';
            //вивід іконки у правильній стороні в залежності від значення поля "Position"
            return ($icon_position == "Left") ? ($icon . $title) : ($title . $icon);
        }
        //якщо немає
        else {
            //виводимо звичайний заголовок
            return $title;
        }
    }
}