<?php

    /*
     * @package Customiser for template
     * @subpackage MyBouazza
     * Developed by @5Baddi | baddi.info
     */

/*
 * Theme setup
 */
function mybouazza_setup(){
    // Add post thumbnails
    add_theme_support('post-thumbnails', array('post'));
    // Add Custom logo
    add_theme_support('custom-logo', array(
        'height'        => 40,
        'width'         => 40,
    ));
    // Add HTML 5 Markup
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list'));
    // Add Theme support for Translation
    load_theme_textdomain('mybouazza', mybouazza_root('lang'));
}