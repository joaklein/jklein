<?php

use Carbon_Fields\Block;
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// CARBON FIELDS

function crb_load()
{
    require_once('vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}

function crb_attach_theme_options()
{
    Container::make('theme_options', 'Theme Options')
        ->add_fields(array(
            Field::make('text', 'linkedin_link', 'LinkedIn Link'),
            Field::make('text', 'twitter_link', 'Twitter Link'),
            Field::make('text', 'soundcloud_link', 'Soundcloud Link'),
            Field::make('text', 'github_link', 'Github Link'),
            Field::make('text', 'form_link', 'Form Submission Link'),
            Field::make('file', 'resume', 'Upload Resume')
                ->set_type('application')
                ->set_width('33'),
            Field::make('image', 'meta_img', 'Meta Image')
                ->set_width('33'),
            Field::make('image', 'fav_icon', 'Fav Icon')
                ->set_width('33')
        ));
}

function crb_attach_post_options()
{
    Container::make('post_meta', 'header-info', 'Header Info')
        ->where('post_type', '=', 'page')
        ->add_fields(array(
            Field::make('text', 'header-title', 'Header Title'),
            Field::make('text', 'header-statement-1', 'Header Statement'),
            Field::make('text', 'header-statement-2', 'Header Statement')
        ));

    Container::make('post_meta', 'projects-container', 'Projects')
        ->where('post_type', '=', 'page')
        ->add_fields(array(
            Field::make('complex', 'projects', 'Projects')
                ->add_fields(array(
                    Field::make('image', 'project-thumbnail', 'Project Thumbnail')
                        ->set_width(10),
                    Field::make('text', 'project-code-link', 'Project Code Link')
                        ->set_width(30),
                    Field::make('text', 'project-link', 'Project URL')
                        ->set_width(30),
                    Field::make('text', 'project-title', 'Project Title')
                        ->set_width(30),
                    Field::make('textarea', 'project-description', 'Project Description')
                )),
        ));
}

// SHORTENING CARBON FIELDS 'GET' & 'THE'

function the_field($field)
{
    echo carbon_get_the_post_meta($field);
}

function get_field($field)
{
    return carbon_get_the_post_meta($field);
}

// SCRIPTS AND STYLES

function global_scripts()
{
    wp_enqueue_style('site-styles', get_stylesheet_uri());
    wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/dd510d8712.js');
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js');
}

function remove_admin_login_header()
{
    remove_action('wp_head', '_admin_bar_bump_cb');
}

// ACTION!

add_action('after_setup_theme', 'crb_load');

add_action('carbon_fields_register_fields', 'crb_attach_theme_options');

add_action('carbon_fields_register_fields', 'crb_attach_post_options');

add_action('get_header', 'remove_admin_login_header');

add_action('wp_enqueue_scripts', 'global_scripts');
