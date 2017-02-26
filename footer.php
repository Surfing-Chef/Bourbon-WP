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
<?php wp_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
<script>var templateDir = "<?php bloginfo('template_directory') ?>";</script>
</body>
</html>
