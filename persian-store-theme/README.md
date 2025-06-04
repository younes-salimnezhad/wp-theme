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
-   **Homepage Slider:**
    -   To customize the homepage slider, navigate to `دیجی زاب` -> `تنظیمات اسلایدر` (Slider Settings) in your WordPress admin dashboard.
    -   You can configure up to 3 slides. For each slide, you can set:
        -   **Image URL:** The full URL for the slide's background image. It's recommended to upload images to your WordPress Media Library and use the generated URL.
        -   **Heading Text:** The main title for the slide.
        -   **Description Text:** A short description or additional text for the slide. Basic HTML is allowed if entered carefully.
        -   **Link URL:** A URL the slide will link to if the user clicks the "Learn More" button.
        -   **Activate Slide:** A checkbox to enable or disable the display of this slide.
    -   Remember to click "Save Slider Settings" to apply your changes.
    -   **Note:** The slider will only display slides that are marked "active" and have an Image URL provided. If no slides are active or configured correctly, the slider section will not appear on the homepage.
-   **Widgets:** The current footer is hardcoded with placeholder content. For dynamic footer content, you would typically register widget areas in `functions.php` and then manage them via `Appearance` -> `Widgets`. This can be a future enhancement.
-   **Homepage Content (Other Sections):** The product categories and product listing sections on the homepage are currently placeholders in `index.php`. For dynamic content, these sections would need to be implemented by fetching actual product/category data using WooCommerce functions or other WordPress methods.

## License

This theme is licensed under the MIT License. See the `license.txt` file for details.

---
*This README provides a basic overview. For advanced customization or development, refer to WordPress theme development best practices and the WordPress Codex.*
