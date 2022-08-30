<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo wp_get_attachment_url(carbon_get_theme_option('fav_icon')); ?>">
    <!-- Primary Meta Tags -->
    <title><?php echo get_bloginfo('name'); ?></title>
    <meta name="title" content="Josh Klein - Web Developer">
    <meta name="description" content="">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://jklein.me/">
    <meta property="og:title" content="Josh Klein - Web Developer">
    <meta property="og:description" content="">
    <meta property="og:image" content="<?php echo wp_get_attachment_url(carbon_get_theme_option('meta_img')); ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://jklein.me/">
    <meta property="twitter:title" content="Josh Klein - Web Developer">
    <meta property="twitter:description" content="">
    <meta property="twitter:image" content="<?php echo wp_get_attachment_url(carbon_get_theme_option('meta_img')); ?>">

    <?php wp_head(); ?>
</head>

<body>

    <div class="socials">
        <div class="socials-frame">
            <a href="<?php echo carbon_get_theme_option('linkedin_link'); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
            <a href="<?php echo carbon_get_theme_option('twitter_link'); ?>" target="_blank"><i class="fab fa-twitter-square"></i></a>
            <a href="<?php echo wp_get_attachment_url(carbon_get_theme_option('resume')); ?>" target="_blank"><i class="fas fa-file-pdf"></i></a>
            <a href="<?php echo carbon_get_theme_option('soundcloud_link'); ?>" target="_blank"><i class="fab fa-soundcloud"></i></a>
            <a href="<?php echo carbon_get_theme_option('github_link'); ?>" target="_blank"><i class="fa-brands fa-github"></i></a>
            <a href="javascript:void(0);" id="contact"><i class="fas fa-envelope"></i></a>
        </div>
    </div>

    <div class="contact">
        <div class="contact-box">
            <a href="javascript:void(0);" id="contact-close">x</a>
            <form action="<?php echo carbon_get_theme_option('form_link'); ?>" method="POST">
                <input type="hidden" name="_next" value="https://jklein.me/">
                <input type="text" name="name" placeholder="Name" maxlength="50" required>
                <input type="email" name="email" placeholder="Email" maxlength="50" required>
                <input type="text" name="subject" placeholder="Subject" maxlength="50" required>
                <textarea rows="5" name="message" placeholder="Type your message here!" maxlength="300"
                    required></textarea>
                <button type="submit" name="submit" class="submit">Submit</button>
            </form>
        </div>
    </div>