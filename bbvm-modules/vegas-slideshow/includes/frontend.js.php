jQuery ( document ).ready( function( $ ) {
	if( typeof jQuery.vegas !== 'undefined' ) {
		var vegas_node_<?php echo $id; ?> = "";
		$(".fl-node-<?php echo $id; ?> .fl-bbvm-vegas-slideshow-for-beaverbuilder .slideshow-item").css("z-index", "15");
		$(".fl-node-<?php echo $id; ?> .fl-bbvm-vegas-slideshow-for-beaverbuilder .slideshow-item").css("position", "relative").append("<div class=\"vegas\" style=\"position: absolute; width: 100%; height: 100%; z-index: 1; top: 0; left: 0;\"></div>");
		<?php if( 'yes' === $settings->show_bullets ): ?>
		<?php if( count( $settings->images ) !== 1 ) :
		$bullet_html = '<div class="bullets">';
		$count = 0;
		foreach( $settings->images as $key => $image_data ) {
			$class = '';
			if ( 0 === $key ) {
				$class = 'active';
			}
			$bullet_html .= sprintf( '<div class="bullet %s bullet_id_%d" data-id="%d"></div>', esc_attr( $class ), absint( $count ), absint( $count ) );
			$count += 1;
		}
		$bullet_html .= '</div>';
		?>
		$(".fl-node-<?php echo $id; ?> .fl-bbvm-vegas-slideshow-for-beaverbuilder").append('<?php echo $bullet_html; ?>');
		<?php endif; ?>
		<?php endif; ?>
		<?php if( 'yes' === $settings->show_arrows && count( $settings->images ) !== 1 ): ?>
			$(".fl-node-<?php echo $id; ?> .fl-bbvm-vegas-slideshow-for-beaverbuilder .slideshow-item").after("<div class=\"arrow-left\"><i class=\"fas fa-arrow-left\"></i></div><div class=\"arrow-right\"><i class=\"fas fa-arrow-right\"></i></div>");
		<?php endif; ?>
		var meta_html = '';
		var meta_wrapper = '';
		<?php if ( 'yes' === $settings->show_caption ): ?>
			meta_html += "<div class=\"caption\"></div>";
		<?php endif; ?>
		<?php if ( 'yes' === $settings->show_subcaption ) : ?>
		meta_wrapper += "<div class=\"sub-caption\"></div>";
		<?php endif; ?>
		<?php if ( 'yes' === $settings->show_link ) : ?>
		meta_wrapper += "<div class=\"link\"></div>";
		<?php endif; ?>
		if( '' !== meta_wrapper ) {
			meta_html += '<div class="meta-wrapper">' + meta_wrapper + '</div>';
		}
		if ( '' !== meta_html ) {
			meta_html = '<div class="slideshow-meta">' + meta_html + '</div>';
			$(".fl-node-<?php echo $id; ?> .fl-bbvm-vegas-slideshow-for-beaverbuilder .slideshow-item").append(meta_html);
		}

		vegas_node_<?php echo $id; ?> = $(".fl-node-<?php echo $id; ?> .fl-bbvm-vegas-slideshow-for-beaverbuilder .slideshow-item .vegas").vegas({
		timer: <?php echo 'yes' === $settings->vegas_show_timer ? 'true' : 'false'; ?>,
		delay: <?php echo $settings->vegas_delay; ?>,
		transition: ['<?php echo $settings->vegas_transition; ?>'],
		animation: '<?php echo $settings->vegas_animations; ?>',
		preload: <?php echo 'yes' === $settings->preload ? 'true' : 'false'; ?>,
		autoplay: <?php echo 'yes' === $settings->autoplay ? 'true' : 'false'; ?>,
		loop: <?php echo 'yes' === $settings->loop ? 'true' : 'false'; ?>,
		shuffle: <?php echo 'yes' === $settings->shuffle ? 'true' : 'false'; ?>,
		transitionDuration: <?php echo $settings->vegas_transition_time; ?>,
		slides: [
		<?php
		$javascript = '';
		$slide_count = 0;
		foreach( $settings->images as $key => $image_data ) {
			$image_src = wp_get_attachment_image_src($image_data->image, 'full' );
			$image = $image_src[0];
			$javascript .= sprintf( '{ src: "%s", key: %d, caption: "%s", subcaption: "%s", link: "%s", link_url: "%s", current_slide: %d},', esc_url( $image ), absint($key), esc_js( $image_data->caption ), esc_js( $image_data->subcaption ), esc_js( $image_data->link_text ), esc_js( $image_data->link ), absint( $slide_count ) );
			$slide_count += 1;
		}
		echo $javascript;
		?>
		],
		walk: function (index, slideSettings) {
			var link_url = slideSettings.link_url;
			var link_text = slideSettings.link;
			var anchor = '<a href=\"' + link_url + '\">' + link_text + '</a>';
			$('.fl-node-<?php echo $id; ?> .caption').html(slideSettings.caption);
			$('.fl-node-<?php echo $id; ?> .sub-caption').html(slideSettings.subcaption);
			$('.fl-node-<?php echo $id; ?> .link').html(anchor);
			$('.fl-node-<?php echo $id; ?> .bullet').removeClass('active');
			$('.fl-node-<?php echo $id; ?> .bullet_id_' + slideSettings.current_slide).addClass('active');
		}
		} );
		// End Vegas
		$('.fl-node-<?php echo $id; ?> .arrow-left').click( function (e ) {
			vegas_node_<?php echo $id; ?>.vegas('previous');
		});
		$('.fl-node-<?php echo $id; ?> .bullets .bullet').click( function (e ) {
			var slide = $(this).data('id');
			vegas_node_<?php echo $id; ?>.vegas('jump', slide);
		});
		$('.fl-node-<?php echo $id; ?> .arrow-right').click( function (e ) {
				vegas_node_<?php echo $id; ?>.vegas('next');
		});
	}
});
