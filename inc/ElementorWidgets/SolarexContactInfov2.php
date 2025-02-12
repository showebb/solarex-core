<?php
namespace Solarex\Core\ElementorWidgets;

use Elementor\Controls_Manager;


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class SolarexContactInfo extends \Elementor\Widget_Base {

    public function get_name() {
        return 'solarex_contact_info';
    }

    public function get_title() {
        return 'Solarex Contact Info';
    }

    public function get_icon() {
        return 'eicon-person';
    }

    public function get_categories() {
        return ['solarex-elements'];
    }

    protected function _register_controls() {
        // Add controls for the widget
        // Background Image Control
        $this->add_control(
            'solarex_contact_info_background_image',
            [
                'label' => __('Background Image', 'solarex-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://placehold.co/625x566',
                ],
            ]
        );

        // Phone Number
        $this->add_control(
            'solarex_contact_info_phone_number',
            [
                'label' => __('Phone Number', 'solarex-core'),
                'type' => Controls_Manager::TEXT,
                'default' => '(123) 456-7890',
            ]
        );

        // Phone Icon
        $this->add_control(
            'solarex_contact_info_phone_icon',
            [
                'label' => __('Phone Icon', 'solarex-core'),
                'type' => Controls_Manager::ICONS,
                'fa5_default' => [
                    'value' => 'fas fa-phone',
                    'library' => 'fa-solid',
                ],
            ]
        );

        // Email Address
        $this->add_control(
            'solarex_contact_info_email_address',
            [
                'label' => __('Email Address', 'solarex-core'),
                'type' => Controls_Manager::TEXT,
                'default' => 'info@smithjohnson.com',
            ]
        );

        // Email Icon
        $this->add_control(
            'solarex_contact_info_email_icon',
            [
                'label' => __('Email Icon', 'solarex-core'),
                'type' => Controls_Manager::ICONS,
                'fa5_default' => [
                    'value' => 'fas fa-envelope',
                    'library' => 'fa-solid',
                ],
            ]
        );

        // Section Layout (Flex)
        $this->add_control(
            'solarex_contact_info_layout',
            [
                'label' => __('Section Layout', 'solarex-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'column' => __('Column', 'solarex-core'),
                    'row' => __('Row', 'solarex-core'),
                ],
                'default' => 'row',
            ]
        );

        // Padding & Margin
        $this->add_control(
            'solarex_contact_info_padding',
            [
                'label' => __('Padding', 'solarex-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .contact-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_control(
            'solarex_contact_info_margin',
            [
                'label' => __('Margin', 'solarex-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .contact-bg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Prepare contact section attributes
        $contact_section_attrs = [
            'class' => 'contact-bg d-flex ' . ($settings['solarex_contact_info_layout'] == 'row' ? 'flex-md-row' : 'flex-column') . ' justify-content-end align-items-end gap-5',
            'style' => 'background-image: url(' . esc_url($settings['solarex_contact_info_background_image']['url']) . ');',
        ];

        $this->add_render_attribute('contact_section', $contact_section_attrs);

        // Phone Info
        $phone_info = [
            'icon' => $settings['solarex_contact_info_phone_icon']['value'],
            'title' => __('Call Us', 'solarex-core'),
            'content' => esc_html($settings['solarex_contact_info_phone_number']),
        ];

        // Email Info
        $email_info = [
            'icon' => $settings['solarex_contact_info_email_icon']['value'],
            'title' => __('Email Us', 'solarex-core'),
            'content' => esc_html($settings['solarex_contact_info_email_address']),
        ];

        ?>
        <div <?php echo $this->get_render_attribute_string('contact_section'); ?>>
            <?php foreach ([$phone_info, $email_info] as $info): ?>
                <ul class="list-unstyled bg-white p-4 w-100">
                    <li class="d-flex align-items-start">
                        <i class="<?php echo esc_attr($info['icon']); ?> me-3 pt-2" title="<?php echo esc_attr($info['title']); ?>"></i>
                        <div>
                            <h5 class="mb-1"><?php echo esc_html($info['title']); ?></h5>
                            <p class="mb-0"><?php echo $info['content']; ?></p>
                        </div>
                    </li>
                </ul>
            <?php endforeach; ?>
        </div>
        <?php
    }

    protected function _content_template() {
        ?>
        <div class="contact-bg">
            <# 
            var phoneIcon = settings.solarex_contact_info_phone_icon.value;
            var phoneNumber = settings.solarex_contact_info_phone_number;
            var emailIcon = settings.solarex_contact_info_email_icon.value;
            var emailAddress = settings.solarex_contact_info_email_address;
            #>

            <div class="d-flex <# if( settings.solarex_contact_info_layout === 'row' ) { #> flex-md-row <# } else { #> flex-column <# } #> justify-content-end align-items-end gap-5" style="background-image: url({{ settings.solarex_contact_info_background_image.url }});">
                <ul class="list-unstyled bg-white p-4 w-100">
                    <li class="d-flex align-items-start">
                        <i class="{{ phoneIcon }} me-3 pt-2" title="Phone"></i>
                        <div>
                            <h5 class="mb-1">Call Us</h5>
                            <p class="mb-0">{{ phoneNumber }}</p>
                        </div>
                    </li>
                </ul>

                <ul class="list-unstyled bg-white p-4 w-100">
                    <li class="d-flex align-items-start">
                        <i class="{{ emailIcon }} me-3 pt-2" title="Email"></i>
                        <div>
                            <h5 class="mb-1">Email Us</h5>
                            <p class="mb-0">{{ emailAddress }}</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <?php
    }
}
