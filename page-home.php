<?php get_header(); ?>

<header>
    <h1><?php the_field('header-title'); ?></h1>
    <p><?php the_field('header-statement-1'); ?></p>
    <p><?php the_field('header-statement-2'); ?></p>
</header>

<div class="projects">
    <h2>Projects</h2>

    <?php
    $projects  = get_field('projects');

    foreach ($projects  as $project) { ?>
        <div class="project-item">
            <div class="project-thumbnail">
                <a target="_blank" href="<?php echo ($project['project-link']); ?>"><img src="<?php echo wp_get_attachment_url($project['project-thumbnail']); ?>"></a>
            </div>
            <div class="project-item-info">
                <h2><?php echo ($project['project-title']); ?></h2>
                <p><?php echo ($project['project-description']); ?></p>
            </div>
        </div>
    <?php } ?>

</div>

<?php get_footer(); ?>