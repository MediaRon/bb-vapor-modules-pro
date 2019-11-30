<?php
/**
 * Timeline Module
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.3
 */

?>
<div class="fl-bbvm-timeline-for-beaverbuilder">
	<div class="timeline-container">
		<?php
		$count = 1;
		foreach ( $settings->timeline as $timeline_item ) {
			?>
			<div class="timeline-item">
				<div class="timeline-item-content count-<?php echo absint( $count ); ?>" style="<?php echo 'background-color: ' . esc_html( BBVapor_Modules_Pro::get_color( $timeline_item->background_color ) ) . '; '; ?>?>">
					<?php
					if ( 'no' === $settings->hide_category ) :
						?>
					<span class="tag" style="<?php echo 'background-color: ' . esc_html( BBVapor_Modules_Pro::get_color( $timeline_item->category_background_color ) ) . ';'; ?>">
						<?php echo esc_html( $timeline_item->category ); ?>
					</span>
						<?php
					endif;
					?>
					<?php
					if ( 'no' === $settings->hide_date ) :
						?>
					<time style="<?php echo 'color: ' . esc_html( BBVapor_Modules_Pro::get_color( $timeline_item->text_color ) ) . '; '; ?>?>"><?php echo esc_html( date( 'M d Y', strtotime( $timeline_item->date ) ) ); // phpcs:ignore ?></time>
						<?php
					endif;
					?>
					<div style="color: <?php echo esc_html( BBVapor_Modules_Pro::get_color( $timeline_item->text_color ) ); ?>;"><?php echo wp_kses_post( wpautop( $timeline_item->text ) ); ?></div>
					<?php
					if ( 'no' === $settings->hide_button ) :
						?>
					<a href="<?php echo esc_url( $timeline_item->button_link ); ?>" target="_blank" rel="noopener noreferrer">
						<?php echo esc_html( $timeline_item->button_text ); ?>
					</a>
						<?php
					endif;
					?>
					<span class="circle"></span>
				</div>
			</div>
			<?php
			$count++;
		}
		?>
	</div>
</div>
