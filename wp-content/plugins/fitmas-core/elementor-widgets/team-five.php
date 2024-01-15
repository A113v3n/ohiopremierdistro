<?php namespace Elementor;

class fitmas_Team_five_Widget extends Widget_Base {

    public function get_name() {

        return 'fitmas_Team_five';
    }

    public function get_title() {
        return esc_html__( 'Fitmas Team V5', 'fitmascore' );
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
            'team_options',
            [
                'label' => esc_html__( 'Team Members', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'enable_container',
            [
                'label'        => esc_html__( 'Enable Container', 'fitmascore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'fitmascore' ),
                'label_off'    => esc_html__( 'Hide', 'fitmascore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'orderby',
            [
                'label' => esc_html__( 'Order by', 'fitmascore' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none'          => esc_html__('none','fitmascore'),
                    'ID'            => esc_html__('ID','fitmascore'),
                    'date'          => esc_html__('Date','fitmascore'),
                    'name'          => esc_html__('Name','fitmascore'),
                    'title'         => esc_html__('Title','fitmascore'),
                    'comment_count' => esc_html__('Comment count','fitmascore'),
                    'rand'          => esc_html__('Random','fitmascore'),
                ],
            ]
        );
        $this->add_control(
            'order',
            [
                'label'   => esc_html__( 'Order', 'fitmascore' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'DESE',
                'options' => [
                    'ASC'  => esc_html__( 'ASC', 'fitmascore' ),
                    'DESE' => esc_html__( 'DESE', 'fitmascore' ),
                ],
            ]
        );

        $this->add_control(
            'display_item',
            [
                'label' => esc_html__( 'Display Items', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 100,
                'step' => 1,
            ]
        );
         $this->add_control(
            'pagination',
            [
                'label' => esc_html__( 'Enable Pagination', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'fitmascore' ),
                'label_off' => esc_html__( 'Hide', 'fitmascore' ),
                'return_value' => 'yes',
                'default' => 'no',
                
            ]
        );
        $this->add_control(
            'desktop_col',
            [
                'label'     => __( 'Columns On Desktop', 'fitmascore' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'col-xl-4',
                'options'   => [
                    'col-xl-12' => __( '1 Column', 'fitmascore' ),
                    'col-xl-6'  => __( '2 Column', 'fitmascore' ),
                    'col-xl-4'  => __( '3 Column', 'fitmascore' ),
                    'col-xl-3'  => __( '4 Column', 'fitmascore' ),
                    'col-xl-2'  => __( '6 Column', 'fitmascore' ),
                ],
            ]
        );

        $this->add_control(
            'laptop_col',
            [
                'label'     => __( 'Columns for Laptop', 'fitmascore' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'col-lg-4',
                'options'   => [
                    'col-lg-12' => __( '1 Column', 'fitmascore' ),
                    'col-lg-6'  => __( '2 Column', 'fitmascore' ),
                    'col-lg-4'  => __( '3 Column', 'fitmascore' ),
                    'col-lg-3'  => __( '4 Column', 'fitmascore' ),
                    'col-lg-2'  => __( '6 Column', 'fitmascore' ),
                ],
            ]
        );

        $this->add_control(
            'tab_col',
            [
                'label'     => __( 'Columns On Tablet', 'fitmascore' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'col-md-6',
                'options'   => [
                    'col-md-12' => __( '1 Column', 'fitmascore' ),
                    'col-md-6'  => __( '2 Column', 'fitmascore' ),
                    'col-md-4'  => __( '3 Column', 'fitmascore' ),
                    'col-md-3'  => __( '4 Column', 'fitmascore' ),
                    'col-md-2'  => __( '6 Column', 'fitmascore' ),
                ],
            ]
        );
        $this->end_controls_section();
        //  ---------------------------------------------------
        // -------------- Box Style---------------------------
        //  ---------------------------------------------------
        $this->start_controls_section(
            'box_css_options',
            [
                'label' => esc_html__( 'Box', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_bg',
                'label'    => esc_html__( 'Background', 'fitmascore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .team-card2',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .team-card2',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .team-card2',
            ]
        );
        $this->add_responsive_control(
            'box_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'fitmascore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .team-card2' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-card2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .team-card2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
       
        $this->end_controls_section();

        $this->start_controls_section(
            'image_css',
            [
                'label' => esc_html__( 'Image', 'fitmascore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'image_height',
            [
                'label'      => esc_html__( 'Height', 'fitmascore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 800,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .team-card2 .team-card_img img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		 $this->add_responsive_control(
            'min-image_height',
            [
                'label'      => esc_html__( 'Main Height', 'fitmascore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 800,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .team-card2 .team-card_img img' => 'main-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_width',
            [
                'label'      => esc_html__( 'Width', 'fitmascore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 800,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .team-card2 .team-card_img img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		        $this->add_responsive_control(
            'main_image_width',
            [
                'label'      => esc_html__( 'Main Width', 'fitmascore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 800,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .team-card2 .team-card_img img' => 'main-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'object',
            [
                'label'     => esc_html__( 'Object Fit', 'fitmascore' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'cover',
                'options'   => [
                    'fill'    => esc_html__( 'Fill', 'fitmascore' ),
                    'contain' => esc_html__( 'Contain', 'fitmascore' ),
                    'cover'   => esc_html__( 'Cover', 'fitmascore' ),
                    'ntwo'    => esc_html__( 'Ntwo', 'fitmascore' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-card2 .team-card_img img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'image_border',
                'label'    => esc_html__( 'Border', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .team-card2 .team-card_img img',
            ]
        );

        $this->add_responsive_control(
            'image_radius',
            [
                'label'      => esc_html__( 'image Radius', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-card2 .team-card_img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'image_shadow',
                'label'    => esc_html__( 'Shadow', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .team-card2 .team-card_img img ',
            ]
        );
        $this->add_responsive_control(
            'image_margin',
            [
                'label'      => esc_html__( 'Margin', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-card2 .team-card_img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_padding',
            [
                'label'      => esc_html__( 'Padding', 'fitmascore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-card2 .team-card_img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
            // 
		// ----------------Title Style------------------
        // 

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
				'name' => 'title_typo',
				'label' => __( 'Typography', 'fitmascore' ),
				'selector' => '
                    {{WRAPPER}} .team-card2 .team-card_title',
			]
		);

		$this->add_responsive_control(
			'title_color',
			[
				'label'       => esc_html__('Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-card2 .team-card_title a' => 'color: {{VALUE}};',
                    
				],
			]
		);
		$this->add_responsive_control(
			'title_color-hover',
			[
				'label'       => esc_html__('Hover Color', 'fitmascore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-card2 .team-card_title a:hover' => 'color: {{VALUE}};',
                    
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
                'label'       => esc_html__('Border Color', 'fitmascore'),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .team-card2 .team-card_title a',
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => esc_html__( 'Margin', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .team-card2 .team-card_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'title_padding',
			[
				'label'      => esc_html__( 'Padding', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .team-card2 .team-card_title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

        // 
		// ----------------Designation Style------------------
        // 

        $this->start_controls_section(
			'hero_options',
			[
				'label' => esc_html__('Designation', 'fitmascore'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'designation_typo',
                'label' => esc_html__( 'Typography', 'fitmascore' ),
                'selector' => '{{WRAPPER}} .team-card2 .team-card_subtitle',
            ]
        );
        $this->add_responsive_control(
            'designation_color',
            [
                'label' => esc_html__( 'Color', 'fitmascore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-card2 .team-card_subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'designation_margin',
            [
                'label' => esc_html__( 'Margin', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .team-card2 .team-card_subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'designation_padding',
            [
                'label' => esc_html__( 'Padding', 'fitmascore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .team-card2 .team-card_subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //
  		// ----------------Number icon Style Style------------------
        // 
        $this->start_controls_section(
			'counter_number',
			[
				'label' => esc_html__( 'Number CSS', 'fitmascore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'number_color',
			[
				'label'     => esc_html__( 'Number Color', 'fitmascore' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-card2.style2 .team-card_link' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'number_title_typo',
				'label'    => esc_html__( 'Number Typography', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .team-card2.style2 .team-card_link',
			]
		);
        $this->add_control(
			'more_options',
			[
				'label' => esc_html__( 'Icon Options', 'fitmascore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_responsive_control(
			'icon_color',
			[
				'label'     => esc_html__( 'Icon Color', 'fitmascore' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-card2.style2 .team-card_link i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'icon_typo',
				'label'    => esc_html__( 'Number Typography', 'fitmascore' ),
				'selector' => '{{WRAPPER}} .team-card2.style2 .team-card_link i',
			]
		);
		$this->add_responsive_control(
			'number_margin',
			[
				'label'      => esc_html__( 'Number Margin', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [ '{{WRAPPER}} .team-card2.style2 .team-card_link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                'separator' => 'before',
            ],
			]
		);
		$this->add_responsive_control(
			'number_padding',
			[
				'label'      => esc_html__( 'Number Padding', 'fitmascore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [ '{{WRAPPER}} .team-card2.style2 .team-card_link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        $column = $settings['desktop_col'] . ' ' . $settings['laptop_col'] . ' ' . $settings['tab_col'] . ' col-12';
        $unique = rand( 1241, 3256 );
        if ( $settings['enable_container'] == 'yes' ) {
            $container = 'container';
        } else {
            $container = 'container-fluid';
        }

        global $post;
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $p = new \WP_Query(array(
            'posts_per_page' =>esc_attr($settings['display_item']),
            'post_type' => 'fitmas_team',
            'paged'     => $paged,
            'orderby'     => esc_attr($settings['orderby']),
            'order'     => esc_attr($settings['order']),
        ));
        ob_start();
        ?>
    <div class="team-area-1 ">
            <div class="<?php echo esc_attr( $container ); ?>">
                <div class="row gy-4">
                <?php while($p->have_posts()) : $p->the_post(); 
                    $unique = get_the_ID();
                    $team_meta = get_post_meta( $unique, 'fitmas_teammeta', true );  
                ?>
                        <div class="<?php echo esc_attr( $column ); ?>">
                            <div class="team-card2 style2">
                                <?php if ( has_post_thumbnail() ): ?>
                                    <div class="team-card_img">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                <?php endif;?>
                                <div class="team-card_content">
                                    <?php if(!empty($team_meta['fitmas_team_stitle'])) : ?>
                                        <span class="team-card_subtitle"><?php  echo esc_html($team_meta['fitmas_team_stitle']);?></span>
                                    <?php endif;?>
                                    <h4 class="team-card_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    
                                    <?php if(!empty($team_meta['fitmas_contact_info'])) : ?>
                                        <?php foreach($team_meta['fitmas_contact_info'] as $contact ) : ?>
                                            <a class="team-card_link">
                                                <i class="<?php echo esc_attr($contact['fitmas_contact_info_icon']); ?>"> </i>
                                                <?php  echo esc_html($contact['fitmas_contact_info_number']);?>
                                            </a>
                                        <?php endforeach; ?>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); wp_reset_query(); ?>
                </div>
				<?php if($settings['pagination'] == 'yes' ) { ?>
                        <?php fitmascore_paginate_nav($p); ?>
                    <?php } ?>
            </div>
        </div>
        <?php
        echo ob_get_clean();

    }
}
Plugin::instance()->widgets_manager->register( new fitmas_Team_five_Widget );