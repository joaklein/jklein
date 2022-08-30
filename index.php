<?php get_header();



if (have_posts()) : while (have_posts()) : the_post();

        the_content(); ?>

    <?php endwhile; else : ?>

    <section class="section section--not-found | js-smooth-section">
        <div class="not-found">
            <h1 class="not-foundheading o-title--large">Whoops!<br /> We can't find that.</h1>
            <p class="not-foundcontent">
                404 not found. Please try navigating again
            </p>

        </div>
    </section>


<?php endif;

get_footer();
