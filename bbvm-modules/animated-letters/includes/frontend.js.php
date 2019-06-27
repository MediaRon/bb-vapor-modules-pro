if ( typeof anime !== 'undefined' ) {
	var animeLoop = <?php echo ( 'yes' === $settings->loop ) ? 'true' : 'false'; ?>;
	var animeDelay = <?php echo absint( $settings->delay ); ?>;
	var animeTarget = '.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-animated-letters-for-beaverbuilder .letter';
	var animeHeadingTarget = '.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-animated-letters-for-beaverbuilder h2';
	var lineTarget = '.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-animated-letters-for-beaverbuilder .line';
	<?php
	if ( 'thursday' === $settings->style ) :
		?>
		anime.timeline({loop: animeLoop})
		.add({
			targets: animeTarget,
			scale: [0.3,1],
			opacity: [0,1],
			translateZ: 0,
			easing: "easeOutExpo",
			duration: 600,
			delay: function(el, i) {
				return animeDelay * (i+1)
			}
		}
		).add(
		{
			targets: lineTarget,
			scaleX: [0,1],
			opacity: [0.5,1],
			easing: "easeOutExpo",
			duration: 700,
			offset: '-=875',
			delay: function(el, i, l) {
				return 80 * (l - i);
			}
		}
		).add({
			targets: animeHeadingTarget,
			opacity: 0,
			duration: 1000,
			easing: "easeOutExpo",
			delay: 1000
		});
		<?php
	endif;
	if ( 'sunny' === $settings->style ) :
		?>
		anime.timeline({loop: animeLoop})
		.add({
			targets: animeTarget,
			scale: [4,1],
			opacity: [0,1],
			translateZ: 0,
			easing: "easeOutExpo",
			duration: 950,
			delay: function(el, i) {
			return animeDelay*i;
			}
		}).add({
			targets: animeHeadingTarget,
			opacity: 0,
			duration: 1000,
			easing: "easeOutExpo",
			delay: 1000
		});
		<?php
	endif;
	if ( 'great' === $settings->style ) :
		?>
		anime.timeline({loop: animeLoop})
		.add({
			targets: animeTarget,
			opacity: [0,1],
			easing: "easeInOutQuad",
			duration: 2250,
			delay: function(el, i) {
			return animeDelay * (i+1)
			}
		}).add({
			targets: animeHeadingTarget,
			opacity: 0,
			duration: 1000,
			easing: "easeOutExpo",
			delay: 1000
		});
		<?php
	endif;
	if ( 'go' === $settings->style ) :
		$count = 1;
		?>
		var ml4 = {};
		ml4.opacityIn = [0,1];
		ml4.scaleIn = [0.2, 1];
		ml4.scaleOut = 3;
		ml4.durationIn = 800;
		ml4.durationOut = 600;
		ml4.delay = 500;
		anime.timeline({loop: animeLoop})
		<?php
		foreach ( $settings->text_form as $text_form ) {
			?>
			.add({
				targets: '' + animeHeadingTarget + ' .letters-' + <?php echo absint( $count ); ?>,
				opacity: ml4.opacityIn,
				scale: ml4.scaleIn,
				duration: ml4.durationIn
			}).add({
				targets: '' + animeHeadingTarget + ' .letters-' + <?php echo absint( $count ); ?>,
				opacity: 0,
				scale: ml4.scaleOut,
				duration: ml4.durationOut,
				easing: "easeInExpo",
				delay: ml4.delay
			})
			<?php
			$count++;
		}
		?>
		<?php
	endif;
	?>
}
<?php
