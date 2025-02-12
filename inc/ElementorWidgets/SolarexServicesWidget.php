<?php
namespace Solarex\Core\ElementorWidgets;
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class SolarexServicesWidget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'solarex_services_widget';
    }

    public function get_title()
    {
        return __('Solarex Services Widget', 'solarex');
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
        // Content Section
        $this->start_controls_section(
            'solarex_services_content_section',
            [
                'label' => __('Content', 'solarex'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'solarex_posts_per_page',
            [
                'label' => __('Number of Posts', 'solarex'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 5,
            ]
        );

        $this->add_control(
            'solarex_card_design',
            [
                'label' => __('Design', 'solarex'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __('Style 1', 'solarex'),
                    '2' => __('Style 2', 'solarex'),
                    '3' => __('Style 3', 'solarex'),
                ],
            ]
        );

        $this->end_controls_section();

        // Layout Section
        $this->start_controls_section(
            'solarex_services_layout_style',
            [
                'label' => __('Layout', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Number of columns with responsive controls
        $this->add_responsive_control(
            'solarex_columns',
            [
                'label' => __('Columns', 'solarex'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'tablet_default' => '2',
                'mobile_default' => '1',
                'options' => [
                    '1' => '1 Column',
                    '2' => '2 Columns',
                    '3' => '3 Columns',
                    '4' => '4 Columns',
                    '5' => '5 Columns',
                ],
            ]
        );

        $this->end_controls_section();

        // $this->start_controls_section(
        //     'solarex_services_card_style',
        //     [
        //         'label' => __('Card Style', 'solarex'),
        //         'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        //     ]
        // );
        // add a select controler to chooose style 1 or 2 for card design 
        // $this->add_control(
        //     'solarex_card_design',
        //     [
        //         'label' => __('Design', 'solarex'),
        //         'type' => \Elementor\Controls_Manager::SELECT,
        //         'default' => '1',
        //         'options' => [
        //             '1' => __('Style 1', 'solarex'),
        //             '2' => __('Style 2', 'solarex'),
        //             '3' => __('Style 3', 'solarex'),
        //         ],
        //     ]
        // );


        // $this->end_controls_section();

      

        $this->start_controls_section(
            'services_card',
            [
                'label' => __('Card', 'solarex'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'card_border',
                'label' => __('Border', 'solarex'),
                'selector' => '{{WRAPPER}} .servics-card',
            ]
        );

        $this->add_responsive_control(
            'card_border_radius',
            [
                'label' => __('Border Radius', 'solarex'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .servics-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'card_box_shadow',
                'label' => __('Box Shadow', 'solarex'),
                'selector' => '{{WRAPPER}} .servics-card',
            ]
        );
        $this->add_responsive_control(
            'card_padding',
            [
                'label' => __('Padding', 'solarex'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .servics-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'solarex_card_design' => '1', // Only show if Design 2 is selected
                ],
            ]
        );
        $this->add_responsive_control(
            'card_padding_2',
            [
                'label' => __('Padding card 2', 'solarex'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .servics-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '24',
                    'right' => '24',
                    'bottom' => '24',
                    'left' => '24',
                    'unit' => 'px',
                ],
                'condition' => [
                    'solarex_card_design' => '2', 
                ],
            ]
        );
       

        $this->add_control(
            'card_bg_color',
            [
                'label' => esc_html__('Card Background Color', 'solerex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'tranparent',
                'selectors' => [
                    '{{WRAPPER}} .servics-card' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'solarex_card_design' => '1', 
                ],
            ]
        );

        $this->add_control(
            'card_bg_color_2',
            [
                'label' => esc_html__('Card Background Color', 'solerex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .servics-card ,.solarex_card_content_3' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'solarex_card_design' => ['2', '3'], 
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'services_card_title',
            [
                'label' => __('Title', 'solarex'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'style_tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'textdomain'),
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'solerex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .servics-card-title , .servics-card-title_3' => 'color: {{VALUE}}',
                ],
            ]
        );



        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Hover', 'solerex-core'),
            ]
        );

        $this->add_control(
            'title_hover_color',
            [
                'label' => esc_html__('Text Color', 'elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .servics-card-title:hover , .servics-card-title_3:hover' => 'color: {{VALUE}};',
                ],
                'default' => '#2856B2',
            ]
        );

        $this->add_control(
            'title_hover_color_transition_duration',
            [
                'label' => esc_html__('Transition Duration', 'elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['s', 'ms', 'custom'],
                'default' => [
                    'unit' => 's',
                    'size' => 0.3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .servics-card-title:hover , .servics-card-title_3:hover' => 'transition-duration: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();



        $this->add_responsive_control(
            'title_padding',
            [
                'label' => __('Padding', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => '20',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .servics-card-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // title width slider for design 1
        $this->add_responsive_control(
            'title_width',
            [
                'label' => __('Title Width', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 250,
                ],
                'selectors' => [
                    '{{WRAPPER}} .servics-card-title' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'solarex_card_design' => '2',
                ]
            ]
        );

        $this->add_control(
            'title_font_size',
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
                    '{{WRAPPER}} .servics-card .servics-card-title , .servics-card-title_3' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 23,
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'services_card_description',
            [
                'label' => __('Description', 'solarex'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Description Color', 'solerex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .servics-card  .servics-card-description' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'description_padding',
            [
                'label' => __('Padding', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .servics-card-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // $this->add_group_control(
        //     \Elementor\Group_Control_Typography::get_type(),
        //     [
        //         'name' => 'description_typography',
        //         'label' => __('Typography', 'solarex-core'),
        //         'selector' => '{{WRAPPER}} .servics-card-description',
        //         'default' => [
        //             'font_size' => '18px',
        //         ],
        //     ]
        // );
        $this->end_controls_section();
        // handle button style for design 2 
        $this->start_controls_section(
            'button_style',
            [
                'label' => __('Button Style', 'solarex'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'solarex_card_design' => '2', // Only show if Design 2 is selected
                ],
            ]
        );
        // button margin 
        $this->add_responsive_control(
            'button_margin',
            [
                'label' => __('Margin', 'solarex-core'),
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
                    '{{WRAPPER}} .learn-more-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );
        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Text Color', 'solerex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .learn-more-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_padding',
            [
                'label' => __('Padding', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => '10',
                    'right' => '20',
                    'bottom' => '10',
                    'left' => '20',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .learn-more-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // button border width 
        $this->add_control(
            'button_border_width',
            [
                'label' => __('Border Width', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => '1',
                    'right' => '1',
                    'bottom' => '1',
                    'left' => '1',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .learn-more-btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; border-style: solid;',
                ]
            ]
        );


        // button border radius
        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => '5',
                    'right' => '5',
                    'bottom' => '5',
                    'left' => '5',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .learn-more-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        // button border color
        $this->add_control(
            'button_border_color',
            [
                'label' => __('Border Color', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .learn-more-btn' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        // button background color with tow tab normal and hover
        $this->start_controls_tabs(
            'button_style_tabs'
        );
        $this->start_controls_tab(
            'button_style_normal',
            [
                'label' => __('Normal', 'solarex-core'),
            ]
        );
        $this->add_control(
            'button_background_color',
            [
                'label' => esc_html__('Background Color', 'solerex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .learn-more-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'button_style_hover',
            [
                'label' => __('Hover', 'solarex-core'),
            ]
        );
        $this->add_control(
            'button_background_color_hover',
            [
                'label' => esc_html__('Background Hover Color', 'solerex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'transparent',
                'selectors' => [
                    '{{WRAPPER}} .learn-more-btn:hover' => 'background-color: {{VALUE}}',
                ],

            ]
        );
        $this->add_control(
            'button_background_color_transition_duration',
            [
                'label' => esc_html__('Transition Duration', 'elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['s', 'ms', 'custom'],
                'default' => [
                    'unit' => 's',
                    'size' => 0.3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .learn-more-btn' => 'transition-duration: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        
        // Get responsive column settings
        $desktop_columns = $settings['solarex_columns'];
        $tablet_columns = isset($settings['solarex_columns_tablet']) ? $settings['solarex_columns_tablet'] : '2';
        $mobile_columns = isset($settings['solarex_columns_mobile']) ? $settings['solarex_columns_mobile'] : '1';
        
        // Build responsive column classes
        switch($desktop_columns) {
            case '1':
                $column_class = 'col-12';
                break;
            case '2':
                $column_class = 'col-12 col-md-6';
                break;
            case '3':
                $column_class = 'col-12 col-md-6 col-lg-4';
                break;
            case '4':
                $column_class = 'col-12 col-md-6 col-lg-3';
                break;
            case '5':
                $column_class = 'col-12 col-md-6 col-lg-2';
                break;
            default:
                $column_class = 'col-12 col-md-6 col-lg-4';
        }
        
        $query_args = [
            'post_type' => 'solarex_services',
            'posts_per_page' => $settings['solarex_posts_per_page'],
        ];

        $query = new \WP_Query($query_args);

        if (!$query->have_posts()) {
            esc_html_e('No posts found.', 'solarex-core');
            return;
        }
        ?>
        <div class="row solarex-services-container">
            <?php while ($query->have_posts()): $query->the_post(); ?>
                <div class="<?php echo esc_attr($column_class); ?>  py-2">
                    <?php if ($settings['solarex_card_design'] === '1'): ?>
                        <div class="servics-card">
                            <img class="service-img img-fluid w-100 object-fit-cover" 
                                 src="<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url() : 'https://placehold.co/625x360'; ?>" 
                                 alt="" 
                                 style="aspect-ratio: 6/4;">
                            <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                <h3 class="servics-card-title"><?php echo esc_html(get_the_title()); ?></h3>
                            </a>
                            <p class="servics-card-description">
                                <?php echo esc_html(carbon_get_the_post_meta('solarex_sub_title')); ?>
                            </p>
                        </div>

                    <?php elseif ($settings['solarex_card_design'] === '2'): ?>
                        <div class="servics-card">
                            <?php 
                            $icon_id = carbon_get_the_post_meta('solarex_service_icon');
                            if ($icon_id): 
                                $icon_url = wp_get_attachment_image_url($icon_id, 'full');
                                if ($icon_url):
                            ?>
                                <div class="service-icon">
                                    <img src="<?php echo esc_url($icon_url); ?>" alt="Service Icon" style="width: 70px; height: 70px;">
                                </div>
                            <?php 
                                endif;
                            endif; 
                            ?>

                            <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                <h3 class="servics-card-title"><?php echo esc_html(get_the_title()); ?></h3>
                            </a>
                            <p class="servics-card-subtitle">
                                <?php echo esc_html(carbon_get_the_post_meta('solarex_sub_title')); ?>
                            </p>

                            <?php 
                            $list_items = carbon_get_the_post_meta('solarex_list') ?: [];
                            if (!empty($list_items)): 
                            ?>
                                <ul class="servics-card-list pb-3" style="list-style-type: none; padding-left: 0;">
                                    <?php foreach ($list_items as $item): ?>
                                        <li>
                                            <span class="list-icon" style="margin-right: 10px; color: #71AC49">
                                                <i class="fa fa-arrow-right"></i>
                                            </span>
                                            <?php echo esc_html($item['solarex_list']); ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                            <a href="<?php echo esc_url(get_the_permalink()); ?>" class="learn-more-btn">
                                <?php esc_html_e('Learn More', 'solarex-core'); ?>
                            </a>
                        </div>
                    <?php elseif ($settings['solarex_card_design'] === '3'): ?>
                        <div class="ser-card p-3 d-flex flex-column justify-content-end" 
                             style="background-image: url('<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url() : 'https://placehold.co/625x360'; ?>');
                                    background-size: cover;
                                    background-position: center;
                                    min-height: 300px;">
                            <div class="solarex_card_content_3 p-3">
                                <h5 class="servics-card-title_3"><?php echo esc_html(get_the_title()); ?></h5>
                                <p class="mb-0"><?php echo esc_html(carbon_get_the_post_meta('solarex_sub_title')); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
        <?php
        wp_reset_postdata();
    }



}
