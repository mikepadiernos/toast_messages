# Toast Messages

Toast Messages is a Drupal module that converts standard Drupal status messages into iziToast notifications. It keeps Drupal message semantics while rendering them as responsive toast popups for status, warning, and error messages.

## Features

- Renders Drupal messages as toast notifications.
- Supports message position, timeout, transitions, themes, and close controls.
- Uses the iziToast library for lightweight, responsive styling.
- Works with Drupal render placeholders and BigPipe-compatible lazy rendering.
- Keeps messages HTML-safe while preserving Drupal message content.

## Requirements

- Drupal core 9.3+, 10, or 11
- The iziToast library available in the site libraries directory at /libraries/iziToast

The module declares the iziToast dependency in [toast_messages.libraries.yml](toast_messages.libraries.yml).

## Installation

1. Place the module in a Drupal custom module directory, such as web/modules/custom/toast_messages.
2. Enable the module:
   - Drupal UI: Extend > Toast Messages
   - Or via Drush: `drush en toast_messages`
3. Ensure the iziToast assets are installed under:
   - /libraries/iziToast/dist/css/iziToast.css
   - /libraries/iziToast/src/js/iziToast.js

## Configuration

After enabling the module, configure it at:

- Administration > Configuration > Development > Toast messages settings

The settings form includes options for:

- message timeout
- toast position
- light/dark theme
- progress bar and pause-on-hover behavior
- close button and close-on-click behavior
- animation transitions
- size options and maximum width
- overlay and display mode

Default configuration is stored in [config/install/izi_message.settings.yml](config/install/izi_message.settings.yml), and the schema is defined in [config/schema/toast_messages.schema.yml](config/schema/toast_messages.schema.yml).

## How it works

The module hooks into Drupal's status messages system and replaces the standard message output with a toast-rendered placeholder. This happens through the pre-render pipeline in [toast_messages.module](toast_messages.module), using the lazy-builder callback in [src/ToastMessages.php](src/ToastMessages.php).

In practice, any standard Drupal message that would normally appear in the page header can be converted to a toast notification without custom message rendering in each template.

## Notes

- This module is a custom local fork/rebrand of the earlier izi_message approach.
- It is designed for this site and maintained as a custom module rather than a generic contributed package.
- The module route is defined in [toast_messages.routing.yml](toast_messages.routing.yml) and is available at /admin/config/development/toast_messages/settings.

## Maintainers

This module is maintained as a custom site module for this project and is not a published Drupal.org contrib release.
