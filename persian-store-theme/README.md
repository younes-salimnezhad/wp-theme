# Persian Store Theme

A WordPress theme designed for detergent and health products stores, with a focus on Farsi language and RTL layout. This theme provides a basic structure for an online shop using WooCommerce.

## Folder Structure

```
persian-store-theme/
├── css/
│   └── fonts.css
├── fonts/
│   └── (Vazirmatn-VariableFont_wght.woff2) <-- User needs to create this directory and add the font file
├── footer.php
├── functions.php
├── header.php
├── index.php
├── license.txt
├── page.php
├── README.md
├── screenshot.png
├── single.php
└── style.css
```
*(Note: Additional directories like `images/`, `js/`, `inc/`, `template-parts/` can be added as needed for further development.)*

## Installation

1.  **Download the Theme:**
    *   If you have a zipped version (`persian-store-theme.zip`), use that.
    *   If you have the theme files directly, create a zip file from the `persian-store-theme` folder.

2.  **Add Vazirmatn Font:**
    *   Download the Vazirmatn font (e.g., `Vazirmatn-VariableFont_wght.woff2`) from a trusted source (like its [GitHub repository](https://github.com/rastikerdar/vazirmatn/releases)).
    *   If you have the theme zipped, unzip it.
    *   Create a `fonts` directory inside the `persian-store-theme` directory if it doesn't already exist.
    *   Place the downloaded `.woff2` font file (e.g., `Vazirmatn-VariableFont_wght.woff2`) into the `persian-store-theme/fonts/` directory.
    *   If you unzipped the theme, re-zip the `persian-store-theme` folder for uploading to WordPress.

3.  **Upload to WordPress:**
    *   Log in to your WordPress admin panel.
    *   Navigate to `Appearance` -> `Themes`.
    *   Click `Add New` and then `Upload Theme`.
    *   Choose the `persian-store-theme.zip` file and click `Install Now`.

4.  **Activate the Theme:**
    *   Once uploaded, click `Activate`.

## WooCommerce

This theme includes basic support and styling for WooCommerce. For full e-commerce functionality, ensure the WooCommerce plugin is installed and activated on your WordPress site.

## Customization

-   **Site Title & Tagline:** Can be set via `Appearance` -> `Customize` -> `Site Identity`.
-   **Navigation Menu:** Manage menus via `Appearance` -> `Menus`. Ensure your primary menu is created and assigned to the 'Primary Menu' theme location.
-   **Widgets:** The current footer is hardcoded with placeholder content. For dynamic footer content, you would typically register widget areas in `functions.php` and then manage them via `Appearance` -> `Widgets`. This can be a future enhancement.
-   **Homepage Content:** The homepage sections (slider, categories, featured products) are currently placeholders in `index.php`. For dynamic content, these sections would need to be implemented using WordPress features like Customizer options, custom fields, or by fetching actual product/category data.

## License

This theme is licensed under the MIT License. See the `license.txt` file for details.

---
*This README provides a basic overview. For advanced customization or development, refer to WordPress theme development best practices and the WordPress Codex.*
