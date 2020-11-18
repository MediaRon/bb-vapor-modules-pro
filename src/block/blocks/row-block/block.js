const {__} = wp.i18n; // Import __() from wp.i18n
const {registerBlockType} = wp.blocks; // Import registerBlockType() from wp.blocks
const {Component, Fragment} = wp.element;
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
registerBlockType('bbvapor/row-block', {
	title: __('Vapor Row', 'bb-vapor-modules-pro'), // Block title.
	icon: {
		src: (
			<svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="grip-horizontal" class="svg-inline--fa fa-grip-horizontal fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><g class="fa-group"><path class="fa-secondary" fill="#b01b1b" d="M96 288H32a32 32 0 0 0-32 32v64a32 32 0 0 0 32 32h64a32 32 0 0 0 32-32v-64a32 32 0 0 0-32-32zm160 0h-64a32 32 0 0 0-32 32v64a32 32 0 0 0 32 32h64a32 32 0 0 0 32-32v-64a32 32 0 0 0-32-32zm160 0h-64a32 32 0 0 0-32 32v64a32 32 0 0 0 32 32h64a32 32 0 0 0 32-32v-64a32 32 0 0 0-32-32z" opacity="0.5"></path><path class="fa-primary" fill="#b01b1b" d="M416 96h-64a32 32 0 0 0-32 32v64a32 32 0 0 0 32 32h64a32 32 0 0 0 32-32v-64a32 32 0 0 0-32-32zM96 96H32a32 32 0 0 0-32 32v64a32 32 0 0 0 32 32h64a32 32 0 0 0 32-32v-64a32 32 0 0 0-32-32zm160 0h-64a32 32 0 0 0-32 32v64a32 32 0 0 0 32 32h64a32 32 0 0 0 32-32v-64a32 32 0 0 0-32-32z"></path></g></svg>
		),
	},
	category: 'vapor',
	keywords: [
		__('beaver builder', 'bb-vapor-modules-pro'),
		__('row block', 'bb-vapor-modules-pro'),
		__('row', 'bb-vapor-modules-pro'),
		__('beaver', 'bb-vapor-modules-pro'),
		__('vapor', 'bb-vapor-modules-pro'),
	],
	supports: {
		align: true,
	},
	edit: edit,
	save() {
		return null;
	},
});

(function () {
	const VaporIcon = (
		<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 41.84 45.87'>
			<path
				d='M270.68,180.27h7.56l-20.52,45.86h-.79L236.4,180.27h7.42l13.54,31.25Z'
				transform='translate(-236.4 -180.27)'
				fill='#09306b'
			/>
		</svg>
	);
	wp.blocks.updateCategory('vapor', {icon: VaporIcon});
})();
