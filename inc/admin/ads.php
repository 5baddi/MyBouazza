<?php
    
    /*
     * @package Ads setting admin page
     * @subpackage MyBouazza
     * Developed by @5Baddi | baddi.info
     */

    mybouzza_admin_alert('تم تحديث الإعدادات بنجاح.');
?>

<div class="wrap">
    <h1><?= mybouazza_trs('إعدادات الإعلانات'); ?></h1>
    <div id="col-container" class="wp-clearfix">
        <div id="col-left">
            <div class="col-wrap">
                <div class="form-wrap">
                    <hr/>
                    <form method="post" action="<?= admin_url('admin-post.php'); ?>" class="validate">
                        <input name="action" value="myb_save_ads" type="hidden"/>
                        <?php wp_nonce_field('myb_verify_ads'); ?>
                        <div class="form-field form-required term-name-wrap">
                            <label for="home-script"><?= mybouazza_trs('كود إعلان الصفحة الرئيسية'); ?></label>
                            <textarea name="myb-ads-home-script" style="text-align:left !important;direction:ltr !important;"rows="5" id="home-script" aria-required="true"><?= $gets['home_script']; ?></textarea>
                            <p><?= mybouazza_trs('يفضل أن يكون إعلان متجاوب ، أو بمقياس 720x90 '); ?>&hellip;</p>
                        </div>
                        <div class="form-field form-required term-name-wrap">
                            <label for="home-ads"><?= mybouazza_trs('تفعيل عرض الإعلان'); ?></label>
                            <select name="myb-ads-home-active" id="home-ads" aria-required="true">
                                <option value="0"><?= mybouazza_trs('لا'); ?></option>
                                <option value="1" <?= $gets['home_active'] == 1 ? 'selected' : ''; ?>><?= mybouazza_trs('نعم'); ?></option>
                            </select>
                        </div>
                        <hr/>
                        <p class="submit">
                            <button type="submit" name="submit" class="button button-primary"><?= mybouazza_trs('تحديث الإعدادات'); ?></button>
                        </p>
                </div>
            </div>
            <div class="form-wrap edit-term-notes">
                <p><?= mybouazza_trs('يمكنك ترك الحقول الغير مرغوب فيها فارغة.'); ?></p>
            </div>
        </div>
        <div id="col-left">
            <div class="col-wrap">
                <div class="form-wrap">
                        <div class="form-field form-required term-name-wrap">
                            <label for="single-script"><?= mybouazza_trs('كود إعلان صفحة المقال'); ?></label>
                            <textarea name="myb-ads-single-script" style="text-align:left !important;direction:ltr !important;"rows="5" id="single-script" aria-required="true"><?= $gets['single_script']; ?></textarea>
                            <p><?= mybouazza_trs('يفضل أن يكون إعلان متجاوب ، أو بمقياس 720x90 '); ?>&hellip;</p>
                        </div>
                        <div class="form-field form-required term-name-wrap">
                            <label for="single-ads"><?= mybouazza_trs('تفعيل عرض الإعلان'); ?></label>
                            <select name="myb-ads-single-active" id="single-ads" aria-required="true">
                                <option value="0"><?= mybouazza_trs('لا'); ?></option>
                                <option value="1" <?= $gets['single_active'] == 1 ? 'selected' : ''; ?>><?= mybouazza_trs('نعم'); ?></option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>