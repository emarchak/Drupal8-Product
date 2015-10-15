<?php

/**
 * @file
 * Contains Drupal\product\Tests\ProductController.
 */

namespace Drupal\product\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provides automated tests for the product module.
 */
class ProductControllerTest extends WebTestBase {
  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return array(
      'name' => "product ProductController's controller functionality",
      'description' => 'Test Unit for module product and controller ProductController.',
      'group' => 'Other',
    );
  }

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
  }

  /**
   * Tests product functionality.
   */
  public function testProductController() {
    // Check that the basic functions of module product.
    $this->assertEqual(TRUE, TRUE, 'Test Unit Generated via App Console.');
  }

  publicc function testPostalCodeValidation
}
