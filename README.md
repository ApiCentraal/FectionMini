# FectionMini

A minimal WordPress starter theme with Bootstrap 5 (latest) via CDN and customizer functions to edit the basics.

## Features

- **Bootstrap 5.3.3** integrated via CDN (CSS and JS)
- **WordPress Customizer** support for:
  - Header settings (background color, text color, padding)
  - Footer settings (background color, text color, padding, custom text)
  - Typography settings (body font, body font size, heading font)
  - Container settings (max width, padding)
  - Site identity (logo, title, tagline) - built-in WordPress support
- **Responsive design** powered by Bootstrap's grid system
- **Navigation menus** (Primary and Footer) with Bootstrap styling
- **Widget areas** (Sidebar and Footer)
- **Template files** included:
  - index.php (main blog template)
  - single.php (single post template)
  - page.php (page template)
  - archive.php (archive template)
  - search.php (search results template)
  - 404.php (error page template)
  - header.php and footer.php
  - sidebar.php
- **WordPress theme support** for:
  - Custom logo
  - Post thumbnails
  - Title tag
  - HTML5 markup
  - Selective refresh in customizer

## Installation

1. Download or clone this repository
2. Upload the `FectionMini` folder to your WordPress installation's `wp-content/themes/` directory
3. Activate the theme from the WordPress admin panel (Appearance > Themes)
4. Customize your theme via Appearance > Customize

## Customization

### Using the WordPress Customizer

Navigate to **Appearance > Customize** in your WordPress admin panel. You'll find the following sections:

#### Header Settings
- **Header Background Color**: Set the background color for your site header
- **Header Text Color**: Set the text color for header elements
- **Header Padding**: Adjust vertical padding for the header (in pixels)

#### Footer Settings
- **Footer Background Color**: Set the background color for your site footer
- **Footer Text Color**: Set the text color for footer elements
- **Footer Padding**: Adjust vertical padding for the footer (in pixels)
- **Footer Text**: Customize the copyright text or footer content

#### Typography Settings
- **Body Font Family**: Set the font family for body text (e.g., "Arial, sans-serif")
- **Body Font Size**: Adjust the base font size (12-24px)
- **Heading Font Family**: Set a different font for headings (h1-h6)

#### Container Settings
- **Container Max Width**: Set the maximum width for content containers (960-1920px)
- **Container Padding**: Adjust horizontal padding for containers (0-50px)

### Menus

Set up your navigation menus at **Appearance > Menus**:
- **Primary Menu**: Main navigation in the header
- **Footer Menu**: Links in the footer area

### Widgets

Add widgets to your sidebar and footer at **Appearance > Widgets**:
- **Sidebar**: Appears on blog posts and archives
- **Footer**: Appears in the footer area

## Theme Structure

```
FectionMini/
├── inc/
│   └── class-wp-bootstrap-navwalker.php  # Bootstrap menu walker
├── js/
│   └── customizer.js                      # Live preview for customizer
├── 404.php                                # 404 error page template
├── archive.php                            # Archive template
├── footer.php                             # Footer template
├── functions.php                          # Theme functions and setup
├── header.php                             # Header template
├── index.php                              # Main template
├── page.php                               # Page template
├── README.md                              # This file
├── search.php                             # Search results template
├── sidebar.php                            # Sidebar template
├── single.php                             # Single post template
└── style.css                              # Theme stylesheet and metadata
```

## Requirements

- WordPress 5.0 or higher
- PHP 7.0 or higher

## Browser Support

This theme uses Bootstrap 5, which supports:
- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## Credits

- Bootstrap 5.3.3 - https://getbootstrap.com/
- WordPress - https://wordpress.org/

## License

This theme is licensed under the GNU General Public License v2 or later.

## Support

For issues, questions, or contributions, please visit:
https://github.com/ApiCentraal/FectionMini
