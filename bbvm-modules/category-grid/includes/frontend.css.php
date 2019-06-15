.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-category-grid-for-beaverbuilder ul {
	display: flex;
	flex-direction: row;
	flex-wrap: wrap;
}
@supports (display: grid) {
	.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-category-grid-for-beaverbuilder ul {
		display: grid;
		grid-column-gap: 15px;
		grid-row-gap: 15px;
		grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
	}
}

.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-category-grid-for-beaverbuilder ul {
	list-style: none;
	margin: 0;
	padding: 0;
}

.fl-node-<?php echo esc_html( $id ); ?> .fl-bbvm-category-grid-for-beaverbuilder li {
	display: flex;
	font-size: 18px;
	justify-content: center;
}
