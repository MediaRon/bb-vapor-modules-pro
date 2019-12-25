<?php
/**
 * LearnDash Marquee
 *
 * @link https://bbvapormodules.com
 *
 * @package BB Vapor Modules
 * @since 2.0.0
 */

// marquee styles.
?>
@keyframes bbvm-slide {
	from { left: 100%;}
	to { left: -100%;}
}
@-webkit-keyframes bbvm-slide {
	from { left: 100%;}
	to { left: -100%;}
	}

.marquee { 
	color:red; 
	background:#f0f0f0;
	width:100%;
	height:120px;
	line-height:120px;
	overflow:hidden;
	position:relative;
}

.text {
	position:absolute;
	top:0;
	left:0;
	width:100%;
	height:120px;
	font-size:30px;
	animation-name: bbvm-slide;
	animation-duration: 10s;
	animation-timing-function: linear;
	animation-iteration-count: infinite;
	-webkit-animation-name: bbvm-slide;
	-webkit-animation-duration: 10s;
	-webkit-animation-timing-function:linear;
	-webkit-animation-iteration-count: infinite;
}
