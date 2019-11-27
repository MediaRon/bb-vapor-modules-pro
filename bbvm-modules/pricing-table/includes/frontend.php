<?php
/**
 * Pricing Table Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.4.5
 */

?>
<div class="fl-bbvm-pricing-table">
	<?php
	if ( 'yes' === $settings->pricing_title_enable ) :
		?>
		<div class="bbvm-pricing-table-title">
			<?php echo esc_html( $settings->pricing_table_title ); ?>
		</div>
		<?php
	endif;
	?>
</div>
