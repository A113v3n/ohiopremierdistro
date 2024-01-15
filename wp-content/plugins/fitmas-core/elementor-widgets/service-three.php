<?php namespace Elementor;

class service_three_widget extends Widget_Base {

    public function get_name() {

        return 'fitmas_service_three';
    }

    public function get_title() {
        return esc_html__( 'Fitmas Service V3', 'fitmascore' );
    }

    public function get_icon() {

        return 'eicon-shape';
    }

    public function get_categories() {
        return ['fitmascore'];
    }
    protected function register_controls() {

        //Content tab start
        $this->start_controls_section(
            'services_cotent_options',
            [
                'label' => __( 'Services', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new Repeater();
       
        $repeater->add_control(
            'icon',
            [
                'label'   => __( 'Icon', 'fitmascore' ),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
            'title',
            [
                'label'       => __( 'Title', 'fitmascore' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $repeater->add_control(
            'title_tag',
            [
                'label'   => __( 'Select Title Tag', 'fitmascore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'h3',
                'options' => [
                    'h1'   => __( 'H1', 'fitmascore' ),
                    'h2'   => __( 'H2', 'fitmascore' ),
                    'h3'   => __( 'H3', 'fitmascore' ),
                    'h4'   => __( 'H4', 'fitmascore' ),
                    'h5'   => __( 'H5', 'fitmascore' ),
                    'h6'   => __( 'H6', 'fitmascore' ),
                    'span' => __( 'Span', 'fitmascore' ),
                    'p'    => __( 'P', 'fitmascore' ),
                    'div'  => __( 'Div', 'fitmascore' ),
                ],
            ]
        );
        $repeater->add_control(
            'desc',
            [
                'label'   => __( 'Description', 'fitmascore' ),
                'type'    => Controls_Manager::TEXTAREA,
                'rows'    => 5,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $repeater->add_control(
            'btn_text',
            [
                'label'       => __( 'Button Text', 'fitmascore' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'Read More', 'fitmascore' ),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $repeater->add_control(
            'link',
            [
                'label'         => __( 'Link', 'fitmascore' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => __( 'htecos://your-link.com', 'fitmascore' ),
                'show_external' => true,
                'default'       => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'dynamic'       => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'services',
            [
                'label'       => __( 'Service List', 'fitmascore' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'title'       => esc_html__( 'Heart Pumping', 'fitmascore' ),
                        'desc'        => esc_html__( 'Lacinia montes est odio tpor volutpat rhoncus quisque sagittis', 'fitmascore' ),
                    ],
                    [
                        'title'       => esc_html__( 'Strength Training', 'fitmascore' ),
                        'desc'        => esc_html__( 'Lacinia montes est odio tpor volutpat rhoncus quisque sagittis', 'fitmascore' ),
                    ],
                    [
                        'title'       => esc_html__( 'Tons of Equipment', 'fitmascore' ),
                        'desc'        => esc_html__( 'Lacinia montes est odio tpor volutpat rhoncus quisque sagittis', 'fitmascore' ),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->add_control(
            'enable_full_container',
            [
                'label'        => esc_html__( 'Enable Full Container', 'fitmascore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'fitmascore' ),
                'label_off'    => esc_html__( 'Hide', 'fitmascore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'more_options',
            [
                'label'     => __( 'Service Column Settings', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'slide_show',
            [
                'label'   => esc_html__('Slide Show ', 'fitmascore'),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 10,
                'step'    => 1,
                'default' => 4,
            ]
        );
     
        $this->end_controls_section();

        // ------------ Service Box Style -----------
        
        $this->start_controls_section(
            'services_box',
            [
                'label' => esc_html__( 'Content Box Style', 'fitmascore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'services_section_tabs'
        );
        $this->start_controls_tab(
            'services_section_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'fitmascore' ),
            ]
        );
        $this->add_responsive_control(
			'box_align',
			[
				'label' => esc_html__( 'Alignment', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'fitmascore' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'fitmascore' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'fitmascore' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .service-card' => 'text-align: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .service-card',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .service-card',
            ]
        );
        $this->add_responsive_control(
            'services_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .service-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .service-card',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .service-card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .service-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'box_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'fitmascore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds_hover',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .service-card:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow_hover',
                'label'    => esc_html__( 'Box Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .service-card:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border_hover',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .service-card:hover',
            ]
        );

        $this->add_responsive_control(
            'border_radius_hover',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .service-card:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // *********************************************************
        //                Icon Style Css
        // *********************************************************

        $this->start_controls_section(
            'icon_css',
            [
                'label' => __( 'Icon Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'icon_size',
				'label' => __( 'Typography', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .service-card_icon',
			]
		);

        $this->add_responsive_control(
            'icon_width',
            [
                'label'      => esc_html__( 'Width', 'fitmascore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 300,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .service-card_icon' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_height',
            [
                'label'      => esc_html__( 'Height', 'fitmascore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 300,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .service-card_icon' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card_icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .service-card_icon',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_box_Shadow::get_type(),
            [
                'name'     => 'icon_shadow',
                'label'    => esc_html__( 'icon Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .service-card_icon',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .service-card_icon',
            ]
        );
        $this->add_responsive_control(
            'icon_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .service-card_icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .service-card_icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .service-card_icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'svg_size_note',
            [
                'label'     => __( 'SVG Icon Size', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'icon_svg_height',
            [
                'label'      => esc_html__( 'SVG Height', 'fitmascore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 300,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .service-card_icon svg' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_svg_width',
            [
                'label'      => esc_html__( 'SVG Width', 'fitmascore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 300,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .service-card_icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'services_svg_color_hover',
            [
                'label'     => esc_html__( 'Icon Hover Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card_icon svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        // -------------------------------
        //  ----- Title Control ----------
        // -------------------------------

        $this->start_controls_section(
            'title_style_options',
            [
                'label' => esc_html__( 'Title', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typo',
                'label'    => __( 'Typography', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .service-card_title',
            ]
        );

        $this->add_responsive_control(
            'title_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card_title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'title_border_color',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .service-card_title',
			]
		);
        $this->add_responsive_control(
            'title_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .service-card_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .service-card_title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // -------------------------------
        //  ----- Description Style----------
        // -------------------------------

        $this->start_controls_section(
            'des_style',
            [
                'label' => esc_html__( 'Description Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'dec_typo',
                'label'    => esc_html__( 'Typography', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .service-card_text',
            ]
        );
        $this->add_responsive_control(
            'dec_color',
            [
                'label'     => esc_html__( 'Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card_text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'dec_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .service-card_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dec_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .service-card_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //==================================//
        //======= Button Style css ============//
        //=================================//

        $this->start_controls_section(
            'button_CSS_options',
            [
                'label' => esc_html__( 'Button Style', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'button_text_typography',
                'selector' => '{{WRAPPER}} .service-card .link-btn',
            ]
        );
        $this->add_responsive_control(
            'button_text_color',
            [
                'label'     => esc_html__( 'Text Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card .link-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_text_color:hover',
            [
                'label'     => esc_html__( 'Hover Color', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card .link-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background',
                'label'    => esc_html__( 'Border Color', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .service-card_title a',
            ]
        );

        $this->end_controls_section();
    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        if ( $settings['enable_full_container'] == 'yes' ) {
            $container = 'container-fluid';
        } else {
            $container = 'container';
        }
        ob_start();
        ?>
        <div class="service-area-1  overflow-hidden">
            <div class="<?php echo esc_attr( $container ); ?> p-0">
                <div class="row global-carousel service-slider-1 style2" data-slide-show="<?php echo esc_attr( $settings['slide_show'] ); ?>" data-ml-slide-show="3" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="1" data-xs-slide-show="1" data-dots="false">
                    <?php foreach ( $settings['services'] as $item ): ?>    
                        <div class="col-lg-4 col-md-6">
                            <div class="service-card">
                                <div class="service-card_icon">
                                <?php \Elementor\Icons_Manager::render_icon( $item['icon'], ['aria-hidden' => 'true'] );?>
                                </div>
                                <div class="service-card_content">
                                <?php
                                    $url      = $item['link']['url'];
                                    $target   = $item['link']['is_external'] ? ' target="_blank"' : '';
                                    $nofollow = $item['link']['nofollow'] ? ' rel="nofollow"' : '';
                                ?>
                                    <<?php echo esc_attr( $item['title_tag'] ); ?> class="service-card_title h5"><a href="<?php echo esc_url($url); ?>"> <?php echo esc_html( $item['title'] ); ?> </a></<?php echo esc_attr( $item['title_tag'] ); ?>>
                                    <p class="service-card_text"> <?php echo esc_html( $item['desc'] ); ?> </p>
                                    <a href="<?php echo esc_url($url); ?>" <?php echo $target . $nofollow;?> class="link-btn" tabindex="0"><?php echo esc_html( $item['btn_text'] ); ?> <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <!--======== / Hero Section ========-->

    <?php
echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new service_three_widget );