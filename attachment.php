<?php get_header(); ?>
<?php 
get_template_part('templates/navbar-single');
the_post();
?>
<div class="container" style="margin-top: 80px;">
    <div class="row">
        <div class="col-sm-3 hidden-xs">
            <?php get_template_part('templates/sidebar-filters'); ?>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12">
                    <main>
                        <article>
                            <div class="col-sm-12">
                                <?php the_title('<h2 class="single-title">','</h2>');?>
                                <hr />
                            </div>
                            <div class="col-sm-12">
                                <?php 
                                    $url = wp_get_attachment_image_src( $post->id, "full");
                                    echo '<img src="'.$url[0].'" class="img-responsive" alt="'. get_the_title() .'">'
                                ?>
                            </div>                            
                            <div class="col-xs-12">
                                <hr />
                                
                                <?php 
                                if ( post_password_required() ) {
                                    return;
                                }
                                ?>

                                <div id="comments" class="comments-area">

                                    <?php // You can start editing here -- including this comment! ?>

                                    <?php if ( have_comments() ) : ?>
                                        <h3 class="comments-title">1
                                            <?php
                                                printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'editor' ),
                                                    number_format_i18n( get_comments_number() ), get_the_title() );
                                            ?>
                                        </h3>

                                        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
                                        <nav id="comment-nav-above" class="comment-navigation" role="navigation">
                                            <h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'editor' ); ?></h1>
                                            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'editor' ) ); ?></div>
                                            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'editor' ) ); ?></div>
                                        </nav><!-- #comment-nav-above -->
                                        <?php endif; // check for comment navigation ?>

                                        <ol class="comment-list">
                                            <?php
                                                wp_list_comments( array(
                                                    'style'       => 'ol',
                                                    'short_ping'  => true,
                                                    'avatar_size' => 50,
                                                    'callback'    => 'editor_comment'
                                                ) );
                                            ?>
                                        </ol><!-- .comment-list -->

                                        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
                                        <nav id="comment-nav-below" class="comment-navigation" role="navigation">
                                            <h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'editor' ); ?></h1>
                                            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'editor' ) ); ?></div>
                                            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'editor' ) ); ?></div>
                                        </nav><!-- #comment-nav-below -->
                                        <?php endif; // check for comment navigation ?>

                                    <?php endif; // have_comments() ?>

                                    <?php
                                        // If comments are closed and there are comments, let's leave a little note, shall we?
                                        if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
                                    ?>
                                        <p class="no-comments"><?php _e( 'Comments are closed.', 'editor' ); ?></p>
                                    <?php endif; ?>

                                    <?php comment_form(); ?>

                                </div><!-- #comments -->
                            </div>                            
                        </article>
                    </main>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <?php get_template_part('templates/sidebar-foodtrucks'); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>