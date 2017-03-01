<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bourbon-WP
 */

?>

	</div><!-- #content -->
 <!-- END CONTENT  -->

 <!-- FOOTER  -->
 	<footer id="colophon" class="site-footer" role="contentinfo">

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

		</div>
	</footer><!-- #colophon -->
 <!-- END FOOTER  -->

</div><!-- #page -->

<!-- BACK TO TOP BUTTON  -->
<a href="#" class="back-to-top" style="display: inline;">
	<i class="fa fa-long-arrow-up" aria-hidden="true"></i>
</a>
<!-- END BACK TO TOP BUTTON  -->

	<!-- +++++ NO SCRIPTS BEFORE THIS COMMENT +++++ -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
	<script>var templateDir = "<?php bloginfo('template_directory') ?>";</script>

	<!-- +++++ All SCRIPTS AFTER THIS COMMENT +++++ -->

	<!-- IMPORTS -->
	<script src="<?php echo get_template_directory_uri(); ?>/src/js/script.min.js"></script>

	<!-- CUSTOM -->

	<!-- END SCRIPT IMPORTS -->

<?php wp_footer(); ?>

</body>
</html>
