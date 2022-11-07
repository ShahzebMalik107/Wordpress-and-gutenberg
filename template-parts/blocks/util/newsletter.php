<div class="news-letter">
    <div class="container">
        <h2>News Letter</h2>
        <div class="news-letter-container">
            <?php
            $args = array(
                'post_type' => 'newsletter',
                'post_status' => 'publish',
                'posts_per_page' => 2,
                'orderby' => 'title',
                'order' => 'ASC',
            );

            $loop = new WP_Query($args);
            ?>
            <?php
            while ($loop->have_posts()) : $loop->the_post();
            ?>
                <div class="card">
                    <?php echo the_post_thumbnail(); ?>
                    <div class="card_inner">
                        <h3><?php echo the_title(); ?></h3>
                        <p> <?php echo the_excerpt(); ?> </p>
                        <a class="card-read-more" href="<?php echo the_permalink(); ?>">Read More</a>
                    </div>
                </div>
            <?php
            endwhile;

            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>