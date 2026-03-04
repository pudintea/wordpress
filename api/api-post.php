<?php
// Pudin Saepudin
// https://domainanda.com/wp-json/custom/v1/posts
// Single post:
// https://domainanda.com/wp-json/custom/v1/posts/10

add_action('rest_api_init', function () {
	
	// Untuk Semua post
    register_rest_route('custom/v1', '/posts', array(
        'methods' => 'GET',
        'callback' => 'custom_posts_api'
    ));
	
	// Endpoint untuk single post berdasarkan ID
    register_rest_route('custom/v1', '/posts/(?P<id>\d+)', array(
        'methods'  => 'GET',
        'callback' => 'custom_single_post_api'
    ));
});

function custom_posts_api() {
    $posts = get_posts(array(
        'numberposts' => 5
    ));

    $data = [];

    foreach($posts as $post){
        $data[] = [
            'id' 		=> $post->ID,
            'title' 	=> get_the_title($post->ID),
            'date' 		=> get_the_date('', $post->ID),
			'excerpt' 	=> get_the_excerpt($post->ID),
            'image' 	=> get_the_post_thumbnail_url($post->ID, 'full')
        ];
    }

    return $data;
}

function custom_single_post_api($request) {
    $id = $request['id'];
    if (!get_post($id)) {
        return new WP_Error('not_found', 'Post tidak ditemukan', array('status' => 404));
    }
    return [
        'id'      => $id,
        'title'   => get_the_title($id),
        'date'    => get_the_date('', $id),
        'content' => apply_filters('the_content', get_post_field('post_content', $id)),
        'image'   => get_the_post_thumbnail_url($id, 'full')
    ];
}

// Pudintea, italazhar.com
