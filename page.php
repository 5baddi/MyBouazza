<?php
    
    /*
     * @package Page template
     * @subpackage MyBouazza
     * Developed by @5Baddi | baddi.info
     */
     if(is_page()):
         $page = get_post();
        get_template_part('customit/post.header');
?>
    <div class="row">
        <section class="col-md-10 post">
            <?php edit_post_link(mybouazza_trs('تحرير الصفحة'), '<span class="btn mybtn"><i class="fa fa-edit"></i>&nbsp;', '</span>', '', 'mybtn-edit'); ?>
            <article>
                <?= $page->post_content; ?>
                <hr/>
                <small class="text-muted"><i class="fa fa-calendar"></i>&nbsp;<?= get_the_date('l j F Y'); ?>&nbsp;<i class="fa fa-clock-o"></i>&nbsp;<?php the_time('g:i A'); ?></small>		
            </article>
        </section>
    </div>
<?php 
    endif;
    get_footer(); 
?>