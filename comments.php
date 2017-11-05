<?php

    /*
     * @package Comments
     * @subpackage MyBouazza
     * Developed by @5Baddi | baddi.info
     */
     if(comments_open()):
?>
<h5 class="col-12 likeit"><i class="fa fa-comments"></i>&nbsp;<?php comment_form_title(); ?></h5>
<div class="comment">
    <div class="row">
        <div class="col-11">
<?php
    comment_form(array(
        'title_reply'       =>  '',
        'class_form'        =>  'form',
        'comment_notes_before'  =>  '<p class="text-muted" style="font-size:9pt;">'.mybouazza_trs('لن يتم نشر عنوان بريدك الإلكتروني. كل الحقول إلزامية') . '</p>',
        'title_reply'       =>  '',
        'title_reply_to'    =>  '',
        'title_reply_before'    => '',
        'title_reply_after' =>  '',
        'cancel_reply_before'=> '<p class="text-muted"><small>',
        'cancel_reply_link'=> '<i class="fa fa-unlink"></i>&nbsp;'.mybouazza_trs('إلغاء التعليق'),
        'cancel_reply_after'=>  '</small></p>',
        'logged_in_as'      =>  '<p class="logged-in-as text-muted" style="margin-bottom:.4rem;"><small><i class="fa fa-user"></i>&nbsp;' . sprintf( __( mybouazza_trs('أنت متصل بحساب').' <a href="%1$s">%2$s</a><a href="%3$s">&nbsp;<i class="fa fa-sign-out"></i>&nbsp;'.mybouazza_trs('تسجيل الخروج').'</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</small></p>',
        'fields'            =>  array(
                'author'    =>  '<div class="form-group"><input type="text" name="author" class="form-control" placeholder="'.mybouazza_trs('إسمك المستعار ').'&hellip;" required/></div>',
                'email'     =>  '<div class="form-group"><input type="email" name="email" class="form-control" placeholder="'.mybouazza_trs('بريدك الإلكتروني الصحيح ').'&hellip;" required/></div>'
        ),
        'comment_field'     =>  '<div class="form-group"><textarea rows="5" name="comment" class="form-control" placeholder="'.mybouazza_trs('تعليقك ').'&hellip;" required></textarea></div>',
        'submit_button'      =>  '<div class="form-group"><button type="submit" name="submit" class="btn btn-block mybtn"><i class="fa fa-globe"></i>&nbsp;'.mybouazza_trs('أضف تعليقي').'</button></div>'
    ));
?>
        </div>
    </div>
    <?php  if(have_comments() && get_comments_number()): ?>
    <div class="row">
        <?php 
            $comments = get_comments(array(
                   'post_type'  =>  'post',
                    'status'    =>  'approve'
            ));
            foreach($comments as $comment):
        ?>
        <div class="col-11 old-comment">
            <span><?= $comment->comment_author; ?></span>
            <p class="this-comment"><?= $comment->comment_content; ?></p>	
        </div>
        <?php endforeach; ?>   
    </div>
    <?php else: ?>
    <div class="row">
        <div class="col-6 text-center" style="margin-top:1rem;">
            <i class="text-muted"><small><?= mybouazza_trs('ليست هناك تعليقات حاليا '); ?>&hellip;</small></i>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>
