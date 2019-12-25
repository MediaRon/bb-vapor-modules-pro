<?php
/**
 * FAQ module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
<div class="fl-bbvm-faq-for-beaverbuilder">
<?php
if ( 'yes' === $settings->toc && count( $settings->faq ) > 0 ) :
	?>
	<ul class="bbvm-faq">
	<?php
	foreach ( $settings->faq as $faq ) :
		printf( '<li><a href="#%s">%s</a></li>', esc_attr( sanitize_title( $faq->faq ) ), esc_html( $faq->faq ) );
	endforeach;
	?>
	</ul>
	<?php
endif;
// Output Schema Markup if enabled.
if ( 'yes' === $settings->schema ) :
	?>
	<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "FAQPage",
		"mainEntity": [
			<?php
			$faq_count = 1;
			foreach ( $settings->faq as $faq ) {
				?>
				{
					"@type": "Question",
					"name": "<?php echo esc_attr( wp_strip_all_tags( $faq->faq ) ); ?>",
					"acceptedAnswer": {
						"@type": "Answer",
						"text": "<?php echo esc_attr( wp_strip_all_tags( $faq->faq_text, true ) ); ?>"
					}
				}<?php echo $faq_count < count( $settings->faq ) ? ',' : ''; ?>
				<?php
				++$faq_count;
			}
			?>
		]
	}
	</script>
	<?php
endif;

// Output FAQ items.
foreach ( $settings->faq as $faq ) :
	?>
	<div class="bbvm-faq-item">
		<div class="bbvm-faq-heading" id="<?php echo esc_attr( sanitize_title( $faq->faq ) ); ?>"><?php echo esc_html( $faq->faq ); ?><?php echo 'no' === $settings->expanded ? '<i class="fas fa-plus"></i>' : ''; ?></div>
		<div class="bbvm-faq-content" <?php echo 'yes' === $settings->expanded ? '' : "style='display:none;'"; ?>>
			<?php echo wp_kses_post( $faq->faq_text ); ?>
		</div>
	</div>
	<?php
endforeach;
?>
</div>
