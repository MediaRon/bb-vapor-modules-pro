<div class="fl-bbvm-vegas-slideshow-for-beaverbuilder <?php echo 'yes' === $settings->show_bullets ? 'has-bullets' : ''; ?>">
	<div class="slideshow-item">
	</div>
	<?php
	if ( ! empty( $image_data->caption ) ):
		?>
		<div class="caption"><?php echo esc_html( $image_data->caption ); ?></div>
		<?php
	endif;
	?>
	<?php
	if ( ! empty( $image_data->subcaption ) ):
		?>
		<div class="subcaption"><?php echo esc_html( $image_data->subcaption ); ?></div>
		<?php
	endif;
	?>
	<?php
	if ( ! empty( $image_data->link_text ) && ! empty( $image_data->link ) ):
		?>
		<div class="link"><a href="<?php echo esc_url( $image_data->link ); ?>"><?php echo esc_html( $image_data->link_text ); ?></a></div>
		<?php
	endif;
	?>
</div>