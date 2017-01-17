<?php
namespace Nimbium\MyPlugin;

class Core extends Plugin {

    public static function load() {

      // Add page-slug to <body> tag for easier use in CSS selectors
      add_filter( 'body_class', function($classes) {
          self::add_body_classes($classes);
      });

    }

    private static function add_body_classes($classes) {

        $classes[] = is_front_page() ? 'page-front' : (is_single() ? 'page-single' : 'page-'.Helpers::get_page_slug() );
        if(is_archive()) $classes[] = 'page-search';
        return $classes;

    }

}