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