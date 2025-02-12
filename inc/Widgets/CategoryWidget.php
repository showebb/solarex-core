<?php
namespace Solarex\Core\Widgets;

use Carbon_Fields\Widget;
use Carbon_Fields\Field;

class CategoryWidget extends Widget {

    function __construct() {
        $this->setup( 'category_widget', 'Custom Categories', 'A widget to display categories with post counts', array(
            Field::make( 'text', 'category_widget_title', 'Title' )
                ->set_default_value( 'Categories' ),
        ) );
    }

    function front_end( $args, $instance ) {
        echo $args['before_widget'];

        // Title
        $title = !empty($instance['category_widget_title']) ? $instance['category_widget_title'] : __('Categories', 'Solerex');
        if (!empty($title)) {
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }

        // Get categories and post counts
        $categories = get_categories( array(
            'orderby' => 'name', // Order by category name
            'hide_empty' => true, // Only show categories that have posts
        ) );

        if (!empty($categories)) {
            echo '<ul class="list-unstyled">';
            foreach ($categories as $category) {
                // Get post count for each category
                $post_count = $category->count;

                echo '<li class="d-flex">
                        <h6>' . esc_html($category->name) . '</h6>
                        <hr class="w-50 mx-4">
                        <span class="text-muted">(' . esc_html($post_count) . ')</span>
                    </li>';
            }
            echo '</ul>';
        } else {
            echo '<p>No categories available.</p>';
        }

        echo $args['after_widget'];
    }
}