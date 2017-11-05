<?php
    
    /*
     * @package Header
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
        <!--<div class="preload">
            <div class="loader"></div>
        </div>-->
	<nav class="navbar fixed-top navbar-toggleable-md navbar-light navbar-t">
            <button class="navbar-toggler navbar-toggler-left" type="button" data-toggle="collapse" data-target="#topNav" aria-controls="myNavbar" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="<?= mybouazza_home(); ?>">
                <?= mybouazza_get_logo(); ?>
                <?= mybouazza_trs(get_bloginfo('name')); ?>
            </a>
            <?php mybouazza_nav_menu(); ?>
        </nav>
	<header class="container-fluid cover">
		<div class="intro">
                    <h1><?php bloginfo('name'); ?></h1>
                    <span><?php bloginfo('description'); ?></span>
                    <?php mybouazza_header_social_link(); ?>
		</div>
	</header>
	<div id="wrapper" class="container">
