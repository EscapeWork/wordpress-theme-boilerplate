<?php
if (get_previous_posts_link() || get_next_posts_link()) :
    ?>
    <div class="content-box">
        <div class="row">
            <div class="col-md-6">
                <?=previous_posts_link('« Ver posts anteriores')?>
            </div>

            <div class="col-md-6 text-right">
                <?=next_posts_link('Ver mais posts »')?>
            </div>
        </div><!-- .row -->
    </div><!-- .pagination -->
    <?php
endif;
