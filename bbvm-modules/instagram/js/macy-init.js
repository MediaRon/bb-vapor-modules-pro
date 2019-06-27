function bbvm_instagram_init_macy() {
	var instagramMacy = Macy({
		container: '.instagram-masonry-wrapper',
		trueOrder: false,
		waitForImages: false,
		margin: 24,
		columns: 4,
		breakAt: {
			1200: 5,
			940: 3,
			520: 2,
			400: 1
		}
	});
}
bbvm_instagram_init_macy();