			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<div id="inner-footer" class="footer-container wrap cf">
					<section class="sociocon">
						<img class="icon" src="<?php echo get_template_directory_uri(); ?>/src/images/pinterest-sociocon.png" alt="link to Surfing Chef on Pinterest">
					</section>
					<section class="sociocon">
						<img class="icon" src="<?php echo get_template_directory_uri(); ?>/src/images/github-sociocon.png" alt="link to Surfing Chef on GitHub">
					</section>
					<section class="sociocon">
						<img class="icon" src="<?php echo get_template_directory_uri(); ?>/src/images/email-sociocon.png" alt="email Surfing Chef">
					</section>
					<section>
						<p class="source-org copyright"><?php bloginfo( 'name' ); ?> is powered by WordPress and maintained with love. &copy; <?php echo date('Y'); ?> Surfing-Chef.</p>
					</section>

					<!-- <nav role="navigation">
						<?php wp_nav_menu(array(
    					// 'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
    					// 'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
    					// 'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
    					// 'menu_class' => 'nav footer-nav cf',            // adding custom nav class
    					// 'theme_location' => 'footer-links',             // where it's located in the theme
    					// 'before' => '',                                 // before the menu
    					// 'after' => '',                                  // after the menu
    					// 'link_before' => '',                            // before each link
    					// 'link_after' => '',                             // after each link
    					// 'depth' => 0,                                   // limit the depth of the nav
    					// 'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
						)); ?>
					</nav>

					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p> -->

				</div>

			</footer>

		<!-- </div> -->

		<?php // all js scripts are loaded in src/bones.php ?>
		<script>var templateDir = "<?php bloginfo('template_directory') ?>";</script>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
