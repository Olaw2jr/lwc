<?php

require __DIR__ . '/../vendor/autoload.php';

use PostTypes\PostType;

/*
 * Creating the Sermons post type using The post type class
 */

// Sermons Post Type
$sermons_options = [
    'supports'    => ['title', 'editor', 'thumbnail'],
];
$sermons_labels = [
    'featured_image' => __( 'Sermon Organiser Image' ),
];
$sermons = new PostType('sermon', $sermons_options, $sermons_labels);
$sermons->taxonomy('Type');
$sermons->icon('dashicons-smiley');


// Events
$events_options = [
    'supports'    => ['title', 'excerpt', 'thumbnail'],
];
$events_labels = [
    'featured_image' => __( 'Event Cover Image' ),
];
$events = new PostType('event', $events_options, $events_labels);
$events->icon('dashicons-calendar');

// Books Post Type
$books_options = [
    'supports'    => ['title', 'thumbnail', 'excerpt'],
];
$books_labels = [
    'featured_image' => __( 'Book Cover Image' ),
];
$books = new PostType('book', $books_options, $books_labels);
// $books->taxonomy('genre');
$books->icon('dashicons-book-alt');
