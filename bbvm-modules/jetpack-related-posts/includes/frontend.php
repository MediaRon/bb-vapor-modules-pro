<?php
/**
 * Jetpack Related Posts Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
<div class="fl-bbvm-jetpack-related-posts-for-beaverbuilder">
	<?php
	global $related_posts;
	$related_posts = $settings;
	if ( ! function_exists( 'bbvm_bb_jetpackme_get_related_terms' ) ) {
		/**
		 * Generates a context for the related content (second line in related post output).
		 * Order of importance:
		 *   - First category (Not 'Uncategorized')
		 *   - First post tag
		 *   - Number of comments
		 *
		 * @param int $post_id The Post ID.
		 * @uses get_the_category, get_the_terms, get_comments_number, number_format_i18n, __, _n
		 * @return string
		 */
		function bbvm_bb_jetpackme_get_related_terms( $post_id ) {
			$categories = get_the_category( $post_id );
			if ( is_array( $categories ) ) {
				foreach ( $categories as $category ) {
					if ( 'uncategorized' !== $category->slug && '' !== trim( $category->name ) ) {
						$post_cat_context = sprintf(
							/* translators: %s is the category/tagname */
							esc_html_x( 'In “%s”', 'in {category/tag name}', 'bb-vapor-modules-pro' ),
							$category->name
						);
						/**
						 * Filter the "In Category" line displayed in the post context below each Related Post.
						 *
						 * @module related-posts
						 *
						 * @since 3.2.0
						 *
						 * @param string $post_cat_context "In Category" line displayed in the post context below each Related Post.
						 * @param array $category Array containing information about the category.
						 */
						return apply_filters( 'jetpack_relatedposts_post_category_context', $post_cat_context, $category );
					}
				}
			}

			$tags = get_the_terms( $post_id, 'post_tag' );
			if ( is_array( $tags ) ) {
				foreach ( $tags as $tag ) {
					if ( '' !== trim( $tag->name ) ) {
						$post_tag_context = sprintf(
							/* translators: %s is the category/tagname */
							_x( 'In "%s"', 'in {category/tag name}', 'bb-vapor-modules-pro' ),
							$tag->name
						);
						/**
						 * Filter the "In Tag" line displayed in the post context below each Related Post.
						 *
						 * @module related-posts
						 *
						 * @since 3.2.0
						 *
						 * @param string $post_tag_context "In Tag" line displayed in the post context below each Related Post.
						 * @param array $tag Array containing information about the tag.
						 */
						return apply_filters( 'jetpack_relatedposts_post_tag_context', $post_tag_context, $tag );
					}
				}
			}

			$comment_count = get_comments_number( $post_id );
			if ( $comment_count > 0 ) {
				return sprintf(
					/* translators: %s is the comment count*/
					_n( 'With %s comment', 'With %s comments', $comment_count, 'bb-vapor-modules-pro' ),
					number_format_i18n( $comment_count )
				);
			}

			return __( 'Similar post', 'bb-vapor-modules-pro' );
		}
	}
	if ( ! function_exists( 'bbvm_bb_jetpackme_more_related_posts' ) && ( class_exists( 'Jetpack_RelatedPosts' ) && method_exists( 'Jetpack_RelatedPosts', 'init_raw' ) ) ) {
		/**
		 * Show related posts from Jetpack.
		 *
		 * @param array $options Jetpack Related Post options.
		 */
		function bbvm_bb_jetpackme_more_related_posts( $options ) {
			$related = Jetpack_RelatedPosts::init_raw()
				->set_query_name( 'jp-related-posts' ) // Optional, name can be anything.
				->get_for_post_id(
					get_the_ID(),
					array( 'size' => absint( $options['size'] ) )
				);
			if ( empty( $related ) ) {
				return '';
			}
			ob_start();
			?>
			<div id="jp-relatedposts" class="jp-relatedposts">
				<?php if ( '1' === $options['show_headline'] ) : ?>
				<h3 class="jp-relatedposts-headline"><em><?php echo esc_html( $options['headline'] ); ?></em></h3>
				<?php endif; ?>
				<div class="jp-relatedposts-wrapper <?php echo esc_attr( $options['layout'] ); ?>">
					<?php
					if ( 'grid' === $options['layout'] ) :
						foreach ( $related as $key => $data ) :
							$related_post_id = $data['id'];
							$post            = get_post( $related_post_id );
							?>
							<div class="jp-relatedposts-items columns-<?php echo absint( count( $related ) ); ?>">
								<div class="jp-relatedposts-post jp-relatedposts-post-thumbs" data-post-id="<?php echo absint( $related_post_id ); ?>" data-post-format="false">
									<?php
									if ( '1' === $options['show_thumbnails'] ) :
										?>
										<a class="jp-relatedposts-post-a" href="<?php echo esc_url( get_permalink( $related_post_id ) ); ?>" title="<?php echo esc_html( $post->post_title ); ?>" rel="nofollow">
											<?php
											$thumbnail_id = get_post_thumbnail_id( $related_post_id );
											if ( ! empty( $thumbnail_id ) ) {
												echo wp_get_attachment_image(
													$thumbnail_id,
													array( '350', '200' ),
													false,
													array(
														'class' => 'jp-relatedposts-post-img',
														'alt' => $post->post_title,
													)
												);
											} else {
												if ( ! empty( $options['fallback_image'] ) ) {
													echo wp_get_attachment_image(
														$options['fallback_image'],
														array(
															'350',
															'200',
														),
														false,
														array(
															'class' => 'jp-relatedposts-post-img',
															'alt' => $post->post_title,
														),
													);
												}
											}
											?>
										</a>
										<?php
									endif;
									?>
									<h4 class="jp-relatedposts-post-title"><a class="jp-relatedposts-post-a" href="<?php echo esc_url( get_permalink( $related_post_id ) ); ?>" title="<?php echo esc_attr( $post->post_title ); ?>" rel="nofollow"><?php echo esc_html( $post->post_title ); ?></a></h4>
									<?php
									if ( empty( $post->post_excerpt ) ) {
										$excerpt = $post->post_content;
									} else {
										$excerpt = $post->post_excerpt;
									}
									$excerpt = wp_trim_words( wp_strip_all_tags( strip_shortcodes( $excerpt ) ), 50, '…' );
									?>
									<p class="jp-relatedposts-post-excerpt">
										<?php echo wp_kses_post( $excerpt ); ?>
									</p>
									<?php if ( '1' === $options['show_date'] ) : ?>
										<p class="jp-relatedposts-post-date" style="display: block;"><?php echo esc_html( date( get_option( 'date_format' ) ), strtotime( $post->post_date ) ); ?></p>
									<?php endif; ?>
									<?php if ( '1' === $options['show_context'] ) : ?>
										<p class="jp-relatedposts-post-context"><?php echo wp_kses_post( bbvm_bb_jetpackme_get_related_terms( $related_post_id ) ); ?></p>
									<?php endif; ?>
								</div><!-- .jp-relatedposts-post -->
							</div><!-- .jp-repatedposts-items -->
							<?php
						endforeach;
					endif;
					if ( 'list' === $options['layout'] ) :
						foreach ( $related as $key => $data ) :
							$related_post_id = $data['id'];
							$post            = get_post( $related_post_id );
							?>
							<div class="jp-relatedposts-items jp-relatedposts-list">
								<div class="jp-relatedposts-post jp-relatedposts-post-thumbs" data-post-id="<?php echo absint( $related_post_id ); ?>" data-post-format="false">
									<?php
									if ( '1' === $options['show_thumbnails'] ) :
										?>
										<a class="jp-relatedposts-post-a" href="<?php echo esc_url( get_permalink( $related_post_id ) ); ?>" title="<?php echo esc_html( $post->post_title ); ?>" rel="nofollow">
											<?php
											$thumbnail_id = get_post_thumbnail_id( $related_post_id );
											if ( ! empty( $thumbnail_id ) ) {
												echo wp_get_attachment_image(
													$thumbnail_id,
													array(
														'350',
														'200',
													),
													false,
													array(
														'class' => 'jp-relatedposts-post-img',
														'alt' => $post->post_title,
													)
												);
											} else {
												if ( ! empty( $options['fallback_image'] ) ) {
													echo wp_get_attachment_image(
														$options['fallback_image'],
														array( '350', '200' ),
														false,
														array(
															'class' => 'jp-relatedposts-post-img',
															'alt' => $post->post_title,
														)
													);
												}
											}
											?>
										</a>
										<?php
									endif;
									?>
									<h4 class="jp-relatedposts-post-title"><a class="jp-relatedposts-post-a" href="<?php echo esc_url( get_permalink( $related_post_id ) ); ?>" title="<?php echo esc_attr( $post->post_title ); ?>" rel="nofollow"><?php echo esc_html( $post->post_title ); ?></a></h4>
									<?php
									if ( empty( $post->post_excerpt ) ) {
										$excerpt = $post->post_content;
									} else {
										$excerpt = $post->post_excerpt;
									}
									$excerpt = wp_trim_words( wp_strip_all_tags( strip_shortcodes( $excerpt ) ), 50, '…' );
									?>
									<p class="jp-relatedposts-post-excerpt">
										<?php echo wp_kses_post( $excerpt ); ?>
									</p>
									<?php if ( '1' === $options['show_date'] ) : ?>
										<p class="jp-relatedposts-post-date" style="display: block;"><?php echo esc_html( date( get_option( 'date_format' ), strtotime( $post->post_date ) ) ); ?></p>
									<?php endif; ?>
									<?php if ( '1' === $options['show_context'] ) : ?>
									<p class="jp-relatedposts-post-context"><?php echo wp_kses_post( bbvm_bb_jetpackme_get_related_terms( $related_post_id ) ); ?></p>
									<?php endif; ?>
								</div><!-- .jp-relatedposts-post -->
							</div><!-- .jp-repatedposts-items -->
							<?php
						endforeach;
					endif;
					?>
				</div><!-- .jp-releatedposts-wrapper -->
			</div><!-- .jp-related-posts -->
			<?php
			return ob_get_clean();
		}
	}
	if ( function_exists( 'bbvm_bb_allow_pages_for_relatedposts' ) ) {
		/**
		 * Allow related posts to show up for pages.
		 *
		 * @param bool $enabled Whether Related Posts is enabled or not.
		 */
		function bbvm_bb_allow_pages_for_relatedposts( $enabled ) {
			if ( is_page() ) {
				$enabled = true;
			}
			return $enabled;
		}
	}
	add_filter( 'jetpack_relatedposts_filter_enabled_for_request', 'bbvm_bb_allow_pages_for_relatedposts' );
	add_shortcode( 'bbvm_bb_jetpack_related_posts', 'bbvm_bb_jetpackme_more_related_posts' );
	echo do_shortcode( sprintf( '[bbvm_bb_jetpack_related_posts size="%d" headline="%s" show_headline="%s" show_thumbnails="%s" show_date="%s" layout="%s" show_context="%s" fallback_image="%s"]', absint( $settings->items ), 'yes' === $settings->show_title ? esc_attr( $settings->title ) : '', 'yes' === $settings->show_title ? '1' : '0', 'yes' === $settings->show_thumbnails ? '1' : '0', 'yes' === $settings->show_date ? '1' : '0', esc_attr( $settings->layout ), 'yes' === $settings->show_context ? '1' : '0', $settings->fallback_image ) );
	remove_filter( 'jetpack_relatedposts_filter_enabled_for_request', 'bbvm_bb_allow_pages_for_relatedposts' );
	?>
</div>
