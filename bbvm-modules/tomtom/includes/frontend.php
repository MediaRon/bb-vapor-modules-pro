<?php
/**
 * TomTom Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.2.0
 */

?>
<div class="bbvm-tomtom-map-wrapper">
	<?php
	if ( 'yes' === $settings->sidebar ) :
		?>
		<div class="bbvm-tomtom-map-sidebar">
			<?php
			$categories = array();
			foreach ( $settings->markers as $marker ) {
				$categories[ sanitize_title( $marker->marker_category ) ][] = $marker;
			}
			asort( $categories );
			foreach ( $categories as $category_name => $markers ) :
				?>
				<h4 class="city" data-category="<?php echo esc_attr( $category_name ); ?>"><?php echo esc_html( $markers[0]->marker_category ); ?></h4>
				<div class="location-wrapper" style="display: none;">
				<?php
				foreach ( $markers as $marker_data ) :
					?>
					<div class="list-entry" data-long="<?php echo esc_attr( $marker_data->longitude ); ?>" data-lat="<?php echo esc_attr( $marker_data->latitude ); ?>">
						<strong><a target="_blank" href="<?php echo esc_url( $marker_data->link_url ); ?>"><?php echo esc_html( $marker_data->location_name ); ?></a><br />
						<a target="_blank" href="<?php echo esc_url( $marker_data->link_url ); ?>">Visit</a> | Call: <a href="tel:<?php echo esc_attr( $marker_data->phone ); ?>"><?php echo esc_attr( $marker_data->phone ); ?></a><br /><?php echo wp_kses_post( $marker_data->location ); ?></strong>
					</div><!-- .list-entry -->
					<?php
				endforeach;
				?>
				</div><!-- .location-wrapper -->
				<?php
			endforeach;
			?>
		</div>
		<?php
	endif;
	?>
	<div class="bbvm-map bbvm-tomtom-map"></div>
</div>
