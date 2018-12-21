<?php
    
    /*
     * @package Posts show setting admin page
     * @subpackage MyBouazza
     * Developed by @5Baddi | baddi.info
     */

    mybouzza_admin_alert('تم تحديث الإعدادات بنجاح.');
?>

<div class="wrap">
    <h1><?= mybouazza_trs('إعدادات عرض المقالات'); ?></h1>
    <div id="col-container" class="wp-clearfix">
        <div id="col-left">
            <div class="col-wrap">
                <div class="form-wrap">
                    <hr/>
                    <form method="post" action="<?= admin_url('admin-post.php'); ?>" class="validate">
                        <input name="action" value="myb_save_posts" type="hidden"/>
                        <?php wp_nonce_field('myb_verify_posts'); ?>
                        <div class="form-field form-required term-name-wrap">
                            <label for="post-cats"><?= mybouazza_trs('التصنيفات المميزة'); ?></label>
                            <textarea name="myb-cats-home" id="post-cats" aria-required="true"><?= $gets['cat_home']; ?></textarea>
                            <p><?= mybouazza_trs('ضع فاصلة , بعد كل تصنيف '); ?>&hellip;</p>
                        </div>
                        <div class="form-field form-required term-name-wrap">
                            <label for="post-cat"><?= mybouazza_trs('عدد المقالات'); ?></label>
                            <input name="myb-cat-page" id="post-cat" value="<?= $gets['cat_perpage']; ?>" aria-required="true" type="number">
                            <p><?= mybouazza_trs('العدد الإفتراضي 20 مقال بالصفحة'); ?>&hellip;</p>
                        </div>
                        <div class="form-field form-required term-name-wrap">
                            <label for="order-cat"><?= mybouazza_trs('ترتيب المقالات'); ?></label>
                            <select name="myb-cat-order" id="order-cat" aria-required="true">
                                <option value="desc"><?= mybouazza_trs('تنازلي - من الأحدث للأقدم'); ?></option>
                                <option value="asc" <?= $gets['cat_order'] === 'ASC' ? 'selected' : ''; ?>><?= mybouazza_trs('تصاعدي - من الأقدم للأحدث'); ?></option>
                            </select>
                            <p><?= mybouazza_trs('يفضل الترتيب التنازلي '); ?>&hellip;</p>
                        </div>
                        <p class="submit">
                            <button type="submit" name="submit" class="button button-primary"><?= mybouazza_trs('تحديث الإعدادات'); ?></button>
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