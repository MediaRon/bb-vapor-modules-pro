<div class="fl-mediaron-headlines-for-beaverbuilder">
	<<?php echo $settings->headline_tag;?>
	<?php echo 'none' !== $settings->animation_type ? 'class="animated infinite ' . esc_attr( $settings->animation_type ) . '"' : ''; ?>><?php echo esc_html( $settings->headline_text ); ?></<?php echo $settings->headline_tag; ?>>
</div>