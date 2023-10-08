<?php get_header();

function getJson($url)
{
    // Create cache filename
    $cacheFile = __DIR__ . '/cache/' . md5($url);

    // If cache file exists, read it and get timestamp
    if (file_exists($cacheFile)) {
        $fh = fopen($cacheFile, 'r');
        $size = filesize($cacheFile);
        $cacheTime = trim(fgets($fh));

        // If cache timestamp is < 60 minutes old, return cached data
        if ($cacheTime > strtotime('-60 minutes')) {
            // Turn cache data back in to JSON and return it
            return unserialize(fread($fh, $size));
        }

        // If cache timestamp is > 60 minutes old, delete cache file
        fclose($fh);
        unlink($cacheFile);
    }

    // Call GitHub Languages API
    $ch = curl_init($url);
    curl_setopt_array($ch, array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
            'User-Agent: joaklein-portfolio',
            'Content-Type: application/json'
        )
    ));
    // GitHub Languages API response
    $response = curl_exec($ch);
    // JSONize GitHub Languages API response
    $result = json_decode($response);
    // Serialize the JSONized GitHub Languages API response for caching
    $result_data = serialize($result);

    // Create new cache file with serialized JSON
    $fh = fopen($cacheFile, 'w');
    fwrite($fh, time() . "\n");
    fwrite($fh, $result_data);
    fclose($fh);

    // Return new JSON (NON-serialized) version of GitHub Languages API response
    return $result;
}
?>

<header>
    <div id="header-bg">
        <img src="<?php echo get_template_directory_uri(); ?>/neon_circle.png" alt="">
    </div>
    <div id="about" class="header-text">
        <h2>Let's summon your</h2>
        <h2>next vision</h2>
        <h1 class="gradient-text">together.</h1>
    </div>
</header>

<section>
    <h1 class="projects-header">Projects</h1>
    <div id="projects" class="projects">
        <?php
        $projects  = get_field('projects');

        foreach ($projects  as $project) { ?>

            <div class="project-item">
                <h2 class="text--pad-sm"><?php echo ($project['project-title']); ?></h2>
                <img src="<?php echo wp_get_attachment_url($project['project-thumbnail']); ?>" alt="<?php echo ($project['project-title']); ?> Thumbnail">
                <p class="text--pad-sm"><?php echo ($project['project-description']); ?></p>
                <div class="project-item-stats">
                    <?php
                    $slug = substr($project['project-code-link'], strrpos($project['project-code-link'], '/') + 1);
                    $url = 'https://api.github.com/repos/joaklein/' . $slug . '/languages';
                    $result = getJson($url);
                    $lang_score_total = 0;

                    foreach ($result as $k => $v) {
                        $lang_score_total += $v;
                    }

                    foreach ($result as $k => $v) {
                        $lang_score = number_format($v / $lang_score_total * 100, 1, '.', '');
                    ?>
                        <div class="progress-bar">
                            <div class="progress-value" style="width:<?php echo $lang_score; ?>%"></div>
                            <div class="progress-label"><?php echo $k . ' - ' . $lang_score . '%'; ?></div>
                        </div>
                    <?php } ?>
                </div>
                <div class="project-links">
                    <a href="<?php echo ($project['project-code-link']); ?>" target="_blank" class="project-code-link">Code</a>
                    <a href="<?php echo ($project['project-link']); ?>" target="_blank">Site</a>
                </div>
            </div>
        <?php } ?>

    </div>
</section>

<section>

    <div id="partners">
        <h1>Current Partners</h1>
        <div class="partner-logos">
            <a href="https://www.indyambassadors.org" target="_blank">
                <img src="https://indyambassadors.org/wp-content/themes/indy-ambassadors/images/indy-ambassadors-logo.png">
            </a>
            <a href="https://syf.org" target="_blank">
                <img src="https://syf.org/wp-content/uploads/2023/06/SYF-Logo-Horiz-white.png">
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>