<?php
    
    /*
     * @package Functions
     * @subpackage MyBouazza
     * Developed by @5Baddi | baddi.info
     */

/*
 * Assets folder & files
 */
function mybouazza_assets($dir = ''){
    // the template directory
    $folder = get_template_directory_uri().'/assets/';
    if(!empty($dir)){
        $folder .= $dir;
    }
    return $folder;
}

/*
 * Theme root folder
 */
function mybouazza_root($dir = ''){
    // the theme root directory
    $folder = get_template_directory_uri().'/';
    if(!empty($dir)){
        $folder .= $dir;
    }
    return $folder;
}

/*
 * Include Registers & Filters & Others
 */
require_once 'inc/inc.register.php';
require_once 'inc/inc.filter.php';
require_once 'inc/bs4navwalker.php';
require_once 'customit/customiser.php';
require_once 'inc/admin/use.php';
require_once 'customit/addon.theme.php';


/*
 * Page Title
 */
function mybouazza_title($sep = '|'){
    $title = get_bloginfo('name').' '.$sep.' ';
    if(is_home()){
        $title .= get_bloginfo('description');
    }else{
        $title .= get_the_title();
    }
    echo $title;
}

/*
 * Load site favicon
 */
function mybouazza_fav(){
    if(!has_site_icon() && !is_customize_preview()){
        echo '<link rel="icon" href="'.mybouazza_assets('favicon.png').'"/>';
    }
}

/*
 * Enqueue styles & scripts
 */
function mybouazza_scripts(){
    // Normalize Css
    wp_enqueue_style('mb-normalize', mybouazza_assets('css/normalize.css'));
    // Theme Bootstrap style
    wp_enqueue_style('mb-bootstrap', mybouazza_assets('css/bootstrap.min.css'));
    // Theme Stylesheet
    wp_enqueue_style('mb-style', get_stylesheet_uri());
    // Theme RTL Stylesheet
    wp_style_add_data('mb-style', 'rtl', 'replace');
    // IE Conditions
    mybouazza_ShivRes();
    // WP JQuery
    mybouazza_jquery();
    // Theme Bootstrap script
    wp_enqueue_script('mb-bootstrap-tether', mybouazza_assets('js/tether.min.js'), '', false, true);
    wp_enqueue_script('mb-bootstrap-script', mybouazza_assets('js/bootstrap.min.js'), '', false, true);
    // Theme JS & JQuery script
    wp_enqueue_script('mb-custom-script', mybouazza_assets('js/custom-script.js'), '', false, true);
}

// HTML 5 Shiv & Respond
function mybouazza_ShivRes(){
    // HTML 5 Shiv
    wp_enqueue_script('mb-shiv', mybouazza_assets('js/html5shiv.min.js'), '', false, true);
    // Respond js
    wp_enqueue_script('mb-respond', mybouazza_assets('js/respond.js'), '', false, true);
    // Add script shiv & respond conditions
    wp_script_add_data('mb-shiv', 'conditional', 'lt IE 9');
    wp_script_add_data('mb-respond', 'conditional', 'lt IE 9');
    
}

/*
 * Translate text
 */
function mybouazza_trs($text){
    if(!empty($text)){
        return __($text, 'mybouazza');
    }
}

/*
 * Home page html tag direct link
 * return Direct link or link tag
 */
function mybouazza_home($direct = true){
    if(!$direct){
        return '<a href="'.esc_url(home_url('/')).'">'.get_bloginfo('name').'</a>';
    }else{
        return esc_url(home_url('/'));
    }
}

/*
 * Go to link
 */
function mybouazza_to($link){
    if(!empty($link)){
        return esc_url($link);
    }
}

/*
 * Home link
 */
function mybouazza_home_link(){
    $page = (get_query_var('page')) ? get_query_var('page') : 1;
    $page = '?page='.++$page;
    return esc_url(home_url('/').$page);
}

/*
 * Category link
 */
function mybouazza_cat_link(){
    $page = (get_query_var('page')) ? get_query_var('page') : 1;
    $page = '?page='.++$page;
    return esc_url(get_category_link(single_cat_title('', false)).$page);
}

/*
 * Search link
 */
function mybouazza_search_link(){
    $page = (get_query_var('page')) ? get_query_var('page') : 1;
    $page = '?page='.++$page;
    return esc_url(get_search_link().$page);
}

/*
 *  Substr text & title
 *  !using the excerpt not function good on multiszie paragraphes
 */
function mybouazza_substr($txt, $size, $end = null){
    if(!empty($txt)):
        return mb_substr(strip_tags($txt), 0, $size, "utf-8").$end;
    endif;
}

/*
 * Check exsits Category
 */
function mybouazza_category_exists( $cat_name, $parent = null ) {
    // By WP
    $id = term_exists($cat_name, 'category', $parent);
    if ( is_array($id) )
        $id = $id['term_id'];
    return $id;
}

/*
 * Custom nav menu
 */
function mybouazza_nav_menu(){ // Top menu
    if(has_nav_menu('top-menu')){
        echo '<div class="collapse navbar-collapse" id="topNav">';
        wp_nav_menu(array(
           'theme_location'     => 'top-menu',
           'container_class'    => 'collapse navbar-collapse',
           'menu_class'         => 'nav navbar-nav',
           'depth'              => 2,
           'walker'             => new wp_bootstrap4_navwalker()
        ));
        echo '</div>';
    }
}

/*
 * Share links
 * return share link of social media selected
 */
function mybouazza_share_post($social_media){
    if(!empty($social_media)):
        $post = get_permalink();
        switch($social_media):
            case 'facebook':
                    $link = 'https://www.facebook.com/sharer/sharer.php?app_id=113869198637480&kid_directed_site=0&sdk=joey&u=';
                break;
            case 'twitter':
                    $link = 'https://twitter.com/home?status=';
                break;
            case 'gplus':
                    $link = 'https://plus.google.com/share?url=';
                break;
        endswitch;
        return $link.$post;
    endif;
    return; // null
}

/*
 * Logo
 * return logo or custom logo
 */
function mybouazza_get_logo(){
    if(!has_custom_logo() && !is_customize_preview()){
        return '<img src="'. mybouazza_assets('img/logo.svg').'" width="30" height="30" alt="'.get_bloginfo('name').'">';
    }
}

/*
 * Admin page error alert
 */
function mybouzza_admin_alert($msg){
    $status = intval($_GET['status']);
    if(isset($status) && !empty($status)):
        if($status == 1):
            echo '<div class="updated"><p>'.mybouazza_trs($msg).'</p></div>';
        else:
            echo '<div class="update-nag"><p>'.mybouazza_trs('حدث خطأ! أعد المحاولة محددا ').'&hellip;</p></div>';
        endif;
    endif;
}

/*
 * Action's & Hook's
 */
// Theme setup & support
add_action('after_setup_theme', 'mybouazza_setup');
// Add title tag
add_theme_support('title-tag');
// Enqueue Styles & Scripts
add_action('wp_enqueue_scripts', 'mybouazza_scripts');
// Show Site favicon
add_action('wp_head', 'mybouazza_fav');
// Add Admin theme page
add_action('admin_menu', 'mybouazza_admin_menu');
// Add Nav Menus
add_action('init', 'mybouazza_menus');
// Admin Intialize
add_action('admin_init', 'mybouazza_admin_init');
// SideBar
add_action('widgets_init', 'mybouazza_footer_sidebar');
