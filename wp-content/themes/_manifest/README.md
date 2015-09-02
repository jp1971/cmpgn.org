# Manifest WordPress Parent Theme

This repository, along with [manifest-scaffold](https://github.com/athletics/manifest-scaffold) and [manifest-child](https://github.com/athletics/manifest-child), forms a complete system for rapidly bootstrapping a modern WordPress development environment.

This repository provides the Manifest (_mnfst) WordPress parent theme. The [Timber](http://upstatement.com/timber/) WordPress plugin is loaded by this theme by default. A number of other plugins and custom functions are availble from the theme's settings page located at **Settings > Manifest** in the WordPress Admin. By default, this settings page is hidden. To expose it, add the following constant definition to wp-config.php - `define( 'MNFST_DEV', true );`.