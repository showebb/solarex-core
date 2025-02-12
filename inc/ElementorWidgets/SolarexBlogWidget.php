<?php
namespace Solarex\Core\ElementorWidgets;
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class SolarexBlogWidget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'solarex_blog_widget';
    }

    public function get_title()
    {
        return __('Solarex Blog Widget', 'solarex');
    }

    public function get_icon()
    {
        return 'eicon-post-list'; // Elementor icon for the widget.
    }

    public function get_categories()
    {
        return ['solarex-elements']; // Assign widget to a category.
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'solarex_blog_content',
            [
                'label' => __('Content', 'solarex'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'solarex_blog_posts_per_page',
            [
                'label' => __('Number of Posts', 'solarex'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 5,
            ]
        );

        $this->add_control(
            'solarex_blog_show_author',
            [
                'label' => __('Show Author', 'solarex'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'solarex_blog_show_date',
            [
                'label' => __('Show Date', 'solarex'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        // description hide
        $this->add_control(
            'solarex_blog_description_show',
            [
                'label' => __('Show Description', 'solarex'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->end_controls_section();

        // query
        $this->start_controls_section(
            'solarex_blog_query',
            [
                'label' => __('Query', 'solarex'),
            ]
        );
        $this->add_control(
            'solarex_blog_category',
            [
                'label' => __('Category', 'solarex'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => $this->get_taxonomy_options('category'),
                'multiple' => true,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'solarex_blog_tag',
            [
                'label' => __('Tag', 'solarex'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => $this->get_taxonomy_options('post_tag'),
                'multiple' => true,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'solarex_blog_author',
            [
                'label' => __('Author', 'solarex'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => $this->get_author_options(),
                'multiple' => true,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'solarex_blog_date_range',
            [
                'label' => __('Date Range', 'solarex'),
                'type' => \Elementor\Controls_Manager::DATE_TIME,
                'picker_options' => ['enableTime' => false],
                'default' => '',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'solarex_blog_layout',
            [
                'label' => __('Layout', 'solarex'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'solarex_blog_column_per_row',
            [
                'label' => __('Column per row', 'solarex'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1' => __('1 Column', 'solarex'),
                    '2' => __('2 Column', 'solarex'),
                    '3' => __('3 Column', 'solarex'),
                    '4' => __('4 Column', 'solarex'),
                ],
                'default' => '3',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'solarex_blog_title',
            [
                'label' => __('Title', 'solarex'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'solarex_blog_title_tabs'
        );

        $this->start_controls_tab(
            'solarex_blog_title_normal_tab',
            [
                'label' => esc_html__('Normal', 'textdomain'),
            ]
        );

        $this->add_control(
            'solarex_blog_title_color',
            [
                'label' => esc_html__('Title Color', 'solerex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}}  .solarex_blog_title' => 'color: {{VALUE}}',
                ],
            ]
        );



        $this->end_controls_tab();

        $this->start_controls_tab(
            'solarex_blog_title_hover_tab',
            [
                'label' => esc_html__('Hover', 'solerex-core'),
            ]
        );

        $this->add_control(
            'solarex_blog_title_hover_color',
            [
                'label' => esc_html__('Text Color', 'elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .solarex_blog_title:hover' => 'color: {{VALUE}};',
                ],
                'default' => '#2856B2',
            ]
        );

        $this->add_control(
            'solarex_blog_title_hover_color_transition_duration',
            [
                'label' => esc_html__('Transition Duration', 'elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['s', 'ms', 'custom'],
                'default' => [
                    'unit' => 's',
                    'size' => 0.3,
                ],
                'selectors' => [
                    '{{WRAPPER}}  .solarex_blog_title:hover' => 'transition-duration: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();



        $this->add_responsive_control(
            'solarex_blog_title_padding',
            [
                'label' => __('Padding', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => '10',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}}  .solarex_blog_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'solarex_blog_title_font_size',
            [
                'label' => __('Font Size', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 0.1,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .solarex_blog_title' => 'font-size: {{SIZE}}{{UNIT}}; line-height: normal;',
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 22,
                ],
            ]
        );

        $this->add_control(
            'solarex_blog_title_spacing',
            [
                'label' => __('Spacing', 'solarex'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}}  .solarex_blog_title' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'solarex_blog_author_date',
            [
                'label' => __('Author and Date', 'solarex'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'solarex_blog_author_date_style',
            [
                'label' => __('Color', 'solarex'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#F67D2E',
                'selectors' => [
                    '{{WRAPPER}} .solarex_blog_author_date_color' => 'color: {{VALUE}} !important; margin-bottom: 0px !important;',
                ],
            ]
        );

        $this->add_control(
            'solarex_blog_author_date_spacing',
            [
                'label' => __('Spacing', 'solarex'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .solarex_blog_author_date_color' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'solarex_blog_description_style',
            [
                'label' => __('Description', 'solarex'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'solarex_blog_description_color',
            [
                'label' => __('Color', 'solarex'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .solarex_blog_description' => 'color: {{VALUE}}',
                ],
            ]
        );
        // typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'solarex_blog_description_typography',
                'label' => __('Typography', 'solarex'),
                'selector' => '{{WRAPPER}} .solarex_blog_description',
            ]
        );

        $this->add_control(
            'solarex_blog_description_spacing',
            [
                'label' => __('Spacing', 'solarex'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .solarex_blog_description' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

    }



    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $show_author = $settings['solarex_blog_show_author'];
        $show_date = $settings['solarex_blog_show_date'];
        $description_show = $settings['solarex_blog_description_show'];

        // Build query arguments dynamically
        $query_args = [
            'post_type' => 'post',
            'posts_per_page' => $settings['solarex_blog_posts_per_page'],
            'category__in' => $settings['solarex_blog_category'] ?? [],
            'tag__in' => $settings['solarex_blog_tag'] ?? [],
        ];

        $query = new \WP_Query($query_args);

        $column_per_row = $settings['solarex_blog_column_per_row'];
        $column_class = match ($column_per_row) {
            '1' => 'col-12',
            '2' => 'col-12 col-md-6',
            '3' => 'col-12 col-md-6 col-lg-4',
            '4' => 'col-12 col-md-6 col-lg-3',
            '5' => 'col-12 col-md-6 col-lg-2',
            default => 'col-12 col-md-6 col-lg-4',
        };

        if ($query->have_posts()) {
            echo '<div class="solarex_blog_card row">';

            while ($query->have_posts()) {
                $query->the_post();

                $post_thumbnail = has_post_thumbnail()
                    ? get_the_post_thumbnail_url()
                    : 'https://placehold.co/625x360';

                ?>
                <div class="<?php echo esc_attr($column_class); ?>">
                    <div class="solarex_blog_item relative">
                        <img src="<?php echo esc_url($post_thumbnail); ?>" class="img-fluid object-fit-cover w-100" alt=""
                            style="aspect-ratio: 16/9;">
                        <a href="<?php the_permalink(); ?>" class="solarex_blog_title">
                            <h3 class="solarex_blog_title"><?php the_title(); ?></h3>
                        </a>
                        <p class="primary-color solarex_blog_author_date_color">
                            <?php if ($show_author == 'yes'): ?>
                                <span>Author: <?php the_author(); ?></span>
                            <?php endif; ?>
                            <?php if ($show_date == 'yes'): ?>
                                <span>Date: <?php echo get_the_date(); ?></span>
                            <?php endif; ?>
                        </p>

                        <?php if ($description_show == 'yes'): ?>
                            <?php
                            $content = strip_tags(get_the_content());
                            $paragraphs = preg_split("/\\r\\n|\\r|\\n/", $content);
                            $second_paragraph = $paragraphs[1] ?? '';
                            ?>
                            <p class="solarex_blog_description"><?php echo esc_html($second_paragraph); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
            }

            echo '</div>';
        } else {
            echo '<p>' . __('No posts found.', 'solarex-core') . '</p>';
        }

        wp_reset_postdata();
    }


    private function get_taxonomy_options($taxonomy)
    {
        $terms = get_terms(['taxonomy' => $taxonomy, 'hide_empty' => false]);
        $options = [];
        foreach ($terms as $term) {
            $options[$term->term_id] = $term->name;
        }
        return $options;
    }

    private function get_author_options()
    {
        $users = get_users(['who' => 'authors']);
        $options = [];
        foreach ($users as $user) {
            $options[$user->ID] = $user->display_name;
        }
        return $options;
    }



}
