<?php 
/*
|--------------------------------------------------------------------------
| Wordpress theme > index.php
|--------------------------------------------------------------------------
*/

# header
get_header();
?>

<main class="main">
    <div class="container">
        <div class="row">
            <section class="col-md-8 content">
                <?php
                # listando os ultimos posts
                while (have_posts()) :
                    the_post();
                    ?>
                    <article class="post post-excerpt">
                        <h3 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>

                        <a href="<?php the_permalink() ?>">
                            <?php
                            if (has_post_thumbnail()) :
                                the_post_thumbnail(array(800, 600));
                            endif;
                            ?>
                        </a>

                        <div class="post-content">
                            <?php
                            /* the excerpt */
                            the_excerpt();
                            ?>
                        </div><!-- .post-content -->

                        <div class="post-meta">
                            <div class="post-meta-left">
                                <p class="post-meta-item">Postado em: <?php the_time('d/m/Y') ?></p>
                                <p class="post-meta-item">Por: <?php the_author() ?></p>
                            </div><!-- .col-md-6 -->

                            <div class="post-meta-right">
                                <a href="<?php the_permalink() ?>" class="btn btn-lg btn-primary">Continue lendo...</a><!-- .btn -->
                            </div><!-- .col-md-6 -->
                        </div><!-- .post-meta -->
                    </article><!-- .post -->
                    <?php
                endwhile;

                if (! have_posts()) :
                    ?>
                    <article class="post">
                        <br>
                        <h3 class="post-title text-center">Nenhum post encontrado</h3>
                    </article><!-- .post -->
                    <?php
                endif;

                # paginação
                require_once('pagination.php');
                ?>
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
