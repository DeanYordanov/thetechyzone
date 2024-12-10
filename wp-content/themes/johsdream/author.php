<?php
get_header();
?>

<main id="main-content">
    <!-- Author Bio Section -->
    <section id="author-bio" class="wrapper alt style1">
        <div class="inner">
            <div class="author-info">
                <!-- Author Avatar -->
                <div class="author-avatar">
                    <?php echo get_avatar(get_the_author_meta('ID'), 128); // Display author's avatar ?>
                </div>
                <!-- Author Name -->
                <h1 class="major"><?php echo get_the_author(); ?></h1>
                <!-- Author Description -->
                <p class="author-description">
                    <?php echo get_the_author_meta('description') ?: 'This author has not added a bio yet.'; ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Author Posts Section -->
    <section id="author-posts" class="wrapper alt style2">
        <div class="inner">
            <h2 class="major"><?php echo sprintf('Posts by %s', get_the_author()); ?></h2>
            <section class="features">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <article>
                            <!-- Post Thumbnail -->
                            <a href="<?php the_permalink(); ?>" class="image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium', array('alt' => get_the_title())); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/default.jpg" alt="<?php the_title(); ?>" />
                                <?php endif; ?>
                            </a>
                            <!-- Post Title -->
                            <h3 class="major">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <!-- Post Excerpt -->
                            <p><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
                            <!-- Read More Button -->
                            <a href="<?php the_permalink(); ?>" class="special">Read More</a>
                        </article>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>No posts found for this author.</p>
                <?php endif; ?>
            </section>
        </div>
    </section>
</main>

<?php get_footer(); ?>
