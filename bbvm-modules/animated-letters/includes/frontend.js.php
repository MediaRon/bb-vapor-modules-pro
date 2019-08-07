<?php
/**
 * Animated Letters Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

$bbvm_loop = ( 'yes' === $settings->loop ) ? true : false;
?>
if ( typeof anime !== 'undefined' ) {
	var animeLoop = <?php echo ( 'yes' === $settings->loop ) ? 'true' : 'false'; ?>;
	var animeDelay = <?php echo absint( $settings->delay ); ?>;
	var animeTarget = '.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-animated-letters-for-beaverbuilder .letter';
	var animeTargetWord = '.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-animated-letters-for-beaverbuilder .word';
	var animeTargetWrapper = '.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-animated-letters-for-beaverbuilder .letters';
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
				return animeDelay * (l - i);
			}
		}
		)
		<?php if ( $bbvm_loop ) : ?>
		.add({
			targets: animeHeadingTarget,
			opacity: 0,
			duration: 1000,
			easing: "easeOutExpo",
			delay: 1000
		});
		<?php endif; ?>
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
		})
		<?php if ( $bbvm_loop ) : ?>
		.add({
			targets: animeHeadingTarget,
			opacity: 0,
			duration: 1000,
			easing: "easeOutExpo",
			delay: 1000
		});
		<?php endif; ?>
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
		})
		<?php if ( $bbvm_loop ) : ?>
		.add({
			targets: animeHeadingTarget,
			opacity: 0,
			duration: 1000,
			easing: "easeOutExpo",
			delay: 1000
		});
		<?php endif; ?>
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
	if ( 'signal' === $settings->style ) :
		?>
		anime.timeline({loop: animeLoop})
		.add({
			targets: lineTarget,
			opacity: [0.5,1],
			scaleX: [0, 1],
			easing: "easeInOutExpo",
			duration: 700
		}).add({
			targets: lineTarget,
			duration: 600,
			easing: "easeOutExpo",
			translateY: function(e, i, l) {
				var offset = -0.625 + 0.625*2*i;
				return offset + "em";
			}
		}).add({
			targets: '' + animeHeadingTarget + ' .letters-center',
			opacity: [0,1],
			scaleY: [0.5, 1],
			easing: "easeOutExpo",
			duration: 600,
			offset: '-=600'
		}).add({
			targets: '' + animeHeadingTarget + ' .letters-left',
			opacity: [0,1],
			translateX: ["0.5em", 0],
			easing: "easeOutExpo",
			duration: 600,
			offset: '-=300'
		}).add({
			targets: '' + animeHeadingTarget + ' .letters-right',
			opacity: [0,1],
			translateX: ["-0.5em", 0],
			easing: "easeOutExpo",
			duration: 600,
			offset: '-=600'
		})
		<?php if ( $bbvm_loop ) : ?>
		.add({
			targets: animeHeadingTarget,
			opacity: 0,
			duration: 1000,
			easing: "easeOutExpo",
			delay: 1000
		});
		<?php endif; ?>
		<?php
	endif;
	if ( 'beauty' === $settings->style ) :
		?>
		anime.timeline({loop: animeLoop})
		.add({
			targets: animeTarget,
			translateY: ["1.1em", 0],
			translateZ: 0,
			duration: 750,
			delay: function(el, i) {
				return animeDelay * i;
			}
		})
		<?php if ( $bbvm_loop ) : ?>
		.add({
			targets: animeHeadingTarget,
			opacity: 0,
			duration: 1000,
			easing: "easeOutExpo",
			delay: 1000
		});
		<?php endif; ?>
		<?php
	endif;
	if ( 'reality' === $settings->style ) :
		?>
		anime.timeline({loop: animeLoop})
		.add({
			targets: animeTarget,
			translateY: ["1.1em", 0],
			translateX: ["0.55em", 0],
			translateZ: 0,
			rotateZ: [180, 0],
			duration: 750,
			easing: "easeOutExpo",
			delay: function(el, i) {
				return animeDelay * i;
			}
		})
		<?php if ( $bbvm_loop ) : ?>
		.add({
			targets: animeHeadingTarget,
			opacity: 0,
			duration: 1000,
			easing: "easeOutExpo",
			delay: 1000
		});
		<?php endif; ?>
		<?php
	endif;
	if ( 'coffee' === $settings->style ) :
		?>
		anime.timeline({loop: animeLoop})
		.add({
			targets: animeTarget,
			scale: [0, 1],
			duration: 1500,
			elasticity: 600,
			delay: function(el, i) {
				return animeDelay * (i+1)
			}
		})
		<?php if ( $bbvm_loop ) : ?>
		.add({
			targets: animeHeadingTarget,
			opacity: 0,
			duration: 1000,
			easing: "easeOutExpo",
			delay: 1000
		});
		<?php endif; ?>
		<?php
	endif;
	if ( 'domino' === $settings->style ) :
		?>
		anime.timeline({loop: animeLoop})
		.add({
			targets: animeTarget,
			rotateY: [-90, 0],
			duration: 1300,
			delay: function(el, i) {
				return animeDelay * i;
			}
		})
		<?php if ( $bbvm_loop ) : ?>
		.add({
			targets: animeHeadingTarget,
			opacity: 0,
			duration: 1000,
			easing: "easeOutExpo",
			delay: 1000
		});
		<?php endif; ?>
		<?php
	endif;
	if ( 'hello' === $settings->style ) :
		?>
		anime.timeline({loop: animeLoop})
		.add({
			targets: lineTarget,
			scaleY: [0,1],
			opacity: [0.5,1],
			easing: "easeOutExpo",
			duration: 700
		})
		.add({
			targets: lineTarget,
			translateX: [0,jQuery(animeTargetWrapper).width()],
			easing: "easeOutExpo",
			duration: 1000,
			delay: 100
		}).add({
			targets: animeTarget,
			opacity: [0,1],
			easing: "easeOutExpo",
			duration: 600,
			offset: '-=775',
			delay: function(el, i) {
				return 34 * (i+1)
			}
		})
		<?php if ( $bbvm_loop ) : ?>
		.add({
			targets: animeHeadingTarget,
			opacity: 0,
			duration: 1000,
			easing: "easeOutExpo",
			delay: 1000
		});
		<?php endif; ?>
		<?php
	endif;
	if ( 'bottom' === $settings->style ) :
		?>
		anime.timeline({loop: animeLoop})
		.add({
			targets: lineTarget,
			opacity: [0.5,1],
			scaleX: [0, 1],
			easing: "easeInOutExpo",
			duration: 700
		}).add({
			targets: lineTarget,
			duration: 600,
			easing: "easeOutExpo"
		}).add({
			targets: animeTarget,
			opacity: [0,1],
			easing: "easeOutExpo",
			duration: 600,
			offset: '-=775',
			delay: function(el, i) {
				return 34 * (i+1)
			}
		})
		<?php if ( $bbvm_loop ) : ?>
		.add({
			targets: animeHeadingTarget,
			opacity: 0,
			duration: 1000,
			easing: "easeOutExpo",
			delay: 1000
		});
		<?php endif; ?>
		<?php
	endif;
	if ( 'left' === $settings->style ) :
		?>
		anime.timeline({loop: animeLoop})
		.add({
			targets: animeTarget,
			translateX: [40,0],
			translateZ: 0,
			opacity: [0,1],
			easing: "easeOutExpo",
			duration: 1200,
			delay: function(el, i) {
				return 500 + 30 * i;
			}
		})
		<?php if ( $bbvm_loop ) : ?>
		.add({
		targets: animeTarget,
		translateX: [0,-30],
		opacity: [1,0],
		easing: "easeInExpo",
		duration: 1100,
		delay: function(el, i) {
			return 100 + 30 * i;
		}
		});
		<?php endif; ?>
		<?php
	endif;
	if ( 'rising' === $settings->style ) :
		?>
		anime.timeline({loop: animeLoop})
		.add({
			targets: animeTarget,
			translateY: [100,0],
			translateZ: 0,
			opacity: [0,1],
			easing: "easeOutExpo",
			duration: 1400,
			delay: function(el, i) {
				return 300 + 30 * i;
			}
		})
		<?php if ( $bbvm_loop ) : ?>
		.add({
			targets: animeTarget,
			translateY: [0,-100],
			opacity: [1,0],
			easing: "easeInExpo",
			duration: 1200,
			delay: function(el, i) {
			return 100 + 30 * i;
			}
		});
		<?php endif; ?>
		<?php
	endif;
	if ( 'find' === $settings->style ) :
		?>
		anime.timeline({loop: animeLoop})
		.add({
			targets: lineTarget,
			scaleX: [0,1],
			opacity: [0.5,1],
			easing: "easeInOutExpo",
			duration: 900
		}).add({
			targets: animeTarget,
			opacity: [0,1],
			translateX: [40,0],
			translateZ: 0,
			scaleX: [0.3, 1],
			easing: "easeOutExpo",
			duration: 800,
			offset: '-=600',
			delay: function(el, i) {
				return 150 + 25 * i;
			}
		})
		<?php if ( $bbvm_loop ) : ?>
		.add({
			targets: animeHeadingTarget,
			opacity: 0,
			duration: 1000,
			easing: "easeOutExpo",
			delay: 1000
		});
		<?php endif; ?>
		<?php
	endif;
	if ( 'out' === $settings->style ) :
		?>
		anime.timeline({loop: animeLoop})
		.add({
			targets: animeTargetWord,
			scale: [14,1],
			opacity: [0,1],
			easing: "easeOutCirc",
			duration: 800,
			delay: function(el, i) {
			return 800 * i;
			}
		})
		<?php if ( $bbvm_loop ) : ?>
		.add({
			targets: animeHeadingTarget,
			opacity: 0,
			duration: 1000,
			easing: "easeOutExpo",
			delay: 1000
		});
		<?php endif; ?>
		<?php
	endif;
	if ( 'love' === $settings->style ) :
		?>
		anime.timeline({loop: animeLoop})
		.add({
			targets: animeTarget,
			translateY: [-100,0],
			easing: "easeOutExpo",
			duration: 1400,
			delay: function(el, i) {
				return 30 * i;
			}
		})
		<?php if ( $bbvm_loop ) : ?>
		.add({
			targets: animeHeadingTarget,
			opacity: 0,
			duration: 1000,
			easing: "easeOutExpo",
			delay: 1000
			});
		<?php endif; ?>
		<?php
	endif;
	?>
}
