<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package JSLTheme
 */

?>

<footer id="colophon" class="site-footer">
    <div class="container"><?php echo  get_field('footer_copyright_text', 'option'); ?></div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>