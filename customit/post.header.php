<?php
    
    /*
     * @package Post Header
     * @subpackage MyBouazza
     * Developed by @5Baddi | baddi.info
     */

?>
<!DOCTYPE>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php wp_head(); ?>
    </head>
    <body>
        <div class="preload">
            <div class="loader"></div>
        </div>
	<nav class="navbar fixed-top navbar-toggleable-md navbar-light navbar-t">
            <button class="navbar-toggler navbar-toggler-left" type="button" data-toggle="collapse" data-target="#topNav" aria-controls="myNavbar" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="<?= mybouazza_home(); ?>">
                <?= mybouazza_get_logo(); ?>
                <?php bloginfo('name'); ?>
            </a>
            <?php mybouazza_nav_menu(); ?>
        </nav>
        <header class="container-fluid cover" <?php if(has_post_thumbnail()){echo 'style="background-image:url(\''.get_the_post_thumbnail_url().'\');"';}?>>
		<div class="intro">
                    <h1><?php the_title(); ?></h1>
                    <span>شارك على :</span>
                    <ul>
                        <li><a href="<?= mybouazza_share_post('facebook'); ?>"><i class="fa fa-facebook-square"></i></a><li>
			<li><a href="<?= mybouazza_share_post('twitter'); ?>"><i class="fa fa-twitter-square"></i></a><li>
                        <li><a href="<?= mybouazza_share_post('gplus'); ?>"><i class="fa fa-google-plus-square"></i></a><li>
                    </ul>
		</div>
	</header>
	<div id="wrapper" class="container">
