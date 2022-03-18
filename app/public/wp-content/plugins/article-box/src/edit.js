/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
 */
import { useBlockProps } from '@wordpress/block-editor';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function Edit(props) {

	function updateTitle(event) {
		props.setAttributes({ title: event.target.value });
	  }
  
	  function updateContent(event) {
		props.setAttributes({ content: event.target.value });
	  }

	//   function updateDate(event) {
	// 	props.setAttributes({ content: event.target.value });
	//   }

	return (
		<div { ...useBlockProps() }>
			<label for="title">Enter Title:</label>
			<input id="title" name="title" type="text" value={props.attributes.title} onChange={updateTitle}></input>
			<br></br>
			<label for="content">Write Your Post Here:</label>
			<textarea type="text" id="content" name="content" rows="10" cols="50" value={props.attributes.content} onChange={updateContent}></textarea>
			{/* <br></br>
			<label for="date">Enter Date:</label>
			<input type="date" id="date" name="date" value={props.attributes.date} onChange={updateDate}></input> */}
		</div>
	);
}
