<?php

namespace Drupal\cuisine\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class CuisineController : Define Cuisine Options.
 *
 * @package Drupal\cuisine\CuisineController
 */
class CuisineController extends ControllerBase {

  /**
   * {@inheritdoc}
   */
  public function getCuisine() {
    // Get the config settings.
    $cuisine_config = $this->config('cuisine.settings');
    // Add Render Array & add showcase #attached property.
    $build = [
      '#type' => 'item',
      '#markup' => '<b class="cuisine">' . $this->t('@foo') . ' </b>' . '<span class="chinese_items"></span>',
      '#prefix' => '<div class="cusine_container">',
      '#suffix' => '</div>',
      '#attached' => [
        'library' => 'cuisine/cuisine.chinese',
        'drupalSettings' => [
          'chinese_ingredients' => $cuisine_config->get('chinese_ingredients'),
        ],
        'http_header' => [
          ['X-Cuisine', 'Chinese Sauces'],
        ],
        'html_head_link' => [
          [
            [
              'rel' => 'author',
              'href' => 'https://www.drupal.org/u/kunalkursija',
            ],
          ],
        ],
        'html_head' => [
          [
            [
              '#tag' => 'meta',
              '#attributes' => [
                'name' => 'Cuisine',
                'description' => 'Chinese Sauces',
              ],
            ],
            'Cuisine',
          ],
        ],
        'feed' => [
          ['/rss.xml', 'Default Feeds By Drupal Core.'],
        ],
        "placeholders" => [
          "@foo" => ["#markup" => "Chinese Sauces:"],
        ],
      ],
    ];
    return $build;
  }

}
