<?php

    /*
     * @package Header
     * @subpackage MyBouazza
     * Developed by @5Baddi | baddi.info
     */
?>
        </div>
    	<footer class="container">
        <?php  
            if(is_active_sidebar('myb_footer_sidebar')):
        ?>
            <div class="row footerSidebar">
                <ul class="col-12 list-inline footerWidgets">
                    <?php dynamic_sidebar('myb_footer_sidebar'); ?>
                </ul>
            </div>
        <?php
            endif;
        ?>
            <div class="row">
            	<p class="col-md-12">&copy; <?= mybouazza_trs('جميع الحقوق محفوظة '); ?>2015-<?= date("Y"); ?></p>
            </div>
        </footer>
<?php wp_footer(); ?>
    </body>
</html>