<?php
namespace Solarex\Core\ElementorWidgets;

use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Icons_Manager;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class SolarexChooseUs extends Widget_Base
{

    public function get_name()
    {
        return 'solarex-choose-us';
    }

    public function get_title()
    {
        return __('Choose Us', 'solarex-core');
    }

    public function get_icon()
    {
        return 'eicon-info-box';
    }

    public function get_categories()
    {
        return ['solarex-elements']; // Change as per your needs
    }

    protected function register_controls()
    {
        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'solarex-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        // Add Media Type Selector
        $repeater->add_control(
            'media_type',
            [
                'label' => esc_html__('Media Type', 'solarex-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'image',
                'options' => [
                    'image' => esc_html__('Image', 'solarex-core'),
                    'icon' => esc_html__('Icon', 'solarex-core'),
                ],
            ]
        );

        // Image Control
        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'solarex-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/images/choose-user-multiple-02.png',  // Empty default
                ],
                'condition' => [
                    'media_type' => 'image',
                ],
            ]
        );

        // Icon Control
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'solarex-core'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-dollar-sign',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'media_type' => 'icon',
                ],
            ]
        );

        // Title Control
        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'solarex-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Significant Savings on Energy Bills', 'solarex-core'),
            ]
        );

        // Description Control
        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'solarex-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 3,
                'default' => esc_html__('Cut costs drastically with reliable, low-maintenance solar energy solutions.', 'solarex-core'),
            ]
        );

        // Features List Control
        $this->add_control(
            'features',
            [
                'label' => esc_html__('Features List', 'solarex-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'media_type' => 'icon',
                        'icon' => [
                            'value' => 'fas fa-dollar-sign',
                            'library' => 'fa-solid',
                        ],
                        'title' => esc_html__('Significant Savings on Energy Bills', 'solarex-core'),
                        'description' => esc_html__('Cut costs drastically with reliable, low-maintenance solar energy solutions.', 'solarex-core'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        // Style Tab
        $this->start_controls_section(
            'style_icon',
            [
                'label' => __('Icon', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Icon Style Heading
        $this->add_control(
            'icon_style_heading',
            [
                'label' => esc_html__('Icon Style', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Icon Controls
        $this->add_control(
            'icon_color',
            [
                'label' => __('Color', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#70ac48',
                'selectors' => [
                    '{{WRAPPER}} .icon-box i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_size',
            [
                'label' => __('Size', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => ['min' => 10, 'max' => 100],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_margin',
            [
                'label' => esc_html__('Margin', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default' => [
                    'top' => 0,
                    'right' => 12,
                    'bottom' => 0,
                    'left' => 0,
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_spacing',
            [
                'label' => esc_html__('Spacing', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default' => [
                    'unit' => 'px',
                    'size' => 12,
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box i' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'content_style',
            [
                'label' => __('Single Container', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->end_controls_section();

        // Style Tab
        $this->start_controls_section(
            'image_style',
            [
                'label' => __('Image Style', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );


        // add a slider for image size
        $this->add_responsive_control(
            'image_size',
            [
                'label' => __('Image Size', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => ['min' => 0, 'max' => 100],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 33,
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // image margin right
        $this->add_control(
            'image_spacing',
            [
                'label' => __('Image Spacing', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default' => [
                    'unit' => 'px',
                    'size' => 12,
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box img' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'container_style',
            [
                'label' => __('Container', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'container_bg_color',
            [
                'label' => __('Background Color', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .solar-chosse-us-container' => 'background-color: {{VALUE}};',
                    // '{{WRAPPER}} .solarex_chosse_us_container' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'container_display',
            [
                'label' => __('Display', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'block' => __('Block', 'solarex-core'),
                    'flex' => __('Flex', 'solarex-core'),
                ],
                'default' => 'block',
                'selectors' => [
                    '{{WRAPPER}} .solarex_chosse_us_container' => 'display: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'box_spacing',
            [
                'label' => __('Box Spacing', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default' => [
                    'unit' => 'px',
                    'size' => 12,
                ],
                'selectors' => [
                    '{{WRAPPER}} .solar-chosse-us-main-container' => 'display: flex; flex-direction: column; gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();

        // Box Style Section
        $this->start_controls_section(
            'solarex_box_style_section',
            [
                'label' => __('Box Style', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Box Style Toggle
        $this->add_control(
            'solarex_box_style_toggle',
            [
                'label' => esc_html__('Box Style', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'label_off' => esc_html__('Default', 'solarex-core'),
                'label_on' => esc_html__('Custom', 'solarex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->start_popover();

        $this->add_responsive_control(
            'solarex_box_padding',
            [
                'label' => esc_html__('Padding', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => '24',
                    'right' => '24',
                    'bottom' => '24',
                    'left' => '24',
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .solarex_chosse_us_container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_control(
            'container_flex_direction',
            [
                'label' => __('Flex Direction', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'row' => __('Row', 'solarex-core'),
                    'row-reverse' => __('Row Reverse', 'solarex-core'),
                    'column' => __('Column', 'solarex-core'),
                    'column-reverse' => __('Column Reverse', 'solarex-core'),
                ],
                'default' => 'row',
                'condition' => [
                    'container_display' => 'flex',
                ],
                'selectors' => [
                    '{{WRAPPER}} .solar-chosse-us-container' => 'flex-direction: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'solarex_box_border_radius',
            [
                'label' => esc_html__('Border Radius', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default' => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .solarex_chosse_us_container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'container_align_items',
            [
                'label' => __('Align Items', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'flex-start' => __('Flex Start', 'solarex-core'),
                    'center' => __('Center', 'solarex-core'),
                    'flex-end' => __('Flex End', 'solarex-core'),
                    'stretch' => __('Stretch', 'solarex-core'),
                ],
                'default' => 'stretch',
                'condition' => [
                    'container_display' => 'flex',
                ],
                'selectors' => [
                    '{{WRAPPER}} .solarex_chosse_us_container' => 'align-items: {{VALUE}};',
                ],
            ]
        );

        $this->end_popover();

        $this->end_controls_section();

        // Title Style Section
        $this->start_controls_section(
            'solarex_title_style_section',
            [
                'label' => __('Title Style', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Title Style Toggle
        $this->add_control(
            'solarex_title_style_toggle',
            [
                'label' => esc_html__('Title Style', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'label_off' => esc_html__('Default', 'solarex-core'),
                'label_on' => esc_html__('Custom', 'solarex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $this->add_control(
            'solarex_title_color',
            [
                'label' => esc_html__('Color', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .solarex_chosse_us_container h5' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'container_justify_content',
            [
                'label' => __('Justify Content', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'flex-start' => __('Flex Start', 'solarex-core'),
                    'center' => __('Center', 'solarex-core'),
                    'flex-end' => __('Flex End', 'solarex-core'),
                    'space-between' => __('Space Between', 'solarex-core'),
                    'space-around' => __('Space Around', 'solarex-core'),
                    'space-evenly' => __('Space Evenly', 'solarex-core'),
                ],
                'default' => 'flex-start',
                'condition' => [
                    'container_display' => 'flex',
                ],
                'selectors' => [
                    '{{WRAPPER}} .solarex_chosse_us_container' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [

                'name' => 'solarex_title_typography',
                'selector' => '{{WRAPPER}} .solarex_chosse_us_container h5',
            ]
        );

        $this->add_responsive_control(
            'container_gap',
            [
                'label' => __('Gap', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => ['min' => 0, 'max' => 100],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'condition' => [
                    'container_display' => 'flex',
                ],
                'selectors' => [
                    '{{WRAPPER}} .solarex_chosse_us_container' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'solarex_title_spacing',
            [
                'label' => esc_html__('Spacing', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'default' => [

                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .solarex_chosse_us_container h5' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'container_margin',
            [
                'label' => esc_html__('Margin', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default' => [
                    'top' => 9,
                    'right' => 0,
                    'bottom' => 12,
                    'left' => 0,
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .solarex_chosse_us_container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->end_controls_section();

        // Description Style Section
        $this->start_controls_section(
            'solarex_description_style_section',
            [
                'label' => __('Description Style', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Description Style Toggle
        $this->add_control(
            'solarex_description_style_toggle',
            [
                'label' => esc_html__('Description Style', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'label_off' => esc_html__('Default', 'solarex-core'),
                'label_on' => esc_html__('Custom', 'solarex-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $this->add_control(
            'solarex_description_color',
            [
                'label' => esc_html__('Color', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#666666',
                'selectors' => [
                    '{{WRAPPER}} .solarex_chosse_us_container p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'solarex_description_typography',
                'selector' => '{{WRAPPER}} .solarex_chosse_us_container p',
            ]
        );

        $this->add_responsive_control(
            'solarex_description_spacing',
            [
                'label' => esc_html__('Spacing', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .solarex_chosse_us_container p' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="d-flex flex-column justify-content-between pt-4 pt-md-0 solar-chosse-us-main-container">
            <?php
            foreach ($settings['features'] as $item) {
                ?>
                <div class="d-flex solarex_chosse_us_container">
                    <div class="icon-box">
                        <?php if ($item['media_type'] === 'image'): ?>
                            <?php
                            if (!empty($item['image']['url'])) {
                                echo '<img src="' . esc_url($item['image']['url']) . '" alt="' . esc_attr($item['title']) . '">';
                            }
                            ?>
                        <?php else: ?>
                            <?php if (!empty($item['icon']['value'])): ?>
                                <i class="<?php echo esc_attr($item['icon']['value']); ?>"></i>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <div class="ml-3">
                        <h5><?php echo esc_html($item['title']); ?></h5>
                        <p class="mb-0"><?php echo esc_html($item['description']); ?></p>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    }

}
