<div class="fl-bbvm-unordered-list-for-beaverbuilder">
<ul>
<?php
if ( ! empty( $settings->list_entries ) ) :
	foreach ( $settings->list_entries as $list_entry ) {
		echo '<li>';
		if ( 'icon' === $settings->list_style ) {
			?>
			<div class="icon"><i class="<?php echo esc_attr( $settings->list_icon ); ?>"></i></div>
			<div class="content">
			<?php
			echo wp_kses_post( $list_entry->list_content );
			?>
			</div>
			<?php
		} else {
			echo wp_kses_post( $list_entry->list_content );
		}
		echo '</li>';
	}
endif;
?>
</ul>
</div>
