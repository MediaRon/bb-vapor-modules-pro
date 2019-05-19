<div class="mediaron-restaurant-menu-tabs-wrapper">
	<div class="mediaron-restaurant-menu-tabs">
		<?php
		echo '<ul>';
		foreach( $settings->menu_item_form as $tab ) {
			printf( '<li class="%s"><a href="#" data-item="%s" data-default="%s">%s</a></li>', 'yes' === $tab->menu_show_by_default ? 'active': '', esc_html( sanitize_title( $tab->menu_tab_name ) ), esc_attr( $tab->menu_show_by_default ), esc_html( $tab->menu_tab_name ) );
		}
		echo '</ul>';
		?>
	</div>
	<div class="mediaron-restaurant-menu-tabs-items">
		<?php
		foreach( $settings->menu_item_form as $tab ) {
			printf( '<div class="mediaron-restaurant-menu-items-wrapper" id="%s">', esc_html( sanitize_title( $tab->menu_tab_name ) ) );
			?>
			<div class="mediaron-restaurant-heading">
				<h2 class="mediaron-restaurant-menu-items-heading" id="<?php echo esc_attr( sanitize_title( $tab->menu_item_category ) ); ?>">
				<?php echo esc_html( $tab->menu_item_category ); ?>
				</h2>
				<?php
				if( ! empty( $tab->menu_item_category_description ) ) {
					printf( '<p class="mediaron-restaurant-menu-items-description">%s</p>', esc_html( $tab->menu_item_category_description ) );
				}
				if( 'line' === $settings->category_separator || 'image' === $settings->category_separator ) {
					?>
					<hr />
					<?php
				}
				?>
			</div>
			<div class="mediaron-restaurant-menu-items columns-1">
			<?php
			foreach( $tab->menu_item_form as $index => $menu_item ) {
				$menu_item = json_decode( $menu_item );
				$has_photo = false;
				?>
				<div class="mediaron-restaurant-menu-item">
					<?php
					if( ! empty( $menu_item->restaurant_menu_item_photo ) && 'yes' === $menu_item->restaurant_menu_item_has_photo && 'yes' === $settings->image_photo ) {
						?>
						<div class='menu-item-photo'>
							<?php
							$has_photo = true;
							if( 'yes' === $settings->image_lightbox ) {
								$attachment_image = wp_get_attachment_image_src( $menu_item->restaurant_menu_item_photo, 'full' );
								printf( '<a class="mediaron-restaurant-item-photo-lightbox" href="%s">', esc_url( $attachment_image[0] ) );
							}
							echo wp_get_attachment_image( $menu_item->restaurant_menu_item_photo, $menu_item->restaurant_menu_item_photo_size );
							if( 'yes' === $settings->image_lightbox ) {
								echo '</a>';
							}
							?>
						</div>
						<?php
					}
					?>
					<div class="menu-item-text-wrapper <?php echo (false === $has_photo) ? 'no-photo' : ''; ?>">
						<div class="menu-item-title">
						<?php
							if( isset( $menu_item->restaurant_menu_item_title ) ):
								echo esc_html( $menu_item->restaurant_menu_item_title );
								if( 'icon' === $menu_item->restaurant_menu_item_icon_select ) {
									printf( '&nbsp;<i class="%s" style="color: #%s"></i>', $menu_item->restaurant_menu_item_icon, $menu_item->restaurant_menu_item_icon_color );
								} else if( 'photo' === $menu_item->restaurant_menu_item_icon_select ) {
									echo '<span class="menu-item-icon">' . wp_get_attachment_image( $menu_item->restaurant_menu_item_icon_photo, 'full' ) . '</span>';
								}
							endif;
						?>
						</div>
						<?php
						if( ! empty( $menu_item->restaurant_menu_item_description ) ) {
							?>
							<div class="menu-item-description">
								<?php echo esc_html( $menu_item->restaurant_menu_item_description ); ?>
							</div>
							<?php
						}
						?>
					</div>
					<?php
					if( ! empty( $menu_item->restaurant_menu_item_price ) ) {
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
			<?php
			echo '</div>';
		}
		?>
	</div>

</div>