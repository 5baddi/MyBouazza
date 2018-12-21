<?php

    /*
     * @package 404 Error page
     * @subpackage MyBouazza
     * Developed by @5Baddi | baddi.info
     */

get_header(); ?>
    <div class="row">
	<div class="col-md-8 col-md-offset-2" style="margin:15px auto;">
            <h4 class="text-center"><i class="fa fa-warning"></i>&nbsp;<?= mybouazza_trs('عفوا ! صفحة غير موجودة'); ?></h4>
            <hr/>
            <div class="text-center">
                <?php get_search_form(); ?>
            </div>
	</div>
        <div class="col-md-8 col-md-offset- text-center">
            <ul class="list-inline">
                <li class="list-inline-item"><a href="<?= wp_get_referer(); ?>"><i class="fa fa-hand-o-right"></i>&nbsp;<?= mybouazza_trs('للخلف'); ?></a></li>
                <li class="list-inline-item text-muted">|</li>
                <li class="list-inline-item"><a href="<?= mybouazza_home(true); ?>"><i class="fa fa-home"></i>&nbsp;<?= mybouazza_trs('الرئيسية'); ?></a></li>
            </ul>
        </div>
    </div>
<?php get_footer(); ?>