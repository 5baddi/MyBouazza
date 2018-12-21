<?php
    
    /*
     * @package Set theme admin page active
     * @subpackage MyBouazza
     * Developed by @5Baddi | baddi.info
     */

/*
 * Admin page menu
 */
function mybouazza_admin_menu(){
    // Add theme menu to admin page
    add_menu_page(mybouazza_trs('مولاي بوعزة'), mybouazza_trs('مولاي بوعزة'), 'edit_theme_options', 'myb', 'mybouazza_admin_page', 'dashicons-sos', 70);
    // Add theme submenu to admin page
    add_submenu_page('myb', mybouazza_trs('خدمات بادّي'), mybouazza_trs('خدمات بادّي'), 'edit_theme_options', 'myb_options', 'mybouazza_admin_page');  
    // Remove Parent menu from submenu list
    remove_submenu_page('myb', 'myb');
    // Add second submenu to admin - Socail media page
    add_submenu_page('myb', mybouazza_trs('المواقع الإجتماعية'), mybouazza_trs('المواقع الإجتماعية'), 'edit_theme_options', 'myb_social', 'mybouazza_admin_social_page');
    // Add Post setting admin page
    add_submenu_page('myb', mybouazza_trs('عرض المقالات'), mybouazza_trs('عرض المقالات'), 'edit_theme_options', 'myb_posts', 'mybouazza_admin_posts_page');
    // Add Ads admin page
    add_submenu_page('myb', mybouazza_trs('الإعلانات'), mybouazza_trs('الإعلانات'), 'edit_theme_options', 'myb_ads', 'mybouazza_admin_ads_page');
}

/*
 * Enqueue Styles & Scripts 
 */
function mybouazza_admin_init(){
    $page = filter_var(strip_tags($_GET['page']), FILTER_SANITIZE_STRING);
    if(!isset($page) || substr($page, 0, 3) == 'myb'):
        return;
    endif;
    wp_enqueue_style('mb-icon-admin', mybouazza_assets('css/font-awesome.min.css'));
    // Save social admin page data
    add_action('admin_post_myb_save_socials', 'myb_save_social');
    // Save posts settings admin page
    add_action('admin_post_myb_save_posts', 'myb_save_posts');
    // Save Ads setting admin page
    add_action('admin_post_myb_save_ads', 'myb_save_ads');
}

// Get admin page content
function mybouazza_admin_page(){
    $myTheme = wp_get_theme();
    require_once 'home.php';
}
// Get admin social media page setting
function mybouazza_admin_social_page(){
    $gets = get_option('myb-up-social');
    require_once 'social.php';
}

// Save social admin page data
function myb_save_social(){
    // Check user capabiltity
   if(!current_user_can('edit_theme_options')){
       return;
   }
   
   check_admin_referer('myb_verify_socials');
   
   // Get the post data
   $social = get_option('myb-up-social');
   $social['facebook'] = sanitize_text_field($_POST['myb-fb']);
   $social['twitter'] = sanitize_text_field($_POST['myb-twitter']);
   $social['gplus'] = sanitize_text_field($_POST['myb-gplus']);
   $social['youtube'] = sanitize_text_field($_POST['myb-youtube']);
   
   // Put to the DB
   $status = 0;
   if(update_option('myb-up-social', $social)) : $status = 1; endif;
   
   // Finally Redirect to main social page
   wp_redirect(admin_url('admin.php?page=myb_social&status='.$status));
}

/*
 * Posts setting page
 */
function mybouazza_admin_posts_page(){
    $gets = get_option('myb-up-posts');
    require_once 'posts.php';
}
// Save posts settings
function myb_save_posts(){
    // Check user capabiltity
    if(!current_user_can('edit_theme_options')){
        return;
    }
    
    check_admin_referer('myb_verify_posts');
    
    // Get the post data
    $posts = get_option('myb-up-posts');
    $posts['cat_perpage'] = absint($_POST['myb-cat-page']) ? absint($_POST['myb-cat-page']) : 20;
    $posts['cat_order'] = sanitize_text_field($_POST['myb-cat-order']) === 'asc' ? 'ASC' : 'DESC';
    $posts['cat_home'] = sanitize_textarea_field($_POST['myb-cats-home']);
    
    // Put to the DB
   $status = 0;
   if(update_option('myb-up-posts', $posts)) : $status = 1; endif;
   
   // Finally Redirect to main posts setting page
   wp_redirect(admin_url('admin.php?page=myb_posts&status='.$status));
}

/*
 * Ads page
 */
function mybouazza_admin_ads_page(){
    $gets = get_option('myb-up-ads');
    require_once 'ads.php';
}
function myb_save_ads(){
    // Check user capabiltity
    if(!current_user_can('edit_theme_options')){
        return;
    }
    
    check_admin_referer('myb_verify_ads');
    
    // Get the post data
    $ads = get_option('myb-up-ads');
    // Home ads
    $ads['home_script'] = $_POST['myb-ads-home-script'];
    $ads['home_active'] = absint($_POST['myb-ads-home-active']);
    // Single ads
    $ads['single_script'] = $_POST['myb-ads-single-script'];
    $ads['single_active'] = absint($_POST['myb-ads-single-active']);
    
    
    // Put to the DB
   $status = 0;
   if(update_option('myb-up-ads', $ads)) : $status = 1; endif;
   
   // Finally Redirect to main posts setting page
   wp_redirect(admin_url('admin.php?page=myb_ads&status='.$status));
}