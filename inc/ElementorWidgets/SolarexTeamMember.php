<?php

namespace Solarex\Core\ElementorWidgets;
use Elementor\Controls_Manager;
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class SolarexTeamMember extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'solarex_team_member';
    }

    public function get_title()
    {
        return __('Solarex Team Member', 'solerex-core');
    }

    public function get_icon()
    {
        return 'eicon-person';
    }

    public function get_categories()
    {
        return ['solarex-elements'];
    }

    protected function register_controls(): void
    {
        // Content Tab
        $this->start_controls_section(
            'solarex_content_section',
            [
                'label' => esc_html__('Content', 'solerex-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'solarex_number_of_items',
            [
                'label' => __('Number of Posts', 'solarex-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3,
            ]
        );

        $this->end_controls_section();

        // Layout Section
        $this->start_controls_section(
            'solarex_layout_section',
            [
                'label' => __('Layout', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Responsive Column Control
        $this->add_responsive_control(
            'solarex_columns',
            [
                'label' => __('Columns per Row', 'solarex'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'tablet_default' => '2',
                'mobile_default' => '1',
                'options' => [
                    '1' => __('1 Column (Full Width)', 'solarex'),
                    '2' => __('2 Columns', 'solarex'),
                    '3' => __('3 Columns', 'solarex'),
                    '4' => __('4 Columns', 'solarex'),
                    '5' => __('5 Columns', 'solarex'),
                ],
            ]
        );

        $this->end_controls_section();

        // Card Style Section
        $this->start_controls_section(
            'solarex_card_style_section',
            [
                'label' => __('Card', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'solarex_card_style_selector',
            [
                'label' => __('Select Card Style', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'card-style-1',
                'options' => [
                    'card-style-1' => __('Card Style 1', 'solarex-core'),
                    'card-style-2' => __('Card Style 2', 'solarex-core'),
                ],
            ]
        );

        $this->add_control(
            'solarex_card_padding',
            [
                'label' => esc_html__('Card Padding', 'solarex-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'top' => '20',
                    'right' => '20',
                    'bottom' => '10',
                    'left' => '20',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .card-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        ); 
        // card body bg color 
        $this->add_control(
            'solarex_card_body_bg_color',
            [
                'label' => esc_html__('Card Body Background Color', 'solarex-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .card-body' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        // Title Style Section
        $this->start_controls_section(
            'solarex_title_style_section',
            [
                'label' => esc_html__('Title Style', 'solarex-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'solarex_title_typography',
                'label' => __('Typography', 'solarex-core'),
                'selector' => '{{WRAPPER}} .card-title',
            ]
        );

        $this->add_control(
            'solarex_title_color',
            [
                'label' => esc_html__('Title Color', 'solarex-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .card-body .card-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        // Designation Style Section
        $this->start_controls_section(
            'solarex_designation_style_section',
            [
                'label' => esc_html__('Designation Style', 'solarex-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'solarex_designation_typography',
                'label' => __('Typography', 'solarex-core'),
                'selector' => '{{WRAPPER}} .card-designation',
            ]
        );

        $this->add_control(
            'solarex_designation_color',
            [
                'label' => esc_html__('Designation Color', 'solarex-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .card-designation' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    // card style 1
    protected function render_card_style_1($image, $name, $position)
    {
        ?>
        <div class="team-card">
            <img src="<?php echo esc_url($image); ?>" class="img-fluid w-100" style="aspect-ratio: 4/4;"
                alt="<?php echo esc_attr($name); ?>">
            <div class="card-body">
                <a href="<?php echo esc_url(get_the_permalink()); ?>">
                    <h5 class="card-title"><?php echo esc_html($name); ?></h5>
                </a>
                <p class="card-designation"><?php echo esc_html($position); ?></p>
            </div>
        </div>
        <?php
    }

    // card style 2






    protected function render() {
        $settings = $this->get_settings_for_display();
        $number_of_items = $settings['solarex_number_of_items'];
        $card_style = $settings['solarex_card_style_selector'];
        
        // Get responsive column settings
        $desktop_columns = $settings['solarex_columns'] ?? '3';  // Added fallback
        $tablet_columns = $settings['solarex_columns_tablet'] ?? '2';  // Added fallback
        $mobile_columns = $settings['solarex_columns_mobile'] ?? '1';  // Added fallback
        
        // Build responsive column classes
        switch($desktop_columns) {
            case '1':
                $column_class = 'col-12';
                break;
            case '2':
                $column_class = 'col-12 col-sm-12 col-md-6';
                break;
            case '3':
                $column_class = 'col-12 col-sm-12 col-md-6 col-lg-4';
                break;
            case '4':
                $column_class = 'col-12 col-sm-12 col-md-3 col-lg-3';
                break;
            case '5':
                $column_class = 'col-12 col-sm-12 col-md-2 col-lg-2';
                break;
            default:
                $column_class = 'col-12 col-sm-12 col-md-4 col-lg-4';
        }

        $args = [
            'post_type' => 'solarex_team',
            'posts_per_page' => $number_of_items,
        ];

        $team_query = new \WP_Query($args);

        if (!$team_query->have_posts()) {
            esc_html_e('No team members found.', 'solerex-core');
            return;
        }
        ?>
        <div class="row solarex-team-container">
            <?php while ($team_query->have_posts()): $team_query->the_post(); 
                $image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                $name = get_the_title();
                $position = get_post_meta(get_the_ID(), 'position', true) ?: 'Team Member';
            ?>
                <div class="<?php echo esc_attr($column_class); ?> py-2">
                    <?php if ($card_style === 'card-style-1'): ?>
                        <div class="team-card">
                            <img src="<?php echo esc_url($image); ?>" 
                                 class="img-fluid w-100" 
                                 style="aspect-ratio: 4/4;"
                                 alt="<?php echo esc_attr($name); ?>">
                            <div class="card-body">
                                <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                    <h5 class="card-title"><?php echo esc_html($name); ?></h5>
                                </a>
                                <p class="card-designation"><?php echo esc_html($position); ?></p>
                            </div>
                        </div>

                    <?php elseif ($card_style === 'card-style-2'): ?>
                        <div class="team-card p-3 d-flex flex-column justify-content-end"
                             style="background-image: url(<?php echo esc_url($image); ?>); 
                                    background-size: cover;
                                    background-position: center;
                                    aspect-ratio: 4/5;">
                            <div class="p-3 h-75"></div>
                            <div class="p3 card-body">
                                <h4 class="card-title"><?php echo esc_html($name); ?></h4>
                                <p class="card-designation"><?php echo esc_html($position); ?></p>
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

