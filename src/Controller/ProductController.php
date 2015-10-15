<?php

/**
 * @file
 * Contains Drupal\product\Controller\ProductController.
 */

namespace Drupal\product\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;

/**
 * Class ProductController.
 *
 * @package Drupal\product\Controller
 */
class ProductController extends ControllerBase {
  /**
   * Show.
   *
   * @return string
   *   Return Hello string.
   */
  public function show(NodeInterface $node) {
    return [
        '#type' => 'markup',
        '#markup' => $this->t('Product title: $title', array('$title' => $node->getTitle()))
    ];
  }

}
