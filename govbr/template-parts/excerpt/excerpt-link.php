<?php
/**
 * Show the appropriate content for the Link post format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gov_BR
 * @since GovBR 0.1.0
 */

// Print the 1st instance of a paragraph block. If none is found, print the content.
if ( has_block( 'core/paragraph', get_the_content() ) ) {

	gov_br_print_first_instance_of_block( 'core/paragraph', get_the_content() );
} else {

	the_content();
}
