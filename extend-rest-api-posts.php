<?php
/**
 * @package icandyrestcustomendpoints
 */

/*
/*
 * Plugin Name: Extend Rest API Posts
 * Plugin URI: https://icandevelop.com/plugins/phonepe-by-icandevelop
 * Description: Extend rest api posts.
 * Author: I Can Develop
 * Author URI: https://icandevelop.com
 * Version: 1.0.0
 * License: GPLv2 or later
 * Text Domain: icandy-rest-custom-endpoints
 */


// If the file is called directly! abort !!
defined('ABSPATH') or die ("Hey Dud! You are not in the right place.");

add_action( 'rest_api_init' , 'icandy_add_post_fields' );

function icandy_add_post_fields()
{
    register_rest_field( 
        'post',
        'img_urls',
        array(
            'get_callback' => 'get_rest_featured_image',
            'update_callback' => null,
            'schema' => null
        )
    );

    register_rest_field( 
        'post',
        'author_name',
        array(
            'get_callback' => 'get_rest_author_name',
            'update_callback' => null,
            'schema' => null
        )
    );

}

function get_rest_featured_image($object , $field_name, $request)
{
    $img = wp_get_attachment_image_src( $object['featured_media'], 'medium');
    return $img[0];
}

function get_rest_author_name()
{
    return get_the_author();
}