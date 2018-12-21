<?php
    
    /*
     * @package Top ads for home page
     * @subpackage MyBouazza
     * Developed by @5Baddi | baddi.info
     */

     $pageAds = (is_home()) ? 'home' : 'single';
?>

    <div class="row">
        <aside class="this text-center">
<?php
     $gets = get_option('myb-up-ads');
     if($gets[$pageAds.'_active'] == 1 && !empty($gets[$pageAds.'_script'])):
        echo stripslashes_deep($gets[$pageAds.'_script']);
     else:
?>
        <p><i class="fa fa-bar-chart-o"></i>&nbsp;<?= mybouazza_trs('إعلانك هنا'); ?>&nbsp;<i class="fa fa-cart-plus"></i></p>
<?php endif; ?>
            </aside>
    </div>