<?php
    
    /*
     * @package Tag page
     * @subpackage MyBouazza
     * Developed by @5Baddi | baddi.info
     */
     
     $page = (get_query_var('page')) ? get_query_var('page') : 1;
     $gets = get_option('myb-up-posts');
     $tag = new WP_Query(array(
         'tag'              =>  single_tag_title('', false),
         'posts_per_page'   =>  $gets['cat_perpage'],
         'post_type'        =>  'post',
         'orderby'          =>  'date',
         'order'            =>  $gets['cat_order'],
         'paged'            =>  $page
     ));
     
     // If the page number is bigger than max pages
     if($page > $tag->max_num_pages):
        $tag->set_404();
        status_header(404);
        get_template_part(404);
        exit();
     endif;
     
     get_header();
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <?php get_search_form(); ?>
        </div>
    </div>
</div>
<div class="container articles">
    <div class="row">
        <div class="col-12 caty">
            <span><?php single_tag_title(); ?></span>
        </div>
<?php
    if($tag->have_posts()):
        while($tag->have_posts()):
?>
        <section class="container articles">
            <div class="row">
                <?php
                    $lastQuery = $tag->current_post;
                    $totalQuery = $tag->post_count;
                    if (--$totalQuery > $lastQuery):
                        $restAll = $totalQuery - $lastQuery;
                        $rest = ($restAll < 3) ? $restAll : 3;
                    endif;
                    for($i =0; $i < $rest; $i++): $tag->the_post();
                ?>
                <div class="col-<?= ($rest == 2) ? 6 : 4; ?>">
                    <a href="<?= the_permalink(); ?>">
                        <div class="bigarticle card">
                            <?php the_post_thumbnail('full', ['class' => 'card-img']); ?>
                            <article class="card-block">
                                <h1 class="card-title"><?= mybouazza_substr($post->post_title, 120); ?></h1>
                                <p class="card-text"><?= mybouazza_substr($post->post_content, 200, "&hellip;"); ?></p>
                            </article>
                        </div>
                    </a>
                </div>
                <?php endfor; ?>
            </div>
        </section>
<?php 
        endwhile; 
        if($page < --$tag->max_num_pages):
        ?>
        <div class="col-12 text-center">
            <a href="<?= mybouazza_cat_link(); ?>" class="btn mybtn"><?= mybouazza_trs('عرض المزيد'); ?>&nbsp;<i class="fa fa-arrow-down"></i></a>
        </div>
        <?php 
         endif;
      else:
?>
        <div class="col-md-6">
            <h4 class="text-center min_error"><i class="fa fa-warning"></i>&nbsp;<?= mybouazza_trs('لم يتم العثور على أي نتيجة '); ?>&hellip;</h4>
        </div>        
<?php endif; ?>
    </div>
</div>
<?php
    get_footer();