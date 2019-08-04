import axios from 'axios';

const { Component, Fragment } = wp.element;
const { withSelect } = wp.data;
const { __, _x } = wp.i18n;

const {
	PanelBody,
	Placeholder,
	SelectControl,
	TextControl,
	Toolbar,
	ToggleControl,
	Button,
	RangeControl,
	ButtonGroup,
	PanelRow,
	Spinner,
} = wp.components;

const {
	InspectorControls,
	BlockControls,
	MediaUpload,
	PanelColorSettings,
} = wp.editor;

const {
	RichText
} = wp.blockEditor;


class BB_Vapor_Row_Block extends Component {

	constructor() {

		super( ...arguments );
		let loading = true;
		if ( this.props.attributes.row.length > 0 ) {
			loading = false;
		}
		this.state = {
			loading: loading,
		};
	};

	getSavedRows = () => {
		const refThis = this;
		axios.post(bb_vapor.rest_url + `bbvapor/v1/get_rows/`, {}, { 'headers': { 'X-WP-Nonce': bb_vapor.rest_nonce } } ).then( (response) => {
			this.setState(
				{
					loading: false,
					posts: response.data,
				}
			);
		})
		.catch(function (error) {
			refThis.setState(
				{
					loading: false,
				}
			)
		});
	}

	getRowContent = ( rowId ) => {
		this.setState(
			{
				loading: true,
			}
		);
		const refThis = this;
		axios.post(bb_vapor.rest_url + `bbvapor/v1/get_row_content/`, { id: rowId }, { 'headers': { 'X-WP-Nonce': bb_vapor.rest_nonce } } ).then( (response) => {
			refThis.props.attributes.title = response.data;
			refThis.setState(
				{
					loading: false,
					title: response.data,
				}
			);
		})
		.catch(function (error) {
			refThis.setState(
				{
					loading: false,
				}
			);
		});
	}

	componentDidMount = () => {
		this.getSavedRows();
	}

	render() {
		const { post, setAttributes } = this.props;
		const { row, title } = this.props.attributes;

		let savedRows = this.state.posts;
		let savedRowsArray = [ { value: 0, label: __('Select a Row', 'bb-vapor-modules-pro' )}];
		for (var key in savedRows) {
			savedRowsArray.push({value: savedRows[key].ID, label: savedRows[key].post_title});
		};

		const inspectorControls = (
			<InspectorControls>
				<PanelBody title={ __( 'Saved Rows', 'bb-vapor-modules-pro' ) }>

					<SelectControl
							label={ __( 'Saved Rows', 'bb-vapor-modules-pro' ) }
							options={ savedRowsArray }
							value={ row }
							onChange={ ( value ) => { setAttributes( { row: value } ); this.getRowContent(value); } }
					/>
				</PanelBody>
			</InspectorControls>
		);

		return (
			<Fragment>
				{this.state.loading &&
				<Fragment>
					<Placeholder>
						<div>
							<Spinner />
						</div>
					</Placeholder>
				</Fragment>
				}
				{!this.state.loading && '' === row &&
					<Fragment>
						{ inspectorControls }
						<Placeholder>
							{__('Select a Row', 'bb-vapor-modules-pro')}
						</Placeholder>
					</Fragment>
				}
				{!this.state.loading && '' !== row &&
					<Fragment>
						{ inspectorControls }
						{title + ' ' + __('Row Inserted. Preview the Post to See the Row.', 'bb-vapor-modules-pro')}
					</Fragment>
				}
			</Fragment>
		);
	}
}
export default withSelect(select => {
	const { getCurrentPost } = select("core/editor");

	return {
		post: getCurrentPost(),
	};
})(BB_Vapor_Row_Block);