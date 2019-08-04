const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks
const { Component, Fragment } = wp.element;
import edit from './edit';

/**
 * Register Basic Block.
 *
 * Registers a new block provided a unique name and an object defining its
 * behavior. Once registered, the block is made available as an option to any
 * editor interface where blocks are implemented.
 *
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */
registerBlockType( 'bbvapor/row-block', {
	title: __( 'BB Vapor Row Block', 'user-profile-picture-enhanced' ), // Block title.
	icon: 'image-flip-horizontal',
	category: 'widget',
	keywords: [
		__( 'beaver builder', 'bb-vapor-modules-pro' ),
		__( 'row block', 'bb-vapor-modules-pro' ),
		__( 'row', 'bb-vapor-modules-pro' ),
		__( 'beaver', 'bb-vapor-modules-pro' ),
		__( 'vapor', 'bb-vapor-modules-pro' )
	],
	supports: {
		align: true
	},
	edit: edit,
	save() {return null }
} );