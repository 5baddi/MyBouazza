<?php
    
    /*
     * @package Set theme admin page home
     * @subpackage MyBouazza
     * Developed by @5Baddi | baddi.info
     */

?>

<div class="wrap">
    <h1><?= mybouazza_trs('مولاي بوعزة'); ?></h1>
    <div class="welcome-panel">
        <div class="welcome-panel-content">
            <h2><?= mybouazza_trs('شكر خاص لك'); ?>&nbsp;<i class="fa fa-hand-o-left"></i></h2>
            <p>
                يتقدم لك موقع <a href="http://baddi.info"></a> لخدمات تصميم و تطوير مواقع الويب بخالص الشكر والتقدير لك، لإستعمال أحد منتجاتنا.<br/>
                ونتمنى أن تلقى إعجابك وتفي بمتطلباتك، ولاتنسى أنك ستحصل على بعض التحديثات بشكل مجاني مما يتيح لك الإستعمال الدائم لمنتجاتنا المتجددة.
            </p>
            <div class="welcome-panel-column-container">
                <div class="welcome-panel-column">
                    <h3><?= mybouazza_trs('إليك '); ?>&hellip;</h3>
                    <a href="<?= $myTheme->get('ThemeURI'); ?>" class="button button-primary button-hero" target="_blank"><i class="fa fa-refresh"></i>&nbsp;<?= mybouazza_trs('آخر تحديث'); ?></a>
                    <p class="hide-if-no-customize">
                        <?= mybouazza_trs('أو، '); ?><a href="http://baddi.info/store" target="_blank"><?= mybouazza_trs('تصفح المتجر'); ?></a>
                    </p>
                </div>
                <div class="welcome-panel-column">
                    <h3><?= mybouazza_trs('المزيد '); ?>&hellip;</h3>
                    <ul>
                        <li><a href="http://baddi.info/mybouazza#howto" target="_blank" class="welcome-icon dashicons-welcome-learn-more"><?= mybouazza_trs('معلومات عن كيفية التركيب'); ?></a></li>
                        <li><a href="http://baddi.info/store/plugins" target="_blank" class="welcome-icon dashicons-admin-plugins"><?= mybouazza_trs('إضافات جديدة'); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
      </div>
</div>