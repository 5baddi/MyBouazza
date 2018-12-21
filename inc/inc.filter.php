<?php
    
    /*
     * @package Filters functions
     * @subpackage MyBouazza
     * Developed by @5Baddi | baddi.info
     */

// Hide admin menu bar
function mybouazza_admin_bar(){
    return false;
}
add_filter('show_admin_bar', 'mybouazza_admin_bar');

/*
 * Move comment field to bottom
 */
function mybouazza_comment_field($fields){
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter('comment_form_fields', 'mybouazza_comment_field');


/*
 *  The post excerpt filter
 */

// Change the excerpt more to ...
function mybouazza_excerpt_more($more){
    return '&hellip;';
}
add_filter('excerpt_more', 'mybouazza_excerpt_more');