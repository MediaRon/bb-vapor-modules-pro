<?php
/**
 * Restaurant Menu Item Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
<div class="bbvm-restaurant-menu-items-add-wrapper">
	<div class="bbvm-restaurant-menu-item">
		<div class="menu-item-text-wrapper no-photo">
			<div class="menu-item-title">
			<?php
			echo esc_html( $settings->restaurant_menu_item_title );
			if ( 'icon' === $settings->restaurant_menu_item_icon_select ) {
				printf( '&nbsp;<i class="%s" style="color: #%s"></i>', esc_attr( $settings->restaurant_menu_item_icon ), esc_html( $settings->restaurant_menu_item_icon_color ) );
			} elseif ( 'photo' === $settings->restaurant_menu_item_icon_select ) {
				echo '<span class="menu-item-icon">' . wp_get_attachment_image( $settings->restaurant_menu_item_icon_photo, 'full' ) . '</span>';
			}
			?>
			</div>
			<?php
			if ( ! empty( $settings->restaurant_menu_item_description ) ) {
				?>
				<div class="menu-item-description">
					<?php echo esc_html( $settings->restaurant_menu_item_description ); ?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
		if ( ! empty( $settings->restaurant_menu_item_price ) ) {
			?>
			<div class="menu-item-price">
				<?php echo esc_html( $settings->restaurant_menu_item_price ); ?>
			</div>
			<?php
		}
		?>
	</div>
</div>
