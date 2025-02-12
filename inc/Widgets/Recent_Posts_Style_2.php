<?php
namespace Solarex\Core\Widgets;

class Recent_Posts_Style_2 extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'custom_recent_posts',
            __('Custom Recent Posts', 'text_domain'),
            array('description' => __('Displays recent posts with custom layout', 'text_domain'))
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        // Query for posts
        $query = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 4,
            'post_status' => 'publish'
        ));

        if ($query->have_posts()):
            $first_post = true;
            ?>
            <div class="row g-4">
                <div class="col-md-6">
                    <?php while ($query->have_posts()):
                        $query->the_post();
                        if ($first_post):
                            $first_post = false; ?>
                            <div id="news" class="d-flex flex-column justify-content-end">
                                <?php if (has_post_thumbnail()): ?>
                                    <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>"
                                        alt="<?php the_title_attribute(); ?>" class="mb-3">
                                <?php endif; ?>
                                <h3 class="text-white"><?php the_title(); ?></h3>
                                <p class="text-white">Author: <?php the_author(); ?>, Date: <?php echo get_the_date('F j, Y'); ?></p>
                            </div>
                        <?php endif;
                    endwhile; ?>
                </div>

                <div class="col-md-6">
                    <ul class="list-unstyled">
                        <?php
                        $count = 0;
                        while ($query->have_posts()):
                            $query->the_post();
                            if ($count > 0): // Skip first post ?>

                            
                                <li class="mb-3">
                                    <div class="d-flex gray-bg align-items-center justify-content-between p-3 gap-4">
                                        <div>
                                            <?php if (has_post_thumbnail()): ?>
                                                <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'thumbnail')); ?>"
                                                    alt="<?php the_title_attribute(); ?>">
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <h4><?php the_title(); ?></h4>
                                            <p>Author: <?php the_author(); ?>, Date: <?php echo get_the_date('F j, Y'); ?></p>
                                        </div>
                                    </div>
                                </li>
                            <?php endif;
                            $count++;
                        endwhile; ?>
                    </ul>
                </div>
            </div>
            <?php
        endif;
        wp_reset_postdata();
        echo $args['after_widget'];
    }

    // Widget backend form (optional)
    public function form($instance)
    {
        // Add form fields if needed
    }

    // Update widget settings (optional)
    public function update($new_instance, $old_instance)
    {
        // Process saved options
        return $new_instance;
    }
}
