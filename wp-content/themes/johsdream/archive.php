<?php
// Include the header
get_header();
?>


    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <h2><?php the_archive_title(); ?></h2>
        </div>
    </section>

    <!-- Wrapper -->
    <section id="wrapper" class="archive-section">
        <div class="inner">
            <h2 class="major">All Hardware related articles</h2>
            
            <!-- Posts -->
            <?php if (have_posts()) : ?>
                <div class="posts-list">
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="post-item">
                            <!-- Post Thumbnail -->
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" class="image">
                                    <?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
                                </a>
                            <?php endif; ?>

                            <!-- Post Title -->
                            <h3 class="major">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>

                            <!-- Post Excerpt -->
                            <p><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>

                            <!-- Read More Button -->
                            <a href="<?php the_permalink(); ?>" class="special">Full article</a>
                        </article>
                    <?php endwhile; ?>
                </div>

                <!-- Pagination -->
                <div class="pagination">
                    <?php
                    echo paginate_links(array(
                        'prev_text' => '&laquo; Previous',
                        'next_text' => 'Next &raquo;',
                    ));
                    ?>
                </div>
            <?php else : ?>
                <p>No posts found in this archive.</p>
            <?php endif; ?>
        </div>
    </section>

<?php
// Include the footer
get_footer();
?>
