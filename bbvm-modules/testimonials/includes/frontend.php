<div class="fl-mediaron-testimonials-for-beaverbuilder">
<?php
if( 'slider' === $settings->testimonial_type ) {
	?>
	<div class="owl-carousel owl-theme">
	<?php
	foreach( $settings->testimonial_entries as $testimonial ) {
		?>
		<div class="fl-mediaron-testimonials-card">
			<div class="fl-mediaron-testimonials-card-img">
				<?php
				if ( 'icon' === $testimonial->testimonial_image_type ) {
					echo sprintf( '<i class="%s"></i>', $testimonial->testimonial_icon );
				} else {
					echo sprintf( '<img src="%s" alt="%s" />', esc_url( $testimonial->testimonial_image_src ), $testimonial->testimonial_name );
				}
				?>
			</div><!-- .img -->
			<?php
			if ( 'yes' === $settings->show_rating ) :
			?>
			<div class="fl-mediaron-testimonials-card-rating">
			<?php
			for ( $i = 0; $i < absint( $testimonial->testimonial_rating ); $i++ ) {
				echo '<i class="fas fa-star"></i>';
			}
			?>
			</div><!-- .rating -->
			<?php
			endif;
			?>
			<div class="fl-mediaron-testimonials-card-name"><?php echo esc_html( $testimonial->testimonial_name ); ?></div>
			<div class="fl-mediaron-testimonials-card-title"><?php echo esc_html( $testimonial->testimonial_title ); ?></div>
			<div class="fl-mediaron-testimonials-card-content">
				<?php echo $testimonial->testimonial_content; ?>
			</div><!-- .content -->
		</div><!-- fl-mediaron-testimonials-card -->
		<?php
	}
	?>
	</div>
	<?php
}
if ( 'card' === $settings->testimonial_type ) :
?>
<div class="fl-mediaron-testimonials-cards">
<?php
foreach( $settings->testimonial_entries as $testimonial ) {
	?>
	<div class="fl-mediaron-testimonials-card">
		<div class="fl-mediaron-testimonials-card-img">
			<?php
			if ( 'icon' === $testimonial->testimonial_image_type ) {
				echo sprintf( '<i class="%s"></i>', $testimonial->testimonial_icon );
			} else {
				echo sprintf( '<img src="%s" alt="%s" />', esc_url( $testimonial->testimonial_image_src ), $testimonial->testimonial_name );
			}
			?>
		</div><!-- .img -->
		<?php
		if ( 'yes' === $settings->show_rating ) :
		?>
		<div class="fl-mediaron-testimonials-card-rating">
		<?php
		for ( $i = 0; $i < absint( $testimonial->testimonial_rating ); $i++ ) {
			echo '<i class="fas fa-star"></i>';
		}
		?>
		</div><!-- .rating -->
		<?php
		endif;
		?>
		<div class="fl-mediaron-testimonials-card-name"><?php echo esc_html( $testimonial->testimonial_name ); ?></div>
		<div class="fl-mediaron-testimonials-card-title"><?php echo esc_html( $testimonial->testimonial_title ); ?></div>
		<div class="fl-mediaron-testimonials-card-content">
			<?php echo $testimonial->testimonial_content; ?>
		</div><!-- .content -->
	</div><!-- fl-mediaron-testimonials-card -->
	<?php
}
?>
<div class="fl-mediaron-testimonials-card  is-placeholder"></div>
<div class="fl-mediaron-testimonials-card  is-placeholder"></div>
<div class="fl-mediaron-testimonials-card  is-placeholder"></div>
<div class="fl-mediaron-testimonials-card  is-placeholder"></div>
</div>
<?php
endif;
if ( 'list' === $settings->testimonial_type ) :
?>
<div class="fl-mediaron-testimonials-list">
<?php
foreach( $settings->testimonial_entries as $testimonial ) {
	?>
	<div class="fl-mediaron-testimonials">
		<div class="fl-mediaron-testimonials-list-left">
			<div class="fl-mediaron-testimonials-list-img">
				<?php
				if ( 'icon' === $testimonial->testimonial_image_type ) {
					echo sprintf( '<i class="%s"></i>', $testimonial->testimonial_icon );
				} else {
					echo sprintf( '<img src="%s" alt="%s" />', esc_url( $testimonial->testimonial_image_src ), $testimonial->testimonial_name );
				}
				?>
			</div><!-- .img -->
			<?php
			if ( 'yes' === $settings->show_rating ) :
			?>
			<div class="fl-mediaron-testimonials-card-rating">
			<?php
			for ( $i = 0; $i < absint( $testimonial->testimonial_rating ); $i++ ) {
				echo '<i class="fas fa-star"></i>';
			}
			?>
			</div><!-- .rating -->
			<?php
			endif;
			?>
		</div><!-- .fl-mediaron-testimonials-list-left -->
		<div class="fl-mediaron-testimonials-list-right">
			<div class="fl-mediaron-testimonials-list-content">
				<?php echo $testimonial->testimonial_content; ?>
			</div><!-- .content -->
			<div class="fl-mediaron-testimonials-list-name"><?php echo esc_html( $testimonial->testimonial_name ); ?></div>
			<div class="fl-mediaron-testimonials-list-title"><?php echo esc_html( $testimonial->testimonial_title ); ?></div>
		</div><!-- .fl-mediaron-testimonials-list-right -->
	</div><!-- fl-mediaron-testimonials -->
	<?php
}
?>
</div>
<?php
endif;
?>
</div>