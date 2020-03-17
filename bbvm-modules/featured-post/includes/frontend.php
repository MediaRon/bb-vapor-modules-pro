<?php
/**
 * Featured Post Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.2.1
 */

if ( ! function_exists( 'bbvm_bb_featured_post_get_profile_image' ) ) :
	/**
	 * Get a post thumbnail.
	 *
	 * @param object $settings      BB Settings for the module.
	 * @param int    $post_thumb_id The thumbnail ID.
	 * @param int    $post_author   The Post Author ID.
	 * @param int    $post_id       The Post ID.
	 *
	 * @return string Featured Image HTML.
	 */
	function bbvm_bb_featured_post_get_profile_image( $settings, $post_thumb_id = 0, $post_author = 0, $post_id = 0 ) {
		// Get the featured image.
		$list_item_markup = '';
		if ( 'yes' === $settings->display_featured_image ) {
			$post_thumb_size = $settings->featured_thumbnail_size;
			$image_type      = $settings->featured_image_type;
			if ( 'gravatar' === $image_type ) {
				return get_avatar( $post_author, 150 );
			} else {
				return wp_get_attachment_image( $post_thumb_id, 'thumbnail' );
			}
		}
		return '';
	}
endif;
?>
<div class="bbvm-featured-post-wrapper">
<?php
$settings->posts_per_page = 1;
$recent_posts = FLBuilderLoop::query( $settings );

if ( $recent_posts->have_posts() ) :
	while ( $recent_posts->have_posts() ) {
		global $post;
		$recent_posts->the_post();

		// Get the post ID.
		$bbvm_post_id = $post->ID;

		// Get the post thumbnail.
		$post_thumb_id = get_post_thumbnail_id( $bbvm_post_id );

		if ( $post_thumb_id && 'yes' === $settings->display_featured_image ) {
			$post_thumb_class = 'has-thumb';
		} else {
			$post_thumb_class = 'no-thumb';
		}

		// Get the post title.
		$bbvm_title = get_the_title( $bbvm_post_id );

		if ( ! $bbvm_title ) {
			$bbvm_title = __( 'Untitled', 'bb-vapor-modules-pro' );
		}

		// Get the featured image.
		if ( 'yes' === $settings->display_featured_image && ( $post_thumb_id || 'gravatar' === $settings->featured_image_type ) ) {
			?>
			<div class="bbvm-featured">
			<?php
			// Output Featured.
			echo wp_kses_post( bbvm_bb_featured_post_get_profile_image( $settings, $post_thumb_id, $post->post_author ) );
			?>
			</div><!-- .bbvm-featured -->
			<?php
		}

		// Get the Category.
		if ( 'yes' === $settings->display_category ) :
			?>
			<div class="bbvm-category">
				<?php
				if ( 'yes' === $settings->category_link_display ) {
					printf( '<a href="%s">', esc_url( $settings->category_link ) );
				}
				echo wp_kses_post( '<span>' . $settings->category_name . '</span>' );
				if ( 'yes' === $settings->category_link_display ) {
					echo '</a>';
				}
				?>
			</div>
			<?php
		endif;

		// Get the Post Title.
		?>
		<div class="bbvm-title">
			<a href="<?php echo esc_url( get_permalink( $bbvm_post_id ) ); ?>"><?php echo wp_kses_post( $bbvm_title ); ?></a>
		</div>
		<?php
		// Get the Read More Button.
		if ( 'yes' === $settings->display_continue_reading ) :
			?>
			<div class="bbvm-read-more">
				<?php
				printf( '<a href="%s">', esc_url( get_permalink( $bbvm_post_id ) ) );
				echo wp_kses_post( $settings->continue_reading );
				echo '</a>';
				?>
			</div>
			<?php
		endif;
	}
	wp_reset_postdata();
endif;
?>
</div>
