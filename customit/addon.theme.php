<?php
    
    /*
     * @package Additional theme functions & options
     * @subpackage MyBouazza
     * Developed by @5Baddi | baddi.info
     */



/*
 * Social media links - header
 * You can add more using admin/use & admin/social & this function to print the result with font-awesome icons
 */
function mybouazza_header_social_link(){
    // Get & put the social media link form MyBouazza Dashboard DB
    $gets = get_option('myb-up-social');
    
    $link = array(
        'facebook'    =>  'https://www.facebook.com/'.$gets['facebook'],
        'twitter'     =>  'https://www.twitter.com/'.$gets['twitter'],
        'gplus'       =>  'https://plus.google.com/+'.$gets['gplus'],
        'youtube'     =>  'https://www.youtube.com/channel/'.$gets['youtube']
    );
    
    
    echo '<ul>';
    echo !empty($gets['facebook']) ? '<li><a href="'.$link['facebook'].'" target="_blank"><i class="fa fa-facebook-square"></i></a><li>' : '';
    echo !empty($gets['twitter']) ? '<li><a href="'.$link['twitter'].'" target="_blank"><i class="fa fa-twitter-square"></i></a><li>' : '';
    echo !empty($gets['youtube']) ? '<li><a href="'.$link['youtube'].'" target="_blank"><i class="fa fa-youtube-square"></i></a><li>' : '';
    echo !empty($gets['gplus']) ? '<li><a href="'.$link['gplus'].'" target="_blank"><i class="fa fa-google-plus-square"></i></a><li>' : '';
    echo '</ul>';
}

/*
 * Top ads for home page
 */
function mybouazza_topads(){
    get_template_part('home/ads');
}