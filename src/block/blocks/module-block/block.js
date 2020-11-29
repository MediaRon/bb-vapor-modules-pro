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
registerBlockType('bbvapor/module-block', {
	title: __('Vapor Module', 'bb-vapor-modules-pro'), // Block title.
	icon: {
		src: (
			<svg
				aria-hidden='true'
				focusable='false'
				data-prefix='fad'
				data-icon='box'
				class='svg-inline--fa fa-box fa-w-16'
				role='img'
				xmlns='http://www.w3.org/2000/svg'
				viewBox='0 0 512 512'
			>
				<g class='fa-group'>
					<path
						class='fa-secondary'
						fill='#b01b1b'
						d='M512 224v240a48 48 0 0 1-48 48H48a48 48 0 0 1-48-48V224z'
						opacity='0.4'
					></path>
					<path
						class='fa-primary'
						fill='#b01b1b'
						d='M53.1 32.8L2.5 184.6c-.8 2.4-.8 4.9-1.2 7.4H240V0H98.6a47.87 47.87 0 0 0-45.5 32.8zm456.4 151.8L458.9 32.8A47.87 47.87 0 0 0 413.4 0H272v192h238.7c-.4-2.5-.4-5-1.2-7.4z'
					></path>
				</g>
			</svg>
		),
	},
	category: 'vapor',
	keywords: [
		__('beaver builder', 'bb-vapor-modules-pro'),
		__('module block', 'bb-vapor-modules-pro'),
		__('module', 'bb-vapor-modules-pro'),
		__('beaver', 'bb-vapor-modules-pro'),
		__('vapor', 'bb-vapor-modules-pro'),
	],
	supports: {
		align: false,
		classname: true,
		anchor: true,
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
