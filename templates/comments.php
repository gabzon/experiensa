<?php
if (post_password_required()) {
    return;
}
?>

<section id="comments" class="ui segment">
    <?php if (have_comments()) : ?>
        <div class="ui blue ribbon label">
            <i class="comments outline icon"></i>
            <?= __('Comments','sage');?>
        </div>
        <h3 class="ui header"><?php printf(_nx('One response to &ldquo;%2$s&rdquo;', '%1$s responses to &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'sage'), '<div class="ui red circular label">'.number_format_i18n(get_comments_number()).'</div>', '<span>' . get_the_title() . '</span>'); ?></h3>

        <ol class="comment-list">
            <?php wp_list_comments(['style' => 'ol', 'avatar_size' => '50']); ?>
        </ol>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav>
                <ul class="pager">
                    <?php if (get_previous_comments_link()) : ?>
                        <li class="previous"><?php previous_comments_link(__('&larr; Older comments', 'sage')); ?></li>
                    <?php endif; ?>
                    <?php if (get_next_comments_link()) : ?>
                        <li class="next"><?php next_comments_link(__('Newer comments &rarr;', 'sage')); ?></li>
                    <?php endif; ?>
                </ul>
            </nav>
        <?php endif; ?>
    <?php endif; // have_comments() ?>

    <?php if (!comments_open() && get_comments_number() != '0' && post_type_supports(get_post_type(), 'comments')) : ?>
        <div class="alert alert-warning">
            <?php _e('Comments are closed.', 'sage'); ?>
        </div>
    <?php endif; ?>
    <div class="ui form">
        <?php
        $commenter = wp_get_current_commenter();
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $fields = array(
            'author' =>
                '<div class="field comment-form-author">
                <label for="author">' . __( 'Name', 'sage' ) . '</label> ' .
                ( $req ? '<span class="required">*</span>' : '' ) .
                '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                '" size="30"' . $aria_req . ' />
            </div>',

            'email' =>
                '<div class="field comment-form-email">
                <label for="email">' . __( 'Email', 'sage' ) . '</label> ' .
                ( $req ? '<span class="required">*</span>' : '' ) .
                '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" size="30"' . $aria_req . ' />
            </div>',
        );
        $args = array(
            'fields' => $fields,
            'label_submit' => __( 'Comment this post', 'sage' ),
            'comment_field' => '<p class="comment-form-comment">
                                <div class="field">
                                    <label for="comment">' . _x( 'Comment', 'noun' ) . '</label>
                                    <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                </div>
                            </p>',
            'class_submit' =>   'ui green button'
        );
        comment_form($args);
        ?>
    </div>
</section>
