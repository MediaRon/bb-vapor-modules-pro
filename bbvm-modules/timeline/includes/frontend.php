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
	<?php
	foreach ( $settings->timeline as $timeline_item ) {
		?>
		<div class="timeline-item">
			<div class="timeline-item-content">
				<span class="tag">
					<?php echo esc_html( $timeline_item->category ); ?>
				</span>
				<time><?php echo esc_html( date( 'M d Y', strtotime( $timeline_item->date ) ) ); ?></time>
				<?php echo wp_kses_post( wpautop( $timeline_item->text ) ); ?>
				<a href="<?php echo esc_url( $timeline_item->button_link ); ?>" target="_blank" rel="noopener noreferrer">
					<?php echo esc_html( $timeline_item->button_text ); ?>
				</a>
				<span class="circle"></span>
			</div>
		</div>
		<?php
	}

	?>
</div>
