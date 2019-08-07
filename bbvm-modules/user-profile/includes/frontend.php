<?php
/**
 * User Profile Module.
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 1.3.0
 */

?>
<div class="fl-bbvm-user-profile-for-beaverbuilder">
	<?php
	if ( 'yes' === $settings->post_author ) {
		global $post;
		$user = get_user_by( 'id', $post->post_author );
	} else {
		$user = get_user_by( 'id', $settings->user );
	}

	if ( false === $user ) {
		return '';
	}
	$user_id    = $user->ID;
	$defaults   = array(
		'theme'                           => $settings->theme,
		'profileAvatarShape'              => $settings->avatar_shape,
		'padding'                         => absint( $settings->padding ),
		'border'                          => absint( $settings->border_width ),
		'borderRounded'                   => absint( $settings->border_radius ),
		'borderColor'                     => '#' . $settings->border_color,
		'profileBackgroundColor'          => '#' . $settings->profile_background_color,
		'profileTextColor'                => '#' . $settings->profile_text_color,
		'showName'                        => 'yes' === $settings->show_name ? true : false,
		'showTitle'                       => 'yes' === $settings->show_title ? true : false,
		'fontSize'                        => absint( $settings->font_size ),
		'profileName'                     => $user->data->display_name,
		'profileTitle'                    => esc_html( $settings->title ),
		'avatarSize'                      => absint( $settings->avatar_size ),
		'profileImgURL'                   => get_avatar_url( $user_id, $settings->avatar_size ),
		'headerFontSize'                  => absint( $settings->header_font_size ),
		'showDescription'                 => 'yes' === $settings->show_description ? true : false,
		'showSocialMedia'                 => 'yes' === $settings->show_social_media ? true : false,
		'profileContent'                  => get_user_meta( $user_id, 'description', true ),
		'profileFontSize'                 => absint( $settings->profile_font_size ),
		'showViewPosts'                   => 'yes' === $settings->show_view_posts ? true : false,
		'profileURL'                      => get_author_posts_url( $user_id ),
		'website'                         => $settings->website_url, /* Needs to be a URl */
		'showWebsite'                     => 'yes' === $settings->show_website ? true : false,
		'showPostsWidth'                  => '100%', /* ignored if website is not empty and true */
		'profileViewPostsBackgroundColor' => '#' . $settings->view_posts_background_color,
		'profileViewPostsTextColor'       => '#' . $settings->view_posts_text_color,
		'buttonFontSize'                  => absint( $settings->button_font_size ),
		'profileWebsiteBackgroundColor'   => '#' . $settings->website_background_color,
		'profileWebsiteTextColor'         => '#' . $settings->website_text_color,
		'profileLinkColor'                => '#' . $settings->profile_link_color,
		'socialWordPress'                 => $settings->wordpress,
		'socialFacebook'                  => $settings->facebook,
		'socialTwitter'                   => $settings->twitter,
		'socialInstagram'                 => $settings->instagram,
		'socialPinterest'                 => $settings->pinterest,
		'socialLinkedIn'                  => $settings->linkedin,
		'socialYouTube'                   => $settings->youtube,
		'socialGitHub'                    => $settings->github,
		'socialMediaOptions'              => $settings->show_brand_colors,
		'socialMediaColors'               => '#' . $settings->social_fill_color,
		'profileCompactAlignment'         => $settings->compact_align,
		'tabbedAuthorProfileTitle'        => $settings->tabbed_profile_title,
		'tabbedAuthorSubHeading'          => $settings->tabbed_subheading,
		'tabbedAuthorProfile'             => $settings->tabbed_author_heading,
		'tabbedAuthorLatestPosts'         => $settings->tabbed_latest_posts_heading,
		'tabbedAuthorProfileHeading'      => $settings->tabbed_author_heading,
		'profileLatestPostsOptionsValue'  => $settings->tabbed_latest_posts_theme,
		'profileTabColor'                 => '#' . $settings->tab_color,
		'profileTabPostsColor'            => '#' . $settings->tab_post_color,
		'profileTabHeadlineColor'         => '#' . $settings->tab_headline_color,
		'profileTabHeadlineTextColor'     => '#' . $settings->tab_headline_text_color,
		'profileTabTextColor'             => '#' . $settings->tab_text_color,
		'profileTabPostsTextColor'        => '#' . $settings->tab_post_text_color,
	);
	$attributes = $defaults;
	if ( 'regular' === $attributes['theme'] || 'compact' === $attributes['theme'] || 'profile' === $attributes['theme'] ) :
		?>
		<div class="mpp-enhanced-profile-wrap mpp-block-profile <?php echo 'compact' === $attributes['theme'] ? esc_attr( $attributes['profileCompactAlignment'] ) : ''; ?> <?php echo esc_attr( $attributes['theme'] ); ?> <?php echo esc_attr( $attributes['profileAvatarShape'] ); ?>" style="<?php echo $attributes['padding'] > 0 ? 'padding: ' . esc_attr( $attributes['padding'] ) . 'px;' : ''; ?><?php echo $attributes['border'] > 0 ? 'border:' . esc_attr( $attributes['border'] ) . 'px solid ' . esc_attr( $attributes['borderColor'] ) . ';' : ''; ?><?php echo $attributes['borderRounded'] > 0 ? 'border-radius:' . esc_attr( $attributes['borderRounded'] ) . 'px;' : ''; ?>background-color: <?php echo esc_attr( $attributes['profileBackgroundColor'] ) . ';'; ?> color: <?php echo esc_attr( $attributes['profileTextColor'] ) . ';'; ?>">
			<div class="mpp-profile-gutenberg-wrap mt-font-size-<?php echo esc_attr( $attributes['profileFontSize'] ); ?>">
				<?php if ( 'regular' === $attributes['theme'] ) : ?>
					<div class="mpp-profile-image-wrapper">
						<div class="mpp-profile-image-square">
							<img class="profile-avatar" alt="avatar" src="<?php echo esc_url( $attributes['profileImgURL'] ); ?>" />
						</div>
					</div>
					<div class="mpp-content-wrap">
						<?php if ( $attributes['showName'] ) : ?>
						<h2 style="color:<?php echo esc_attr( $attributes['profileTextColor'] ); ?>; font-size: <?php echo esc_attr( $attributes['headerFontSize'] ) . 'px;'; ?>"><?php echo wp_kses_post( $attributes['profileName'] ); ?></h2>
						<?php endif; ?>
						<?php if ( $attributes['showTitle'] ) : ?>
						<p style="color:<?php echo esc_attr( $attributes['profileTextColor'] ); ?>"><?php echo wp_kses_post( $attributes['profileTitle'] ); ?></p>
						<?php endif; ?>
						<?php if ( $attributes['showDescription'] ) : ?>
						<div><?php echo wp_kses_post( $attributes['profileContent'] ); ?></div>
						<?php endif; ?>
						<?php if ( isset( $attributes['profileURL'] ) && strlen( $attributes['profileURL'] ) > 0 ) : ?>
							<div class="mpp-gutenberg-view-posts">
								<?php if ( $attributes['showViewPosts'] ) : ?>
									<div class="mpp-profile-view-posts" style="background-color: <?php echo esc_attr( $attributes['profileViewPostsBackgroundColor'] ); ?>; color: <?php echo esc_attr( $attributes['profileViewPostsTextColor'] ); ?>; <?php ( '' !== $attributes['website'] && $attributes['showWebsite'] ) ? '' : 'width:' . esc_attr( $attributes['showPostsWidth'] ) . ';'; ?> font-size: <?php echo esc_attr( $attributes['buttonFontSize'] ); ?>px;">
										<a href="<?php echo esc_url( $attributes['profileURL'] ); ?>" style="background: <?php echo esc_attr( $attributes['profileViewPostsBackgroundColor'] ); ?>; color: <?php echo esc_attr( $attributes['profileViewPostsTextColor'] ); ?>">
										<?php esc_html_e( 'View Posts', 'metronet-profile-picture' ); ?></a>
									</div><!-- .mpp-profile-view-posts -->
								<?php endif; ?>
								<?php if ( '' !== $attributes['website'] && $attributes['showWebsite'] ) : ?>
								<div class="mpp-profile-view-website" style="background: <?php echo esc_attr( $attributes['profileWebsiteBackgroundColor'] ); ?>;color: <?php echo esc_attr( $attributes['profileWebsiteTextColor'] ); ?>; font-size: <?php echo esc_attr( $attributes['buttonFontSize'] ); ?>px;">
									<a href="<?php echo esc_url( $attributes['website'] ); ?>" style="background: <?php echo esc_attr( $attributes['profileWebsiteBackgroundColor'] ); ?>; color: <?php echo esc_attr( $attributes['profileWebsiteTextColor'] ); ?>;"><?php esc_html_e( 'View Website', 'metronet-profile-picture' ); ?></a>
								</div><!-- .mpp-profile-view-website -->
								<?php endif; ?>
							</div><!-- .mpp-gutenberg-view-posts -->
						<?php endif; ?>
					</div><!-- .mpp-content-wrap -->
				<?php endif; /* End Regular Theme */ ?>
				<?php if ( 'profile' === $attributes['theme'] ) : ?>
					<?php if ( $attributes['showName'] ) : ?>
					<h2 style="color: <?php echo esc_attr( $attributes['profileTextColor'] ); ?>; font-size: <?php echo esc_attr( $attributes['headerFontSize'] ) . 'px'; ?>"><?php echo wp_kses_post( $attributes['profileName'] ); ?></h2>
					<?php endif; ?>
					<div class="mpp-profile-image-wrapper">
						<div class="mpp-profile-image-square">
							<img src="<?php echo esc_url( $attributes['profileImgURL'] ); ?>" alt="avatar" class="profile-avatar" />
						</div>
					</div><!-- .mpp-profile-image-wrapper -->
					<?php if ( $attributes['showDescription'] ) : ?>
					<div class="mpp-profile-text">
						<?php echo wp_kses_post( $attributes['profileContent'] ); ?>
					</div><!-- .mpp-profile-text -->
					<?php endif; ?>
					<div class="mpp-profile-meta" style="font-size: <?php echo esc_attr( $attributes['fontSize'] ); ?>px;">
						<?php if ( $attributes['showViewPosts'] ) : ?>
							<div class="mpp-profile-link alignleft">
								<a href="<?php echo esc_url( $attributes['profileURL'] ); ?>" style="color: <?php echo esc_attr( $attributes['profileLinkColor'] ); ?>;"><?php esc_html_e( 'View all posts by', 'metronet-profile-picture' ); ?> <?php echo esc_html( $attributes['profileName'] ); ?></a>
							</div><!-- .mpp-profile-link -->
							<div class="mpp-profile-link alignright">
								<a href="<?php echo esc_url( $attributes['website'] ); ?>" style="color: <?php echo esc_attr( $attributes['profileLinkColor'] ); ?>">
								<?php esc_html_e( 'Website', 'metronet-profile-picture' ); ?>
								</a>
							</div><!-- .mpp-profile-link -->
						<?php endif; ?>
					</div><!-- .mpp-profile-meta -->
				<?php endif; /* End of profile theme */ ?>
				<?php if ( 'compact' === $attributes['theme'] ) : ?>
					<?php if ( $attributes['showName'] ) : ?>
					<h2 style="color: <?php echo esc_attr( $attributes['profileTextColor'] ); ?>; font-size: <?php echo esc_attr( $attributes['headerFontSize'] ) . 'px'; ?>"><?php echo wp_kses_post( $attributes['profileName'] ); ?></h2>
					<?php endif; ?>
					<div class="mpp-profile-image-wrapper">
						<div class="mpp-profile-image-square">
							<img src="<?php echo esc_url( $attributes['profileImgURL'] ); ?>" alt="avatar" class="profile-avatar" />
						</div>
					</div><!-- .mpp-profile-image-wrapper -->
					<?php if ( $attributes['showDescription'] ) : ?>
					<div class="mpp-profile-text">
						<?php echo wp_kses_post( $attributes['profileContent'] ); ?>
					</div><!-- .mpp-profile-text -->
					<?php endif; ?>
					<div class="mpp-compact-meta">
						<?php if ( $attributes['showViewPosts'] ) : ?>
							<div class="mpp-profile-view-posts" style="background: <?php echo esc_attr( $attributes['profileViewPostsBackgroundColor'] ); ?>; color: <?php echo esc_attr( $attributes['profileViewPostsTextColor'] ); ?>; width: 90%; margin: 0 auto 10px auto; font-size: <?php echo esc_attr( $attributes['buttonFontSize'] ); ?>px;">
								<a href="<?php echo esc_url( $attributes['profileURL'] ); ?>" style="color: <?php echo esc_attr( $attributes['profileViewPostsTextColor'] ); ?>; background: <?php echo esc_attr( $attributes['profileViewPostsBackgroundColor'] ); ?>;"><?php esc_html_e( 'View Posts', 'metronet-profile-picture' ); ?></a>
							</div><!-- .mpp-profile-view-posts -->
						<?php endif; ?>
						<?php if ( '' !== $attributes['website'] && $attributes['showWebsite'] ) : ?>
							<div class="mpp-profile-view-website" style="background: <?php echo esc_attr( $attributes['profileWebsiteBackgroundColor'] ); ?>; color: <?php echo esc_attr( $attributes['profileWebsiteTextColor'] ); ?>; width: 90%; margin: 0 auto 0 auto; font-size: <?php echo esc_attr( $attributes['buttonFontSize'] ); ?>px;">
								<a href="<?php echo esc_url( $attributes['website'] ); ?>" style="color: <?php echo esc_attr( $attributes['profileWebsiteTextColor'] ); ?>; background: <?php echo esc_attr( $attributes['profileWebsiteBackgroundColor'] ); ?>;"><?php esc_html_e( 'View Website', 'metronet-profile-picture' ); ?></a>
							</div><!-- .mpp-profile-view-posts -->
						<?php endif; ?>

					</div>
				<?php endif; /* Compact theme end */ ?>
				<?php if ( true === $attributes['showSocialMedia'] && ( 'regular' === $attributes['theme'] || 'compact' === $attributes['theme'] || 'profile' === $attributes['theme'] ) ) : ?>
				<div class="mpp-social">
					<?php if ( ! empty( $attributes['socialFacebook'] ) ) : ?>
						<a href="<?php echo esc_url( $attributes['socialFacebook'] ); ?>">
							<svg class="icon icon-facebook" role="img" style="<?php echo 'custom' === $attributes['socialMediaOptions'] ? 'fill:' . esc_attr( $attributes['socialMediaColors'] ) . ';' : ''; ?>">
								<use href="#facebook"></use>
							</svg>
						</a>
					<?php endif; ?>
					<?php if ( ! empty( $attributes['socialTwitter'] ) ) : ?>
						<a href="<?php echo esc_url( $attributes['socialTwitter'] ); ?>">
							<svg class="icon icon-twitter" role="img" style="<?php echo 'custom' === $attributes['socialMediaOptions'] ? 'fill:' . esc_attr( $attributes['socialMediaColors'] ) . ';' : ''; ?>">
								<use href="#twitter"></use>
							</svg>
						</a>
					<?php endif; ?>
					<?php if ( ! empty( $attributes['socialInstagram'] ) ) : ?>
						<a href="<?php echo esc_url( $attributes['socialInstagram'] ); ?>">
							<svg class="icon icon-instagram" role="img" style="<?php echo 'custom' === $attributes['socialMediaOptions'] ? 'fill:' . esc_attr( $attributes['socialMediaColors'] ) . ';' : ''; ?>">
								<use href="#instagram"></use>
							</svg>
						</a>
					<?php endif; ?>
					<?php if ( ! empty( $attributes['socialPinterest'] ) ) : ?>
						<a href="<?php echo esc_url( $attributes['socialPinterest'] ); ?>">
							<svg class="icon icon-pinterest" role="img" style="<?php echo 'custom' === $attributes['socialMediaOptions'] ? 'fill:' . esc_attr( $attributes['socialMediaColors'] ) . ';' : ''; ?>">
								<use href="#pinterest"></use>
							</svg>
						</a>
					<?php endif; ?>
					<?php if ( ! empty( $attributes['socialLinkedIn'] ) ) : ?>
						<a href="<?php echo esc_url( $attributes['socialLinkedIn'] ); ?>">
							<svg class="icon icon-linkedin" role="img" style="<?php echo 'custom' === $attributes['socialMediaOptions'] ? 'fill:' . esc_attr( $attributes['socialMediaColors'] ) . ';' : ''; ?>">
								<use href="#linkedin"></use>
							</svg>
						</a>
					<?php endif; ?>
					<?php if ( ! empty( $attributes['socialYouTube'] ) ) : ?>
						<a href="<?php echo esc_url( $attributes['socialYouTube'] ); ?>">
							<svg class="icon icon-youtube" role="img" style="<?php echo 'custom' === $attributes['socialMediaOptions'] ? 'fill:' . esc_attr( $attributes['socialMediaColors'] ) . ';' : ''; ?>">
								<use href="#youtube"></use>
							</svg>
						</a>
					<?php endif; ?>
					<?php if ( ! empty( $attributes['socialGitHub'] ) ) : ?>
						<a href="<?php echo esc_url( $attributes['socialGitHub'] ); ?>">
							<svg class="icon icon-github" role="img" style="<?php echo 'custom' === $attributes['socialMediaOptions'] ? 'fill:' . esc_attr( $attributes['socialMediaColors'] ) . ';' : ''; ?>">
								<use href="#github"></use>
							</svg>
						</a>
					<?php endif; ?>
					<?php if ( ! empty( $attributes['socialWordPress'] ) ) : ?>
						<a href="<?php echo esc_url( $attributes['socialWordPress'] ); ?>">
							<svg class="icon icon-wordpress" role="img" style="<?php echo 'custom' === $attributes['socialMediaOptions'] ? 'fill:' . esc_attr( $attributes['socialMediaColors'] ) . ';' : ''; ?>">
								<use href="#wordpress"></use> <?php // phpcs:ignore ?>
							</svg>
						</a>
					<?php endif; ?>
				</div><!-- .mpp-social -->
				<?php endif; ?>
			</div><!-- .mpp-profile-gutenberg-wrap -->
		</div><!-- .mpp-profile-wrap -->
