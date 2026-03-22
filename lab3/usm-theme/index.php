<?php get_header(); ?>

<div class="site-container">

    <main class="site-content">
        <h2>Последние записи</h2>

        <?php
        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <article>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php the_excerpt(); ?></p>
                </article>
            <?php endwhile;
        else :
            echo '<p>Постов нет.</p>';
        endif;
        ?>
    </main>

    <?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>