<?php
/**
 * Restaurant Menu Items Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
<div class="bbvm-restaurant-menu-items-wrapper">
	<div class="bbvm-restaurant-heading">
		<h2 class="bbvm-restaurant-menu-items-heading" id="<?php echo esc_attr( sanitize_title( $settings->menu_item_category ) ); ?>">
		<?php echo esc_html( $settings->menu_item_category ); ?>
		</h2>
		<?php
		if ( ! empty( $settings->menu_item_category_description ) ) {
			printf( '<p class="bbvm-restaurant-menu-items-description">%s</p>', esc_html( $settings->menu_item_category_description ) );
		}
		if ( 'line' === $settings->category_separator || 'image' === $settings->category_separator ) {
			?>
			<hr />
			<?php
		}
		?>
	</div>
	<div class="bbvm-restaurant-menu-items columns-1">
	<?php
	foreach ( $settings->menu_item_form as $index => $menu_item ) {
		$has_photo = false;
		?>
		<div class="bbvm-restaurant-menu-item">
			<?php
			if ( ! empty( $menu_item->restaurant_menu_item_photo ) && 'yes' === $menu_item->restaurant_menu_item_has_photo && 'yes' === $settings->image_photo ) {
				?>
				<div class='menu-item-photo'>
					<?php
					$has_photo = true;
					if ( 'yes' === $settings->image_lightbox ) {
						$attachment_image = wp_get_attachment_image_src( $menu_item->restaurant_menu_item_photo, 'full' );
						printf( '<a class="bbvm-restaurant-item-photo-lightbox" href="%s">', esc_url( $attachment_image[0] ) );
					}
					echo wp_get_attachment_image( $menu_item->restaurant_menu_item_photo, $menu_item->restaurant_menu_item_photo_size );
					if ( 'yes' === $settings->image_lightbox ) {
						echo '</a>';
					}
					?>
				</div>
				<?php
			}
			?>
			<div class="menu-item-text-wrapper <?php echo ( false === $has_photo ) ? 'no-photo' : ''; ?>">
				<div class="menu-item-title">
				<?php
				echo esc_html( $menu_item->restaurant_menu_item_title );
				if ( 'icon' === $menu_item->restaurant_menu_item_icon_select ) {
					printf( '&nbsp;<i class="%s" style="color: #%s"></i>', esc_attr( $menu_item->restaurant_menu_item_icon ), esc_html( $menu_item->restaurant_menu_item_icon_color ) );
				} elseif ( 'photo' === $menu_item->restaurant_menu_item_icon_select ) {
					echo '<span class="menu-item-icon">' . wp_get_attachment_image( $menu_item->restaurant_menu_item_icon_photo, 'full' ) . '</span>';
				}
				?>
				</div>
				<?php
				if ( ! empty( $menu_item->restaurant_menu_item_description ) ) {
					?>
					<div class="menu-item-description">
						<?php echo esc_html( $menu_item->restaurant_menu_item_description ); ?>
					</div>
					<?php
				}
				?>
			</div>
			<?php
			if ( ! empty( $menu_item->restaurant_menu_item_price ) ) {
				?>
				<div class="menu-item-price">
					<?php echo esc_html( $menu_item->restaurant_menu_item_price ); ?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	}
	?>
	</div>
</div>
