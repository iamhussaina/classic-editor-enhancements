# Classic Editor Quicktags Enhancement

A Quicktags (editor buttons) to the WordPress Classic Editor's "Text" view. This module is designed to be included within a WordPress theme and follows modern OOP and WordPress coding standards.

## Features

* **OOP Design:** Clean, maintainable, and encapsulated in a final class.
* **Lightweight:** Only loads the necessary JavaScript on post editing screens.
* **Extensible:** Provides clear examples for adding three types of buttons:
    1.  Simple HTML wrappers (e.g., a `<div>` box).
    2.  Simple shortcode insertion (e.g., `[my_shortcode]`).
    3.  Complex buttons with JavaScript prompts (e.g., a custom link builder).
* **Localization Ready:** All user-facing strings are passed via `wp_localize_script` and are translatable using the `hussainas` text domain.

---

## 🚀 Installation & Usage

This module is intended to be bundled with a WordPress theme.

1.  **Copy the Module:**
    Place the entire `classic-editor-enhancements` folder into your theme's directory (e.g., `wp-content/themes/your-theme/classic-editor-enhancements`).

2.  **Include the Module:**
    Open your theme's `functions.php` file and add the following line of PHP to include the module's loader:

    ```php
    // Load the Classic Editor Quicktags enhancement.
    require_once get_template_directory() . '/classic-editor-enhancements/load.php';
    ```

3.  **Activate and Verify:**
    Ensure you have the **Classic Editor** plugin installed and activated (or have disabled the block editor via code). Go to **Posts > Add New** and switch to the **"Text"** tab. You should see three new buttons: "Warning", "Shortcode", and "Link Button".


