/**
 * @file
 * Attaches the behaviors for extlink_overlay module.
 */

(function ($) {
  Drupal.behaviors.cuisineController = {
    attach: function (context, settings) {

      // Add HTML to Chinese items from our drupalSettings.
      $('.chinese_items').html(drupalSettings.chinese_ingredients);

    }
  };
})(jQuery, Drupal, drupalSettings);
