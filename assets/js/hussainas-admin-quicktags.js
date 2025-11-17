
/**
 * Hussainas Admin Quicktags
 *
 * Adds custom buttons to the WordPress Classic Editor (Text/HTML view).
 *
 * @package     HussainasQuicktags
 * @version     1.0.0
 */

(function ($) {
    'use strict';

    // Ensure the QTags object is defined.
    // If it's not (e.g., visual editor is disabled), we don't proceed.
    if (typeof QTags === 'undefined') {
        return;
    }

    // Use the localized strings passed from PHP, with fallbacks.
    var l10n = window.hussainasQuicktagsL10n || {};

    /**
     * Button 1: Simple HTML Wrapper
     *
     * Adds a 'Warning' button that wraps selected text in a <div>.
     */
    QTags.addButton(
        'hussainas_warning_box', // Unique ID
        l10n.warning_box || 'Warning', // Button text
        '<div class="hussainas-warning-box">', // Start tag
        '</div>', // End tag
        'w', // Access key (alt + shift + w)
        l10n.warning_tip || 'Add a warning box', // Tooltip
        130 // Position (lower numbers are higher up)
    );

    /**
     * Button 2: Simple Shortcode Insertion
     *
     * Adds a 'Shortcode' button that inserts a self-closing shortcode.
     */
    QTags.addButton(
        'hussainas_custom_shortcode', // Unique ID
        l10n.shortcode_btn || 'Shortcode', // Button text
        '[hussainas_example_shortcode]', // Start tag (content to insert)
        null, // End tag (null for self-closing/single insertion)
        's', // Access key
        l10n.shortcode_tip || 'Insert Custom Shortcode', // Tooltip
        131 // Position
    );

    /**
     * Button 3: Complex Button with Prompt
     *
     * Adds a 'Link Button' that prompts the user for a URL and Text,
     * then inserts a styled <a> tag.
     */
    QTags.addButton(
        'hussainas_link_button', // Unique ID
        l10n.link_btn || 'Link Button', // Button text
        function () {
            // Use QTags.prompt() for consistency, though window.prompt works.
            var url = prompt(l10n.prompt_url || 'Enter the URL:', 'https://');
            var text = prompt(l10n.prompt_text || 'Enter the link text:', 'Click Here');

            // Only insert content if both prompts are filled (and not cancelled)
            if (url && text) {
                // Use QTags.insertContent() to add the custom string.
                QTags.insertContent(
                    '<a href="' + encodeURI(url) + '" class="hussainas-styled-button">' + text + '</a>'
                );
            }
        },
        null, // No end tag needed, handled by insertContent
        'l', // Access key
        l10n.link_tip || 'Insert a styled link button', // Tooltip
        132 // Position
    );

}(jQuery));
