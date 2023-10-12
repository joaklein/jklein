<?php get_header();

function get_github_langs($url)
{
    // Create cache filename
    $cacheFile = __DIR__ . '/cache/' . md5($url);

    // If cache file exists, read it and get timestamp
    if (file_exists($cacheFile)) {
        $fh = fopen($cacheFile, 'r');
        $size = filesize($cacheFile);
        $cacheTime = trim(fgets($fh));

        // If cache timestamp is < 60 minutes old, return cached data
        if ($cacheTime > strtotime('-1 week')) {
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

$projects  = get_field('projects');
?>

<div id="main-container">
    <aside>
        <div id="nav">
            <div id="name-and-title">
                <h1 id="name">Josh Klein</h1>
                <h3 id="title">Web Developer</h3>
            </div>
            <div class="stats section-border">
                <div class="section-header">
                    <p>GitHub Statistics</p>
                </div>
                <div class="stat-list section-padding">
                    <?php
                    $global_langs = array();

                    foreach ($projects  as $project) {

                        $slug = substr($project['project-code-link'], strrpos($project['project-code-link'], '/') + 1);
                        $url = 'https://api.github.com/repos/joaklein/' . $slug . '/languages';
                        $result = get_github_langs($url);

                        foreach ($result as $k => $v) {
                            if ($k === 'JavaScript') {
                                $k = 'JS';
                            }

                            if (!isset($global_langs[$k])) {
                                $global_langs[$k] = $v;
                            } else {
                                $global_langs[$k] += $v;
                            }
                        }
                    }

                    $lang_score_total = array_sum($global_langs);

                    foreach ($global_langs as $k => $v) {
                        $lang_score = number_format($v / $lang_score_total * 100, 1, '.', '');
                    ?>
                        <div class="stat-item">
                            <p class="stat-name"><?php echo $k; ?></p>
                            <p class="stat-value"><?php echo $lang_score; ?>%</p>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="socials section-border">
                <div class="section-header">
                    <p>Socials</p>
                </div>
                <div class="socials-list">
                    <a href="mailto:josh@jklein.me"><i class="fas fa-envelope" aria-hidden="true"></i></a>
                    <a href="<?php echo carbon_get_theme_option('linkedin_link'); ?>" target="_blank"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                    <a href="<?php echo carbon_get_theme_option('github_link'); ?>" target="_blank"><i class="fa-brands fa-github"></i></a>
                    <a href="<?php echo carbon_get_theme_option('soundcloud_link'); ?>" target="_blank"><i class="fab fa-soundcloud" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </aside>

    <main id="content">
        <section class="projects-section section-border">
            <p class="projects-header section-header">Projects</p>
            <div id="projects" class="section-padding">
                <?php
                foreach ($projects  as $project) { ?>
                    <div class="project-item">
                        <p class="project-title"><i class="fa-solid fa-folder folder"></i><?php echo ($project['project-title']); ?></p>
                        <div class="project-info">
                            <img src="<?php echo wp_get_attachment_url($project['project-thumbnail']); ?>" alt="<?php echo ($project['project-title']); ?> Thumbnail">
                            <p class="project-description"><?php echo ($project['project-description']); ?></p>
                            <div class="project-links">
                                <a href="<?php echo ($project['project-code-link']); ?>" class="button" target="_blank" class="project-code-link">Code</a>
                                <a href="<?php echo ($project['project-link']); ?>" class="button" target="_blank">Site</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </section>

        <section>
            <div id="partners" class="section-border">
                <p class="section-header">Current Partners</p>
                <div class="partner-logos section-padding">
                    <a href="https://www.indyambassadors.org" target="_blank">
                        <img src="https://indyambassadors.org/wp-content/themes/indy-ambassadors/images/indy-ambassadors-logo.png">
                    </a>
                    <a href="https://syf.org" target="_blank">
                        <img src="https://syf.org/wp-content/uploads/2023/06/SYF-Logo-Horiz-white.png">
                    </a>
                </div>
            </div>
        </section>
    </main>
</div>

<?php get_footer(); ?>