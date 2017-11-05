<?php
    
    /*
     * @package Basic home page
     * @subpackage MyBouazza
     * Developed by @5Baddi | baddi.info
     */
     
     $gets = get_option('myb-up-posts');
     $cats = explode(',', $gets['cat_home']);
?>
<section class="container">
<?php
     mybouazza_topads();
     foreach($cats as $cat):
     if(mybouazza_category_exists($cat)):
     $home = new Wp_Query(array(
         'category_name'    =>  $cat,
         'post_type'        =>  'post',
         'posts_per_page'   =>  4,
     ));
?>
    <div class="row">
        <?php
            if($home->have_posts()): 
                while($home->have_posts()): $home->the_post(); 
        ?>
        <section class="container articles">
            <div class="row">
                <div class="col-12 caty">
                    	<span><?= $cat; ?></span>
                    </div>
                <div class="col-md-6">
                    <a href="<?= the_permalink(); ?>">
                        <div class="bigarticle card">
                            <?php the_post_thumbnail('', ['class' => 'card-img']); ?>
                            <article class="card-block">
                                <h1 class="card-title"><?= mybouazza_substr($post->post_title, 160); ?></h1>
                                <p class="card-text"><?= mybouazza_substr($post->post_content, 400, "&hellip;"); ?></p>
                            </article>
                        </div>
                    </a>
                </div>
                <?php
                    // last query to use in offset arg
                    $lastQuery = $home->current_post;
                    // total query post
                    $totalQuery = $home->post_count;
                    if (--$totalQuery > $lastQuery):
                        $restAll = $totalQuery - $lastQuery;
                        $rest = ($restAll < 3) ? $restAll : 3;
                 ?>
                <div class="col-md-6 card-group">
                    <div class="card sub-articles">
                        <?php
                            for($i = 0; $i < $rest; $i++) : $home->the_post();
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
    </div>
        <?php 
                wp_reset_postdata();
                endwhile;
            endif;
        endif;
    endforeach;
    ?>
</section>