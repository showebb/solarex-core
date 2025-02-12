<?php
namespace Solarex\Core\ElementorWidgets;

if (!defined('ABSPATH')) {
    exit; 
}

class SolarexBreadcrumb extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'solarex_breadcrumb';
    }

    public function get_title()
    {
        return __('Breadcrumb', 'solarex-core');
    }

    public function get_icon()
    {
        return 'eicon-breadcrumbs';
    }

    public function get_categories()
    {
        return ['solarex-elements'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'auto_section',
            [
                'label' => __('Breadcrumb', 'plugin-name'),
            ]
        );

        $this->add_control(
            'solarex_breadcrumb',
            [
                'label' => esc_html__('Breadcrumb Type', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'auto' => esc_html__('Auto', 'solarex-core'),
                    'custom' => esc_html__('Custom', 'solarex-core'),
                ],
                'default' => 'auto',
            ]
        );

        // Active page color control
        $this->add_control(
            'active_color',
            [
                'label' => __('Active Color', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FF0000',
                'condition' => [
                    'solarex_breadcrumb' => esc_html__('auto', 'solarex-core'),
                ]
            ]
        );


        $this->add_control(
            'custom_breadcrumbs',
            [
                'label' => __('Custom Breadcrumbs', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'breadcrumb_title',
                        'label' => __('Breadcrumb Title', 'solarex-core'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __('Breadcrumb', 'solarex-core'),
                    ],
                    [
                        'name' => 'breadcrumb_color',
                        'label' => __('Breadcrumb Color', 'solarex-core'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => '#FF0000',
                    ],
                    [
                        'name' => 'breadcrumb_url',
                        'label' => __('Breadcrumb URL', 'solarex-core'),
                        'type' => \Elementor\Controls_Manager::URL,
                        'placeholder' => __('https://your-link.com', 'solarex-core'),
                    ],
                ],
                'condition' => [
                    'solarex_breadcrumb' => 'custom',
                ],
                'title_field' => '{{{ breadcrumb_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'solarex_breadcrumb_typography',
            [
                'label' => __('Typography', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .breadcrumb_title_size',
            ]
        );

        $this->end_controls_section(); 

    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $active_color = !empty($settings['active_color']) ? $settings['active_color'] : '#FF0000';
        $breadcrumb_type = $settings['solarex_breadcrumb'];

        // Set home page title and current page title
        $home_page_id = get_option('page_on_front');
        $home_page_title = get_the_title($home_page_id);
        $current_page_title = get_the_title();

        $settings['home_page_title'] = $home_page_title; 
        $settings['current_page_title'] = $current_page_title; 

        if ($breadcrumb_type === 'auto') {
            ?>
            <div class="auto-breadcrumbs">
                <span><a href="<?php echo esc_url(home_url()); ?>"><?php echo esc_html($home_page_title); ?></a></span> /&nbsp;
                <span style="color: <?php echo esc_attr($active_color); ?>"><?php echo esc_html($current_page_title); ?></span>
            </div>
            <?php
        }


        elseif ($breadcrumb_type === 'custom') {
            ?>
            <div class="custom-breadcrumbs">
                <?php
                if (!empty($settings['custom_breadcrumbs'])) {
                    foreach ($settings['custom_breadcrumbs'] as $breadcrumb) {
                        $breadcrumb_title = $breadcrumb['breadcrumb_title'];
                        $breadcrumb_url = !empty($breadcrumb['breadcrumb_url']['url']) ? $breadcrumb['breadcrumb_url']['url'] : '#';
                        $breadcrumb_color = !empty($breadcrumb['breadcrumb_color']) ? $breadcrumb['breadcrumb_color'] : '#FF0000'; // Default color
    
                        echo '<span><a class="breadcrumb_title_size" href="' . esc_url($breadcrumb_url) . '" style="color: ' . esc_attr($breadcrumb_color) . ';">' . esc_html($breadcrumb_title) . '</a></span> /&nbsp;';
                    }
                } else {
                    // Default breadcrumb when no custom breadcrumbs are set
                    echo '<span><a href="' . esc_url(home_url()) . '" style="color: green;">' . esc_html($home_page_title) . '</a></span> /&nbsp;';
                    echo '<span style="color: green;">' . esc_html($current_page_title) . '</span>';
                }
                ?>
            </div>
            <?php
        }
    }



}
