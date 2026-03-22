<?php get_header(); ?>

<div class="site-container">

    <main class="site-content">

        <?php
        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                
                <h2><?php the_title(); ?></h2>
                <p><?php the_content(); ?></p>

                <?php
                // Показываем комментарии, если они включены
                if (comments_open() || get_comments_number()) {
                    comments_template();
                }
                ?>

            <?php endwhile;
        endif;
        ?>

    </main>

    <?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>