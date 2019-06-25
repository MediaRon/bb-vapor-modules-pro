<div class="fl-bbvm-blockquotes-for-beaverbuilder">
<?php
if ( 'none' === $settings->blockquote_style ) :
	// credit: https://codepen.io/jupago/pen/VqxKqE?&page=1
	?>
<div class="blockquote">
	<h2><?php echo wp_kses_post( $settings->blockquote_text ); ?></h2>
	<h3><?php echo wp_kses_post( $settings->blockquote_attribution ); ?></h3>
</div>
	<?php
endif;
if ( 'bold' === $settings->blockquote_style ) :
	// credit: https://codepen.io/jupago/pen/VqxKqE?&page=1
	?>
<div class="blockquote">
	<h2><?php echo wp_kses_post( $settings->blockquote_text ); ?></h2>
	<h3><?php echo wp_kses_post( $settings->blockquote_attribution ); ?></h3>
</div>
	<?php
endif;
if ( 'enhanced' === $settings->blockquote_style ) :
	// credit: https://codepen.io/jupago/pen/dwZKbM?&page=1
	?>
	<div class="blockquote">
		<h2><?php echo wp_kses_post( $settings->blockquote_text ); ?></h2>
		<h3><?php echo wp_kses_post( $settings->blockquote_attribution ); ?></h3>
	</div>
	<?php
endif;
if ( 'left_border' === $settings->blockquote_style ) :
	?>
	<div class="blockquote">
		<h2><?php echo wp_kses_post( $settings->blockquote_text ); ?></h2>
		<h3><?php echo wp_kses_post( $settings->blockquote_attribution ); ?></h3>
	</div>
	<?php
endif;
if ( 'right_border' === $settings->blockquote_style ) :
	?>
	<div class="blockquote">
		<h2><?php echo wp_kses_post( $settings->blockquote_text ); ?></h2>
		<h3><?php echo wp_kses_post( $settings->blockquote_attribution ); ?></h3>
	</div>
	<?php
endif;
if ( 'top_bottom_border' === $settings->blockquote_style ) :
	?>
	<div class="blockquote">
		<h2><?php echo wp_kses_post( $settings->blockquote_text ); ?></h2>
		<h3><?php echo wp_kses_post( $settings->blockquote_attribution ); ?></h3>
	</div>
	<?php
endif;
// Credit https://codepen.io/chris22smith/pen/oQWavL?&page=2
if ( 'cite' === $settings->blockquote_style ) :
	?>
	<blockquote>
		<p><?php echo wp_kses_post( $settings->blockquote_text ); ?></p>
		<cite><?php echo wp_kses_post( $settings->blockquote_attribution ); ?></cite>
	</blockquote>
	<?php
endif;
if ( 'cite_border_effect' === $settings->blockquote_style ) :
	?>
	<blockquote>
		<p><?php echo wp_kses_post( $settings->blockquote_text ); ?></p>
		<cite><?php echo wp_kses_post( $settings->blockquote_attribution ); ?></cite>
	</blockquote>
	<?php
endif;
if ( 'cite_animated_border' === $settings->blockquote_style ) :
	?>
	<blockquote>
		<p><?php echo wp_kses_post( $settings->blockquote_text ); ?></p>
		<cite><?php echo wp_kses_post( $settings->blockquote_attribution ); ?></cite>
	</blockquote>
	<?php
endif;
if ( 'cite_scale' === $settings->blockquote_style ) :
	?>
	<blockquote>
		<p><?php echo wp_kses_post( $settings->blockquote_text ); ?></p>
		<cite><?php echo wp_kses_post( $settings->blockquote_attribution ); ?></cite>
	</blockquote>
	<?php
endif;
if ( 'cite_brackets' === $settings->blockquote_style ) :
	?>
	<blockquote>
		<p><?php echo wp_kses_post( $settings->blockquote_text ); ?></p>
		<cite><?php echo wp_kses_post( $settings->blockquote_attribution ); ?></cite>
	</blockquote>
	<?php
endif;
// Credit https://codepen.io/SkyHyzer/pen/oPJWxN?&page=2
if ( 'cite_icon' === $settings->blockquote_style ) :
	?>
	<blockquote>
		<p><?php echo wp_kses_post( $settings->blockquote_text ); ?></p>
		<cite><?php echo wp_kses_post( $settings->blockquote_attribution ); ?></cite>
	</blockquote>
	<?php
endif;
// Credit https://codepen.io/Ondreas/pen/aYoVGR?page=3
if ( 'background_quotes' === $settings->blockquote_style ) :
	?>
	<blockquote>
		<p><?php echo wp_kses_post( $settings->blockquote_text ); ?></p>
		<cite><?php echo wp_kses_post( $settings->blockquote_attribution ); ?></cite>
	</blockquote>
	<?php
endif;
?>
</div>
