<?php
    
    /*
     * @package Category page
     * @subpackage MyBouazza
     * Developed by @5Baddi | baddi.info
     */
     
     $page = (get_query_var('page')) ? get_query_var('page') : 1;
     $gets = get_option('myb-up-posts');
     $category = new WP_Query(array(
         'category_name'    =>  single_cat_title('', false),
         'posts_per_page'   =>  $gets['cat_perpage'],
         'post_type'        =>  'post',
         'orderby'          =>  'date',
         'order'            =>  $gets['cat_order'],
         'paged'            =>  $page
     ));
     
     // If the page number is bigger than max pages
     if($page > $category->max_num_pages):
        $category->set_404();
        status_header(404);
        get_template_part(404);
        exit();
     endif;
     
     /*echo '<pre>';
     var_dump($category);*/
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
            <span><?php single_cat_title(); ?></span>
        </div>
        <?php
            if($category->have_posts()): 
                while($category->have_posts()): $category->the_post(); 
        ?>
        <section class="container articles">
            <div class="row">
                <div class="col-md-6">
                    <a href="<?= the_permalink(); ?>">
                        <div class="bigarticle card">
                            <?php the_post_thumbnail('full', ['class' => 'card-img']); ?>
                            <article class="card-block">
                                <h1 class="card-title"><?= mybouazza_substr($post->post_title, 120); ?></h1>
                                <p class="card-text"><?= mybouazza_substr($post->post_content, 400, "&hellip;"); ?></p>
                            </article>
                        </div>
                    </a>
                </div>
                <?php
                    // last query to use in offset arg
                    $lastQuery = $category->current_post;
                    // total query post
                    $totalQuery = $category->post_count;
                    if (--$totalQuery > $lastQuery):
                        $restAll = $totalQuery - $lastQuery;
                        $rest = ($restAll < 3) ? $restAll : 3;
                 ?>
                <div class="col-md-6 card-group">
                    <div class="card sub-articles">
                        <?php
                            for($i = 0; $i < $rest; $i++) : $category->the_post();
                        ?>
                        <div class="smallarticle">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('thumbnail', ['class' => 'card-img']); ?>
                                <article class="card-block">
                                    <h1 class="card-title"><?= mybouazza_substr($post->post_title, 60); ?></h1>
                                    <p class="card-text"><?= mybouazza_substr($post->post_content, 140, "&hellip;"); ?></p>
                                </article>
                            </a>
                        </div>
                        <?php
                            endfor;
                        ?>
                    </div> 
                </div>
                <?php
                    endif;
                ?>
            </div>
        </section>
        <?php 
                wp_reset_postdata();
            endwhile;
                if($page < $category->max_num_pages):
        ?>
        <div class="col-12 text-center">
            <a href="<?= mybouazza_cat_link(); ?>" class="btn mybtn"><?= mybouazza_trs('عرض المزيد'); ?>&nbsp;<i class="fa fa-arrow-down"></i></a>
        </div>
        <?php 
                endif;
            else:
        ?>
        <div class="col-md-6">
            <h4 class="text-center min_error"><i class="fa fa-warning"></i>&nbsp;<?= mybouazza_trs('ليس هناك أي مقال حاليا '); ?>&hellip;</h4>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php
     get_footer();