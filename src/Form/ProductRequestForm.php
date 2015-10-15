<?php

/**
 * @file
 * Contains Drupal\product\Form\ProductRequestForm.
 */

namespace Drupal\product\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ProductRequestForm.
 *
 * @package Drupal\product\Form
 */
class ProductRequestForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'product_request_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#required' => TRUE,
    );
    $form['telephone'] = array(
      '#type' => 'tel',
      '#title' => $this->t('Telephone'),
      '#required' => TRUE,
    );
    $form['address'] = array(
      '#type' => 'fieldset',
      '#title' => t('Address'),
    );

    $form['address']['street'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Street'),
      '#required' => TRUE,
    );
    $form['address']['city'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('City'),
      '#required' => TRUE,
    );
    $form['address']['province'] = array(
      '#type' => 'select',
      '#title' => $this->t('Province'),
      '#required' => TRUE,
      '#options' => array(
        'AB' => $this->t('Alberta'),
        'BC' => $this->t('British Columbia'),
        'MB' => $this->t('Manitoba'),
        'NB' => $this->t('New Brunswick'),
        'NL' => $this->t('Newfoundland and Labrador'),
        'NS' => $this->t('Nova Scotia'),
        'ON' => $this->t('Ontario'),
        'PE' => $this->t('Prince Edward Island'),
        'QC' => $this->t('Quebec'),
        'SK' => $this->t('Saskatchewan'),
        'NT' => $this->t('Northwest Territories'),
        'NU' => $this->t('Nunavut'),
        'YT' => $this->t('Yukon Territory'),
      )
    );
    $form['address']['postal'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Postal Code'),
      '#required' => TRUE,
      '#size'=> 6,
      '#maxlength'=> 7,
    );

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Request Product'),
      '#button_type' => 'primary',
    );

    return $form;
  }


  /**
   * Helper function to validate postal codes.
   * @param $postal_code
   * @return bool
   */
  private function validPostalCode($postal_code) {
    $postal_code_regex = "/^([a-ceghj-npr-tv-z]){1}[0-9]{1}[a-ceghj-npr-tv-z]{1} [0-9]{1}[a-ceghj-npr-tv-z]{1}[0-9]{1}$/i";
    if (preg_match($postal_code_regex, $postal_code) == 1) {
      return true;
    }
    return false;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

    if (!$this->validPostalCode($form_state->getValue('postal'))) {
      $form_state->setErrorByName('postal', $this->t('This is not a valid postal code'));
    }
  }


  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    drupal_set_message($this->t('Your name is @name', array('@name' => $form_state->getValue('name'))));
    drupal_set_message($this->t('Your phone number is @number', array('@number' => $form_state->getValue('telephone'))));

  }
}
