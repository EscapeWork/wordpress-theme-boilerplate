<?php
/*
|--------------------------------------------------------------------------
| Wordpress theme > single.php
|--------------------------------------------------------------------------
*/

# header
get_header();

the_post();

if (has_post_thumbnail()) :
    $banner = post_featured_image(array(1920, 380));
    ?>
    <div class="post-banner" style="background-image: url(<?=$banner?>)">
    </div>
    <?php
endif;
?>

<main class="main">
    <div class="container">
        <div class="row">
            <section class="col-md-8 content">
                <article class="post post-single">
                    <p class="post-category"><?=post_category_name()?></p>
                    <h3 class="post-title"><?php the_title(); ?></h3>

                    <div class="post-content">
                        <?php the_content(); ?>
                    </div><!-- .post-content -->

                    <div class="post-meta">
                        <div class="post-meta-left">
                            <p class="post-meta-item">Postado em: <?php the_time('d/m/Y') ?></p>
                            <p class="post-meta-item">Por: <?php the_author() ?></p>
                        </div><!-- .col-md-6 -->

                        <div class="post-share">
                            <div class="share-bar" data-title="<?php the_title() ?>" data-url="<?php the_permalink() ?>" data-image-url="<?=post_featured_image(array(800, 600))?>"></div>
                        </div><!-- .col-md-6 -->
                    </div><!-- .post-meta -->
                </article><!-- .post -->

                <?php $posts = get_posts(array('post__not_in' => array($post->ID), 'posts_per_page' => 3, 'order' => DESC)); ?>

                <div class="other-posts">
                    <div class="row">
                        <?php
                            foreach ( $posts as $post ) : setup_postdata( $post ); ?>
                            <div class="col-sm-4 other-post">
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    if (has_post_thumbnail()) { ?>
                                        <div class="post-thumb">
                                            <?php the_post_thumbnail(array(285, 160)); ?>
                                        </div>
                                    <?php } ?>

                                    <div class="post-meta-left">
                                        <p class="post-meta-item">Publicado em <?php the_time('d') ?> de <?php the_time('M') ?> de <?php the_time('Y') ?> por <?php the_author() ?></p>
                                    </div><!-- .col-md-6 -->

                                    <h2 class="post-title"><?php the_title(); ?></h2>
                                </a>
                            </div>
                            <?php
                            endforeach;
                            wp_reset_postdata();
                        ?>
                    </div><!-- .row -->
                </div><!-- .other-posts -->

                <?php comments_template(); ?>
            </section><!-- .content -->

            <aside class="col-md-4 sidebar">
                <?php get_sidebar() ?>
            </aside><!-- .sidebar -->
        </div><!-- .row -->
    </div><!-- .container -->
</main><!-- .main -->

<?php
# footer
get_footer();

