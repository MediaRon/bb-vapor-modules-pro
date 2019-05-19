<div class="fl-bbvm-testimonials-for-beaverbuilder">
<?php
if( 'slider' === $settings->testimonial_type ) {
	?>
	<div class="owl-carousel owl-theme">
	<?php
	foreach( $settings->testimonial_entries as $testimonial ) {
		?>
		<div class="fl-bbvm-testimonials-card">
			<div class="fl-bbvm-testimonials-card-img">
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
			<div class="fl-bbvm-testimonials-card-rating">
			<?php
			for ( $i = 0; $i < absint( $testimonial->testimonial_rating ); $i++ ) {
				echo '<i class="fas fa-star"></i>';
			}
			?>
			</div><!-- .rating -->
			<?php
			endif;
			?>
			<div class="fl-bbvm-testimonials-card-name"><?php echo esc_html( $testimonial->testimonial_name ); ?></div>
			<div class="fl-bbvm-testimonials-card-title"><?php echo esc_html( $testimonial->testimonial_title ); ?></div>
			<div class="fl-bbvm-testimonials-card-content">
				<?php echo $testimonial->testimonial_content; ?>
			</div><!-- .content -->
		</div><!-- fl-bbvm-testimonials-card -->
		<?php
	}
	?>
	</div>
	<?php
}
if ( 'card' === $settings->testimonial_type ) :
?>
<div class="fl-bbvm-testimonials-cards">
<?php
foreach( $settings->testimonial_entries as $testimonial ) {
	?>
	<div class="fl-bbvm-testimonials-card">
		<div class="fl-bbvm-testimonials-card-img">
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
		<div class="fl-bbvm-testimonials-card-rating">
		<?php
		for ( $i = 0; $i < absint( $testimonial->testimonial_rating ); $i++ ) {
			echo '<i class="fas fa-star"></i>';
		}
		?>
		</div><!-- .rating -->
		<?php
		endif;
		?>
		<div class="fl-bbvm-testimonials-card-name"><?php echo esc_html( $testimonial->testimonial_name ); ?></div>
		<div class="fl-bbvm-testimonials-card-title"><?php echo esc_html( $testimonial->testimonial_title ); ?></div>
		<div class="fl-bbvm-testimonials-card-content">
			<?php echo $testimonial->testimonial_content; ?>
		</div><!-- .content -->
	</div><!-- fl-bbvm-testimonials-card -->
	<?php
}
?>
<div class="fl-bbvm-testimonials-card  is-placeholder"></div>
<div class="fl-bbvm-testimonials-card  is-placeholder"></div>
<div class="fl-bbvm-testimonials-card  is-placeholder"></div>
<div class="fl-bbvm-testimonials-card  is-placeholder"></div>
</div>
<?php
endif;
if ( 'list' === $settings->testimonial_type ) :
?>
<div class="fl-bbvm-testimonials-list">
<?php
foreach( $settings->testimonial_entries as $testimonial ) {
	?>
	<div class="fl-bbvm-testimonials">
		<div class="fl-bbvm-testimonials-list-left">
			<div class="fl-bbvm-testimonials-list-img">
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
			<div class="fl-bbvm-testimonials-card-rating">
			<?php
			for ( $i = 0; $i < absint( $testimonial->testimonial_rating ); $i++ ) {
				echo '<i class="fas fa-star"></i>';
			}
			?>
			</div><!-- .rating -->
			<?php
			endif;
			?>
		</div><!-- .fl-bbvm-testimonials-list-left -->
		<div class="fl-bbvm-testimonials-list-right">
			<div class="fl-bbvm-testimonials-list-content">
				<?php echo $testimonial->testimonial_content; ?>
			</div><!-- .content -->
			<div class="fl-bbvm-testimonials-list-name"><?php echo esc_html( $testimonial->testimonial_name ); ?></div>
			<div class="fl-bbvm-testimonials-list-title"><?php echo esc_html( $testimonial->testimonial_title ); ?></div>
		</div><!-- .fl-bbvm-testimonials-list-right -->
	</div><!-- fl-bbvm-testimonials -->
	<?php
}
?>
</div>
<?php
endif;
?>
</div>