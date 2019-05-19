.fl-node-<?php echo $id; ?> .wp-block-image {
  margin-bottom: 1.2em;
}

.fl-node-<?php echo $id; ?> .ptam-text-link {
  color: #<?php echo $settings->link_color; ?>;
  box-shadow: 0 -1px 0 inset;
  text-decoration: none;
  transition: 0.3s ease;
}
.fl-node-<?php echo $id; ?> .ptam-text-link:hover {
  color: inherit;
  box-shadow: 0 -2px 0 inset;
  color: #<?php echo $settings->link_color_hover; ?>;
}

.fl-node-<?php echo $id; ?> .ptam-block-post-grid {
  margin: 0 0 1.2em 0;
  position: relative;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid {
  background: #<?php echo $settings->background_color; ?>;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid article {
  box-sizing: border-box;
}
<?php
if( 'yes' === $settings->center_text ):
?>
.fl-node-<?php echo $id; ?> .ptam-block-post-grid article .ptam-block-post-grid-text {
  text-align: center;
}
<?php
endif;
?>
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: 1fr;
  grid-gap: 0 2em;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-grid article {
  margin-bottom: 2.5em;
}
.fl-node-<?php echo $id; ?> .ptam-post-grid-items.is-grid {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-grid.columns-2 article {
  width: 50%;
}
@media only screen and (max-width: 500px) {
	.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-grid.columns-2 article {
    width: 100%;
  }
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-grid.columns-3 article {
  width: 33%;
}
@media only screen and (max-width: 600px) {
	.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-grid.columns-3 article {
    width: 50%;
  }
}
@media only screen and (max-width: 500px) {
	.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-grid.columns-3 article {
    width: 100%;
  }
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-grid.columns-4 article {
  width: 25%;
}
@media only screen and (max-width: 800px) {
	.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-grid.columns-4 article {
    width: 33%;
  }
}
@media only screen and (max-width: 600px) {
	.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-grid.columns-4 article {
    width: 50%;
  }
}
@media only screen and (max-width: 500px) {
	.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-grid.columns-4 article {
    width: 100%;
  }
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-grid.columns-5 article {
  width: 20%;
}
@media only screen and (max-width: 1000px) {
	.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-grid.columns-5 article {
    width: 25%;
  }
}
@media only screen and (max-width: 800px) {
	.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-grid.columns-5 article {
    width: 33%;
  }
}
@media only screen and (max-width: 600px) {
	.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-grid.columns-5 article {
    width: 50%;
  }
}
@media only screen and (max-width: 500px) {
	.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-grid.columns-5 article {
    width: 100%;
  }
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-grid.columns-6 article {
  width: 16%;
}
@media only screen and (max-width: 1000px) {
	.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-grid.columns-6 article {
    width: 25%;
  }
}
@media only screen and (max-width: 800px) {
	.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-grid.columns-6 article{
    width: 33%;
  }
}
@media only screen and (max-width: 600px) {
	.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-grid.columns-6 article{
    width: 50%;
  }
}
@media only screen and (max-width: 500px) {
	.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-grid.columns-6 article{
    width: 100%;
  }
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-pagination ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-pagination li {
  display: inline-block;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-pagination li > span, .fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-pagination li > a {
  display: inline-block;
  padding: 5px 10px;
  margin: 0 4px 0 0;
  background: #<?php echo $settings->pagination_background; ?>;
  border: 1px solid #<?php echo $settings->pagination_border_color; ?>;
  line-height: 1;
  text-decoration: none;
  border-radius: 2px;
  font-weight: 600;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-pagination li > span:hover, .fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-pagination li > a:hover {
  background: #<?php echo $settings->pagination_background_hover; ?>;
  color: #<?php echo $settings->pagination_link_color_hover; ?>;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-pagination li > span a, .fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-pagination li > a {
  background: #<?php echo $settings->pagination_background; ?>;
  color: #<?php echo $settings->pagination_link_color; ?>;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-pagination li > span.current {
  color: #<?php echo $settings->pagination_active_color; ?>;
  background: #<?php echo $settings->pagination_background_active; ?>;
}
@media only screen and (max-width: 600px) {
	.fl-node-<?php echo $id; ?> .ptam-block-post-grid div[class*=columns].is-grid {
    grid-template-columns: 1fr;
  }
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-block-post-grid-image {
  margin-bottom: 1.2em;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-block-post-grid-image img {
  display: inline-block;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-block-post-grid-text {
  text-align: left;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-block-post-grid-image .avatar {
  height: auto;
  width: inherit;
  border-radius: 0;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid h2 {
  margin-top: 0;
  margin-bottom: 15px;
  font-size: 28px;
  line-height: 1.2;
  clear: none;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid h2:before {
  display: none;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid h2:after {
  display: none;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid h2 a {
  color: #<?php echo $settings->text_color; ?>;
  box-shadow: none;
  transition: 0.3s ease;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid h2 a:hover {
  box-shadow: inset 0 -2px 0 #<?php echo $settings->link_color_hover; ?>;
  color: #<?php echo $settings->link_color_hover; ?>;
  text-decoration: none;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-block-post-grid-byline {
  text-transform: uppercase;
  font-size: 13px;
  letter-spacing: 1px;
  color: #<?php echo $settings->text_color; ?>;
  margin-bottom: 15px;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-block-post-grid-author,
.fl-node-<?php echo $id; ?> .ptam-block-post-grid ptam-block-post-grid-date,
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-block-post-grid-excerpt {
  color: #<?php echo $settings->text_color; ?>;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-text-lower-case {
  text-transform: none;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-block-post-grid-author,
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-block-post-grid-date {
  display: inline-block;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-block-post-grid-author:not(:last-child):after,
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-block-post-grid-date:not(:last-child):after {
  content: "·";
  vertical-align: middle;
  margin: 0 5px;
  line-height: 1;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-block-post-grid-author a {
  box-shadow: none;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-block-post-grid-author a:hover {
  color: inherit;
  box-shadow: inset 0 -2px 0 #<?php echo $settings->link_color_hover; ?>;
  color: #<?php echo $settings->link_color_hover; ?>;
}
.fl-node-<?php echo $id; ?> .ptam-term-values a {
  color: #<?php echo $settings->link_color; ?>
}
.fl-node-<?php echo $id; ?> .ptam-term-values a:hover {
  color: #<?php echo $settings->link_color_hover; ?>;
  box-shadow: inset 0 -2px 0 #<?php echo $settings->link_color_hover; ?>;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-block-post-grid-text p {
  margin: 0 0 15px 0;
  line-height: 1.5;
  font-size: 18px;
}
@media only screen and (max-width: 600px) {
	.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-block-post-grid-text p {
    font-size: 16px;
  }
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-block-post-grid-text p:last-of-type {
  margin-bottom: 0;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-block-post-grid-link {
  display: inline-block;
  box-shadow: none;
  transition: 0.3s ease;
  font-weight: bold;
  color: #<?php echo $settings->text_color; ?>;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-block-post-grid-link:hover {
  box-shadow: 0 -2px 0 inset;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-block-post-grid-excerpt {
  color: #<?php echo $settings->text_color; ?>;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .ptam-block-post-grid-excerpt div + p {
  margin-top: 15px;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-list article {
  display: grid;
  grid-template-columns: 30% 1fr;
  grid-template-rows: 1fr;
  grid-gap: 0 2em;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-list article:not(:last-child) {
  margin-bottom: 5%;
  padding-bottom: 5%;
}
@media only screen and (min-width: 600px) {
	.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-list article:not(:last-child) {
    border-bottom: solid 1px #eee;
  }
}
@media only screen and (max-width: 600px) {
	.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-list article {
    grid-template-columns: 1fr;
  }
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-list.is-custom article {
  display: block;
  grid-template-columns: 100% 1fr;
  grid-template-rows: 1fr;
  grid-gap: 0 2em;
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-list .ptam-block-post-grid-image {
  margin-bottom: 0;
}
@media only screen and (max-width: 600px) {
	.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-list .ptam-block-post-grid-image {
    margin-bottom: 5%;
  }
}
@media only screen and (min-width: 600px) {
	.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-list .ptam-block-post-grid-title {
    font-size: 34px;
  }
}
.fl-node-<?php echo $id; ?> .ptam-block-post-grid .is-list .no-thumb .ptam-block-post-grid-text {
  grid-column: span 1;
}
<?php
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'heading_typography',
	'selector' 	=> ".fl-node-$id h2.ptam-block-post-grid-title, .fl-node-$id h2.ptam-block-post-grid-title a",
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'meta_typography',
	'selector' 	=> ".fl-node-$id .ptam-block-post-grid .ptam-block-post-grid-byline",
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'excerpt_typography',
	'selector' 	=> ".fl-node-$id .ptam-block-post-grid .ptam-block-post-grid-text p",
) );
FLBuilderCSS::typography_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'readmore_typography',
	'selector' 	=> ".fl-node-$id .ptam-block-post-grid .ptam-block-post-grid-text p .ptam-block-post-grid-link.ptam-text-link",
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'item_padding',
	'selector' 	=> ".fl-node-$id .ptam-post-grid-items article",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'item_padding_top',
		'padding-right'  => 'item_padding_right',
		'padding-bottom' => 'item_padding_bottom',
		'padding-left' 	 => 'item_padding_left',
	),
) );
FLBuilderCSS::dimension_field_rule( array(
	'settings'	=> $settings,
	'setting_name' 	=> 'pagination_padding',
	'selector' 	=> ".fl-node-$id .ptam-pagination",
	'unit'		=> 'px',
	'props'		=> array(
		'padding-top' 	 => 'pagination_padding_top',
		'padding-right'  => 'pagination_padding_right',
		'padding-bottom' => 'pagination_padding_bottom',
		'padding-left' 	 => 'pagination_padding_left',
	),
) );