<?php
    
    /*
     * @package Single post page
     * @subpackage MyBouazza
     * Developed by @5Baddi | baddi.info
     */

     if(have_posts()): while(have_posts()): the_post();
     get_template_part('customit/post.header');
?>
    <div class="row">
        <section class="col-md-10 post">
            <?php mybouazza_topads(); ?>
            <article>
                <?php the_content(); ?>
                <hr/>
                <small class="text-muted"><i class="fa fa-calendar"></i>&nbsp;<?php the_date('l j F Y'); ?>&nbsp;<i class="fa fa-clock-o"></i>&nbsp;<?php the_time(); ?>&nbsp;<i class="fa fa-tag"></i>&nbsp;<?php the_category(' | '); ?></a>&nbsp;<?php the_tags('<i class="fa fa-tags"></i>&nbsp;', '، '); ?></small>		
            </article>
        </section>
    </div>
    <div class="row">
        <section class="col-md-10 post">
            <?php comments_template(); ?>
        </section>
    </div>
            
<?php 
        endwhile;
    endif;
    get_footer(); 
?>