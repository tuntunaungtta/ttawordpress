	<nav class="navbar navbar-transparent <?php cinder_header_menu_style_class(); ?>">	    
    	<div class="container">
	    		<?php if(has_custom_logo()): ?>
		    		<div class="logo"><?php the_custom_logo(); ?></div>
		    	<?php else: ?>
        			<a class="navbar-brand" href="<?php echo esc_url(home_url()); ?>"><?php echo esc_html(get_bloginfo('name')); ?> <br/> <span class="tagline"><?php bloginfo('description'); ?></span></a>
        		<?php endif; ?>
        		
        		<button class="search-form-icon btn btn-simple pull-right" data-toggle="modal" data-target="#searchModal"><i class="fa fa-search"></i></button>

									        <?php
									            wp_nav_menu( array(
									                'theme_location'    => 'header-menu',
									                'depth'             => 4,
									                'container'         => 'div',
									                'container_class'   => 'header-menu-container pull-right',
									       			'container_id'      => 'header-menu',
									                'menu_class' => 'sf-menu',
									                'fallback_cb' => 'cinder_fallback_menu',
									                )
									            );
									        ?>
    	</div>
	    	<div id='mobile_menu'></div>
			
				<?php
				    wp_nav_menu( array(
				        'theme_location'    => 'mobile',
				        'depth'             => 4,
				        'container'         => 'div',
				        'container_class'   => 'menu-mobile-menu-container',
				    	'container_id'      => '',
				        'menu_class' => '',
				        'menu_id' => 'menu-mobile-menu',
				        'fallback_cb' => '',
				        )
				    );
				?>
    </nav>