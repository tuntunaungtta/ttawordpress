	            	<footer class="footer footer-big">
	            		<div class="container">

							<?php get_template_part( 'template-parts/footer-widget-4-columns' ); ?>

	            			<hr class="footer-divider"/>
	            			
							<?php if ( has_nav_menu( 'social' ) ) : ?>
									<?php
										wp_nav_menu(
											array(
												'theme_location' => 'social',
												'menu_class'     => 'social-media-buttons',
												'depth'          => 1,
												'link_before'    => '',
												'link_after'     => '',
											)
										);
									?>
							
							<?php endif; ?>


<?php
	if(cinder_has_footer_copyright_text()):
?>
	            			<div class="copyright pull-center">
	            				<?php cinder_footer_copyright_text(); ?>
	            			</div>

<?php else: ?>
					<?php if(is_customize_preview()): ?>
	            			<div class="copyright pull-center">
	            				<?php esc_html_e('Copyright text placeholder. Leave empty if not using','cinder'); ?>
	            			</div>
	            	<?php endif; ?>
<?php endif; ?>

	
	            		</div>
	            	</footer>