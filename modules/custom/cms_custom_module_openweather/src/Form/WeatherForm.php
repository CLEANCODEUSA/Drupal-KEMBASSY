<?php

/**
   * @file
   * Contains \Drupal\cms_custom_module_openweather\Form\WeatherForm.
    */

namespace Drupal\cms_custom_module_openweather\Form;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\ConfigFormBase;

class WeatherForm extends FormBase {

    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'cms_custom_module_openweather_form';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        $form['user_zip_code'] = array(
            '#type' => 'textfield',
            '#title' => t('Zip Code:'),
            '#required' => TRUE,
        );

        //$form['actions']['#type'] = 'actions';
        $form['actions']['submit'] = array(
            '#type' => 'submit',
            '#value' => $this->t('Search'),
            '#button_type' => 'primary',
        );
        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
        
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        // $current_path = \Drupal::service('path.current')->getPath();
        // $user_zip = $form_state->getValue('user_zip_code');
        // foreach ($form_state->getValues() as $key => $value) {
        drupal_set_message($user_zip . "====" . $current_path);
        // }
    }

}
