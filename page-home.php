<?php get_header(); ?>

<header>
    <div id="about" class="header-text">
        <p>Hail, virtual adventurer. Here resides yet another</p>
        <h2>Front End Web Developer.</h2>
        <p>My name is</p>
        <h1>Josh Klein.</h1>
        <p>Along the way of teaching myself over the past few years, I have discovered that making things work as
            simply as possible is my nuance.</p>
        <p>See some of my projects below.</p>
    </div>
</header>

<section>
    <div id="projects" class="projects">
        <?php
        $projects  = get_field('projects');

        foreach ($projects  as $project) { ?>

            <div class="project-item">
                <div class="project-info">
                    <img src="<?php echo wp_get_attachment_url($project['project-thumbnail']); ?>" alt="<?php echo ($project['project-title']); ?> Thumbnail">
                    <div class="project-text">
                        <h2><?php echo ($project['project-title']); ?></h2>
                        <p><?php echo ($project['project-description']); ?></p>
                    </div>
                </div>
                <div class="project-links">
                    <a href="<?php echo ($project['project-code-link']); ?>" target="_blank">Code</a>
                    <a href="<?php echo ($project['project-link']); ?>" target="_blank">Site</a>
                </div>
            </div>
        <?php } ?>

    </div>
</section>

<?php get_footer(); ?>