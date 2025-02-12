<?php
namespace Solarex\Core\Widgets;

use Carbon_Fields\Widget;
use Carbon_Fields\Field;

class RecentPostWidget extends Widget
{
    function __construct()
    {
        $this->setup('recent_post_widget', 'Custom Recent Posts', 'A widget to display recent posts', array(
            Field::make('text', 'solarex_recent_post_widget_title', 'Title')
                ->set_default_value('Recent Posts'),
            Field::make('text', 'solarex_recent_post_widget_number_of_posts', 'Number of Posts')
                ->set_attribute('type', 'number')
                ->set_default_value(3), // Default to 5 recent posts
        ));
    }

    function front_end($args, $instance)
    {
        echo $args['before_widget'];

        // Title
        $title = !empty($instance['recent_post_widget_title']) ? $instance['recent_post_widget_title'] : __('Recent Posts', 'Solerex');
        if (!empty($title)) {
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }

        // Fetch recent posts
        $number_of_posts = !empty($instance['recent_post_widget_number_of_posts']) ? intval($instance['recent_post_widget_number_of_posts']) : 5;

        $query = new \WP_Query(array(
            'posts_per_page' => $number_of_posts,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
        ));

        if ($query->have_posts()) {
            echo '<ul class="list-unstyled">';
            while ($query->have_posts()) {
                $query->the_post();
                $post_date = get_the_date();
                $post_title = get_the_title();
                $post_url = get_permalink();
                $post_image = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') ?: 'https://placehold.co/120x100'; // Fallback image

                echo '<li class="mb-2">
                    <div class="d-flex gray-bg align-items-center justify-content-between gap-4">
                        <div>
                            <img style="width: 130px; height: 100px; object-fit: cover;" src="' . esc_url($post_image) . '" alt="">
                        </div>
                        <div>
                            <p>' . esc_html($post_date) . '</p>
                            <a href="' . esc_url($post_url) . '"><h6>' . esc_html($post_title) . '</h6></a>
                        </div>
                    </div>
                </li>';
            }
            echo '</ul>';
            wp_reset_postdata();
        } else {
            echo '<p>No recent posts available.</p>';
        }

        echo $args['after_widget'];
    }
}