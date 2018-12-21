<?php
    
    /*
     * @package Set theme admin social media page setting
     * @subpackage MyBouazza
     * Developed by @5Baddi | baddi.info
     */

     mybouzza_admin_alert('تم تحديث القائمة بنجاح.');
?>

<div class="wrap">
    <h1>مواقع التواصل الإجتماعي</h1>
    <div id="col-container" class="wp-clearfix">
        <div id="col-left">
            <div class="col-wrap">
                <div class="form-wrap">
                    <h2><?= mybouazza_trs('روابط الصفحات الإجتماعية'); ?></h2>
                    <form method="post" action="<?= admin_url('admin-post.php'); ?>" class="validate">
                        <input name="action" value="myb_save_socials" type="hidden"/>
                        <?php wp_nonce_field('myb_verify_socials'); ?>
                        <div class="form-field form-required term-name-wrap">
                            <label for="fb-name"><?= mybouazza_trs('فيس بوك'); ?></label>
                            <input name="myb-fb" id="fb-name" value="<?= $gets['facebook']; ?>" aria-required="true" type="text">
                            <p><?= mybouazza_trs('معرف الصفحة :'); ?>&nbsp;https://www.facebook.com/<strong>the5baddi</strong></p>
                        </div>
                        <div class="form-field form-required term-name-wrap">
                            <label for="tw-name"><?= mybouazza_trs('تويتر'); ?></label>
                            <input name="myb-twitter" id="tw-name" value="<?= $gets['twitter']; ?>" aria-required="true" type="text">
                            <p><?= mybouazza_trs('إسم المستخدم :'); ?>&nbsp;@<strong>5baddi</strong></p>
                        </div>
                        <div class="form-field form-required term-name-wrap">
                            <label for="gp-name"><?= mybouazza_trs('جوجل بلس'); ?></label>
                            <input name="myb-gplus" id="tw-name" value="<?= $gets['gplus']; ?>" aria-required="true" type="text">
                            <p><?= mybouazza_trs('رقم الحساب أو المعرف :'); ?>&nbsp;https://plus.google.com/+<strong>yourslug</strong></p>
                        </div>
                        <div class="form-field form-required term-name-wrap">
                            <label for="gp-name"><?= mybouazza_trs('يوتوب'); ?></label>
                            <input name="myb-youtube" id="tw-name" value="<?= $gets['youtube']; ?>" aria-required="true" type="text">
                            <p><?= mybouazza_trs('معرف القناة :'); ?>&nbsp;https://www.youtube.com/channel/<strong>yourslug</strong></p>
                        </div>
                        <p class="submit">
                            <button type="submit" name="submit" class="button button-primary"><?= mybouazza_trs('تحديث القائمة'); ?></button>
                        </p>
                    </form>
                </div>
            </div>
            <div class="form-wrap edit-term-notes">
                <p><?= mybouazza_trs('يمكنك ترك الحقول الغير مرغوب فيها فارغة.'); ?></p>
            </div>
        </div>
    </div>
</div>