<?php endif; ?>
<?php if ( 'tabbed' === $attributes['theme'] ) : ?>
<style>
	.mpp-author-tabbed ul.mpp-author-tabs li.active:after {
		border-top: 10px solid <?php echo esc_attr( $attributes['profileTabColor'] ); ?>;
		border-top-color: <?php echo esc_attr( $attributes['profileTabColor'] ); ?>;
	}
	.mpp-author-tabbed ul.mpp-author-tabs li.mpp-tab-posts.active:after {
		border-top: 10px solid <?php echo esc_attr( $attributes['profileTabPostsColor'] ); ?>;
		border-top-color: <?php echo esc_attr( $attributes['profileTabPostsColor'] ); ?>;
	}
</style>
<div class="mpp-author-tabbed tabbed <?php echo esc_attr( $attributes['profileAvatarShape'] ); ?> mpp-block-profile">
	<ul class="mpp-author-tabs">
		<li class="mpp-tab-profile active mpp-gutenberg-tab" data-tab="mpp-profile-tab" style="background: <?php echo esc_attr( $attributes['profileTabColor'] ); ?>; color: <?php echo esc_attr( $attributes['profileTabTextColor'] ); ?>;">
		<?php echo wp_kses_post( $attributes['tabbedAuthorProfile'] ); ?>
		</li>
		<li class="mpp-tab-posts mpp-gutenberg-tab" data-tab="mpp-latestposts-tab" style="background: <?php echo esc_attr( $attributes['profileTabPostsColor'] ); ?>; color: <?php echo esc_attr( $attributes['profileTabPostsTextColor'] ); ?>;">
		<?php echo wp_kses_post( $attributes['tabbedAuthorLatestPosts'] ); ?>
		</li>
	</ul>
	<div class="mpp-tab-wrapper" style="<?php echo $attributes['padding'] > 0 ? 'padding: ' . esc_attr( $attributes['padding'] ) . 'px;' : ''; ?><?php echo $attributes['border'] > 0 ? 'border:' . esc_attr( $attributes['border'] ) . 'px solid ' . esc_attr( $attributes['borderColor'] ) . ';' : ''; ?><?php echo $attributes['borderRounded'] > 0 ? 'border-radius:' . esc_attr( $attributes['borderRounded'] ) . 'px;' : ''; ?>background-color: <?php echo esc_attr( $attributes['profileBackgroundColor'] ) . ';'; ?> color: <?php echo esc_attr( $attributes['profileTextColor'] ) . ';'; ?>">
		<div class="mpp-tab-active mpp-profile-tab mpp-tab">
		<div class="mpp-author-social-wrapper">
			<div class="mpp-author-heading">
				<div class="mpp-author-profile-heading" style="background: <?php echo esc_attr( $attributes['profileTabHeadlineColor'] ); ?>; color: <?php echo esc_attr( $attributes['profileTabHeadlineTextColor'] ); ?>;">
					<?php echo wp_kses_post( $attributes['tabbedAuthorProfileHeading'] ); ?>
				</div><!-- .mpp-author-heading -->
			</div><!-- .mpp-author-social-wrapper -->
			<?php if ( $attributes['showSocialMedia'] ) : ?>
				<div class="mpp-social">
				<?php if ( ! empty( $attributes['socialFacebook'] ) ) : ?>
						<a href="<?php echo esc_url( $attributes['socialFacebook'] ); ?>">
							<svg class="icon icon-facebook" role="img" style="<?php echo 'custom' === $attributes['socialMediaOptions'] ? 'fill:' . esc_attr( $attributes['socialMediaColors'] ) . ';' : ''; ?>">
								<use href="#facebook"></use>
							</svg>
						</a>
					<?php endif; ?>
					<?php if ( ! empty( $attributes['socialTwitter'] ) ) : ?>
						<a href="<?php echo esc_url( $attributes['socialTwitter'] ); ?>">
							<svg class="icon icon-twitter" role="img" style="<?php echo 'custom' === $attributes['socialMediaOptions'] ? 'fill:' . esc_attr( $attributes['socialMediaColors'] ) . ';' : ''; ?>">
								<use href="#twitter"></use>
							</svg>
						</a>
					<?php endif; ?>
					<?php if ( ! empty( $attributes['socialInstagram'] ) ) : ?>
						<a href="<?php echo esc_url( $attributes['socialInstagram'] ); ?>">
							<svg class="icon icon-instagram" role="img" style="<?php echo 'custom' === $attributes['socialMediaOptions'] ? 'fill:' . esc_attr( $attributes['socialMediaColors'] ) . ';' : ''; ?>">
								<use href="#instagram"></use>
							</svg>
						</a>
					<?php endif; ?>
					<?php if ( ! empty( $attributes['socialPinterest'] ) ) : ?>
						<a href="<?php echo esc_url( $attributes['socialPinterest'] ); ?>">
							<svg class="icon icon-pinterest" role="img" style="<?php echo 'custom' === $attributes['socialMediaOptions'] ? 'fill:' . esc_attr( $attributes['socialMediaColors'] ) . ';' : ''; ?>">
								<use href="#pinterest"></use>
							</svg>
						</a>
					<?php endif; ?>
					<?php if ( ! empty( $attributes['socialLinkedIn'] ) ) : ?>
						<a href="<?php echo esc_url( $attributes['socialLinkedIn'] ); ?>">
							<svg class="icon icon-linkedin" role="img" style="<?php echo 'custom' === $attributes['socialMediaOptions'] ? 'fill:' . esc_attr( $attributes['socialMediaColors'] ) . ';' : ''; ?>">
								<use href="#linkedin"></use>
							</svg>
						</a>
					<?php endif; ?>
					<?php if ( ! empty( $attributes['socialYouTube'] ) ) : ?>
						<a href="<?php echo esc_url( $attributes['socialYouTube'] ); ?>">
							<svg class="icon icon-youtube" role="img" style="<?php echo 'custom' === $attributes['socialMediaOptions'] ? 'fill:' . esc_attr( $attributes['socialMediaColors'] ) . ';' : ''; ?>">
								<use href="#youtube"></use>
							</svg>
						</a>
					<?php endif; ?>
					<?php if ( ! empty( $attributes['socialGitHub'] ) ) : ?>
						<a href="<?php echo esc_url( $attributes['socialGitHub'] ); ?>">
							<svg class="icon icon-github" role="img" style="<?php echo 'custom' === $attributes['socialMediaOptions'] ? 'fill:' . esc_attr( $attributes['socialMediaColors'] ) . ';' : ''; ?>">
								<use href="#github"></use>
							</svg>
						</a>
					<?php endif; ?>
					<?php if ( ! empty( $attributes['socialWordPress'] ) ) : ?>
						<a href="<?php echo esc_url( $attributes['socialWordPress'] ); ?>">
							<svg class="icon icon-wordpress" role="img" style="<?php echo 'custom' === $attributes['socialMediaOptions'] ? 'fill:' . esc_attr( $attributes['socialMediaColors'] ) . ';' : ''; ?>">
								<use href="#wordpress"></use> <?php // phpcs:ignore ?>
							</svg>
						</a>
					<?php endif; ?>
				</div><!-- .mpp-social -->
			<?php endif; ?>
		</div><!-- .mpp-author-social-wrapper -->
		<div class="mpp-profile-image-wrapper">
			<div class="mpp-profile-image-square">
				<img class="profile-avatar" alt="avatar" src="<?php echo esc_url( $attributes['profileImgURL'] ); ?>">
				<div class="mpp-author-profile-sub-heading">
					<?php echo wp_kses_post( $attributes['tabbedAuthorSubHeading'] ); ?>
				</div>
			</div><!-- .mpp-profile-image-square -->
		</div><!-- .mpp-profile-image-wrapper -->
		<div class="mpp-tabbed-profile-information">
			<?php if ( $attributes['showTitle'] || '' !== $attributes['tabbedAuthorProfileTitle'] ) : ?>
				<?php echo '<div>' . wp_kses_post( $attributes['tabbedAuthorProfileTitle'] ) . '</div>'; ?>
			<?php endif; ?>
			<?php if ( $attributes['showName'] ) : ?>
			<h2 style="color: <?php echo esc_attr( $attributes['profileTextColor'] ); ?>; font-size: <?php echo esc_attr( $attributes['headerFontSize'] ) . 'px;'; ?>"><?php echo wp_kses_post( $attributes['profileName'] ); ?></h2>
			<?php endif; ?>
			<?php if ( $attributes['showDescription'] ) : ?>
			<div class="mpp-profile-text mt-font-size-<?php echo esc_attr( $attributes['profileFontSize'] ); ?>">
				<?php echo wp_kses_post( $attributes['profileContent'] ); ?>
			</div>
			<?php endif; ?>
		</div><!-- .mpp-tabbed-profile-information -->
		</div><!-- first profile tab -->
		<div class="mpp-tabbed-latest-posts mpp-latestposts-tab mpp-tab">
			<?php
			$args       = array(
				'post_type'      => 'post',
				'post_status'    => 'publish',
				'author'         => $user_id,
				'orderby'        => 'date',
				'order'          => 'DESC',
				'posts_per_page' => 5,
			);
			$bbvm_posts = get_posts( $args );
			?>
			<ul class="mpp-author-tab-content <?php echo esc_attr( $attributes['profileLatestPostsOptionsValue'] ); ?>">
			<?php
			foreach ( $bbvm_posts as $bbvm_post ) {
				printf( "<li><a href='%s'>%s</a></li>", esc_url( get_permalink( $bbvm_post->ID ) ), esc_html( $bbvm_post->post_title ) );
			}
			?>
			</ul>
		</div><!-- .mpp-tabbed-latest-posts -->
	</div><!-- mpp-tab-wrapper -->
</div><!-- .mpp-author-tabbed -->

<?php endif; ?>
</div>
<?php
// Define SVG sprite file.
$svg_icons = 'social-logos.svg';
/**
 * Filter Social Icons Sprite.
 *
 * @since 2.1.0
 *
 * @param string Absolute directory path to SVG sprite
 */
$svg_icons = apply_filters( 'mpp_icons_sprite', $svg_icons );
echo '<div style="position: absolute; height: 0; width: 0; overflow: hidden;">';
require_once $svg_icons;
echo '</div>';
