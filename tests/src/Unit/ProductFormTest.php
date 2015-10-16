<?php

/**
 * @file
 * Contains Drupal\Tests\product\Unit\ProductFormTest.
 */

namespace Drupal\product\Tests\Unit;

use Drupal\Tests\UnitTestCase;
use Drupal\product\Form\ProductRequestForm;

/**
 * Tests generation of validation of product order form.
 *
 * @group product
 */
class ProductFormTest extends UnitTestCase {
  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return array(
      'name' => "Product ProductRequestForm's tests",
      'description' => 'Test Unit for module product and form ProductRequestForm.',
      'group' => 'product',
    );
  }

  /**
   * Get an accessible method using reflection.
   */
  public function getAccessibleMethod($class_name, $method_name) {
    $class = new \ReflectionClass($class_name);
    $method = $class->getMethod($method_name);
    $method->setAccessible(TRUE);
    return $method;
  }

  private static function getValidPostalCode() {
    return 'M6G 2S5';
  }
  private static function getInvalidPostalCode() {
    return '90210';
  }

  /**
   * Test Valid postal codes.
   */
  public function testPostalCodeValid() {
    $postalCodeValidator = $this->getAccessibleMethod(
      'Drupal\product\Form\ProductRequestForm',
      'validPostalCode'
    );
    $form = new ProductRequestForm();
    $postal_code = $this->getValidPostalCode();

    $this->assertTrue($postalCodeValidator->invokeArgs($form, array($postal_code)));
  }

  /**
   * Test invalid postal codes.
   */
  public function testPostalCodeInvalid() {
    $postalCodeValidator = $this->getAccessibleMethod(
      'Drupal\product\Form\ProductRequestForm',
      'validPostalCode'
    );
    $form = new ProductRequestForm();
    $postal_code = $this->getInvalidPostalCode();

    $this->assertFALSE($postalCodeValidator->invokeArgs($form, array($postal_code)));
  }
}
