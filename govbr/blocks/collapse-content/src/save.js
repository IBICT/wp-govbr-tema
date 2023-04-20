/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */
export default function Save(props) {
	const {
		attributes
	} = props;

	const blockProps = useBlockProps.save({ id: 'brgov-collapse--' + attributes.parentBlockId });
	const innerBlocksProps = useInnerBlocksProps.save({});

	return (
		<div { ...blockProps } >
			<div { ...innerBlocksProps } />
		</div>
	);
}
