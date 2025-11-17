<?php
/**
 * Main class for loading and managing the custom Quicktags.
 *
 * @package     HussainasQuicktags
 * @version     1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Hussainas_Quicktags_Loader Class.
 *
 * Handles the enqueuing of scripts and localization for the custom quicktags.
 */
final class Hussainas_Quicktags_Loader {

	/**
	 * Constructor.
	 *
	 * Sets up the necessary action hooks for enqueuing scripts.
	 */
	public function __construct() {
		// Hook into admin_enqueue_scripts to load our JavaScript.
		add_action( 'admin_enqueue_scripts', array( $this, 'hussainas_enqueue_editor_scripts' ) );
	}

	/**
	 * Enqueues the JavaScript file for custom quicktags.
	 *
	 * Only loads on post editing screens (post.php and post-new.php).
	 *
	 * @param string $hook_suffix The current admin page hook.
	 */
	public function hussainas_enqueue_editor_scripts( $hook_suffix ) {
		
		// 1. Target specific admin pages.
		// We only want to load this on post edit/new screens.
		if ( 'post.php' !== $hook_suffix && 'post-new.php' !== $hook_suffix ) {
			return;
		}

		// 2. Check if the user has rich editing enabled.
		// Quicktags are part of the 'text' editor, which is available
		// regardless, but this is a good practice check.
		if ( 'true' !== get_user_option( 'rich_editing' ) ) {
			return;
		}

		// 3. Register the script.
		wp_register_script(
			'hussainas-admin-quicktags', // Handle
			HUSSAINAS_QUICKTAGS_URL . '/assets/js/hussainas-admin-quicktags.js', // File URL
			array( 'quicktags' ), // Dependencies (requires WordPress 'quicktags')
			HUSSAINAS_QUICKTAGS_VERSION, // Version
			true // Load in footer
		);

		// 4. Localize the script
		// Pass translatable (but English by default) strings to the JS file.
		// This is a professional practice for future-proofing.
		$l10n_strings = array(
			'warning_box'   => __( 'Warning', 'hussainas' ),
			'warning_tip'   => __( 'Add a warning box', 'hussainas' ),
			'shortcode_btn' => __( 'Shortcode', 'hussainas' ),
			'shortcode_tip' => __( 'Insert Custom Shortcode', 'hussainas' ),
			'link_btn'      => __( 'Link Button', 'hussainas' ),
			'link_tip'      => __( 'Insert a styled link button', 'hussainas' ),
			'prompt_url'    => __( 'Enter the URL:', 'hussainas' ),
			'prompt_text'   => __( 'Enter the link text:', 'hussainas' ),
		);

		wp_localize_script(
			'hussainas-admin-quicktags', // Target script handle
			'hussainasQuicktagsL10n', // JavaScript object name
			$l10n_strings // Data
		);

		// 5. Enqueue the script.
		wp_enqueue_script( 'hussainas-admin-quicktags' );
	}
}
