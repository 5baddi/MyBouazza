<?php
    
    /*
     * @package Search page
     * @subpackage MyBouazza
     * Developed by @5Baddi | baddi.info
     */
     $page = (get_query_var('page')) ? get_query_var('page') : 1;
     $gets = get_option('myb-up-posts');
     $search = new WP_Query(array(
         's'                =>  get_search_query(),
         'post_type'        =>  'post',
         'posts_per_page'   =>  $gets['cat_perpage'],
         'order_by'         =>  'date',
         'order'            =>  $gets['cat_order'],
         'paged'            =>  $page
     ));
     
     get_header();
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <?php if(get_search_query() == ""): ?>
            <span class="text-muted"><?= mybouazza_trs('أدخل من فضلك عنوان مفتاحي للبحث !'); ?></span>
            <?php 
                endif;
                get_search_form();
            ?>
        </div>
    </div>
</div>
<hr/>
<div class="container">
    <div class="row">
<?php
    if($search->have_posts()):
        while($search->have_posts()):
?>
        <section class="container articles">
            <div class="row">
                <?php
                    $lastQuery = $search->current_post;
                    $totalQuery = $search->post_count;
                    if (--$totalQuery > $lastQuery):
                        $restAll = $totalQuery - $lastQuery;
                        $rest = ($restAll < 3) ? $restAll : 3;
                    endif;
                    for($i =0; $i < $rest; $i++): $search->the_post();
                ?>
                <div class="col-<?= ($rest == 2) ? 6 : 4; ?>">
                    <a href="<?= the_permalink(); ?>">
                        <div class="bigarticle card">
                            <?php the_post_thumbnail('', ['class' => 'card-img']); ?>
                            <article class="card-block">
                                <h1 class="card-title"><?= mybouazza_substr($post->post_title, 160); ?></h1>
                                <p class="card-text"><?= mybouazza_substr($post->post_content, 180, "&hellip;"); ?></p>
                            </article>
                        </div>
                    </a>
                </div>
                <?php endfor; ?>
            </div>
        </section>
<?php 
            wp_reset_postdata();
        endwhile; 
        if($page < $search->max_num_pages):
        ?>
        <div class="col-12 text-center">
            <a href="<?= mybouazza_search_link(); ?>" class="btn mybtn"><?= mybouazza_trs('عرض المزيد'); ?>&nbsp;<i class="fa fa-arrow-down"></i></a>
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