<?php

namespace Drupal\cms_custom_module_openweather\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Contribute form.
 */
class PassConfigForm extends ConfigFormBase {

    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'openweather_appid_form';
    }

    /**
     * {@inheritdoc}
     */
    protected function getEditableConfigNames() {
        return ['cms_custom_module_openweather.settings'];
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        $form = parent::buildForm($form, $form_state);
        $form['appid'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('App Id'),
            '#required' => TRUE,
            '#default_value' => $this->config('cms_custom_module_openweather.settings')->get('appid'),
        );
        $form['input_value'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Enter the zipcode'),
            '#required' => TRUE,
            '#default_value' => $this->config('cms_custom_module_openweather.settings')->get('input_value'),
        );
        $form['count'] = array(
            '#type' => 'number',
            '#min' => '1',
            '#title' => $this->t('Enter the number count'),
            '#default_value' => $this->config('cms_custom_module_openweather.settings')->get('count'),
            '#required' => TRUE,
            '#description' => $this->t('Select the count in case of hourlyforecast maximum value should be 36 and in case of daily forecast maximum value should be 7. in case of current weather forecast value is the default value'),
        );

        $form['display_select'] = array(
            '#type' => 'select',
            '#title' => $this->t('Select your option'),
            '#options' => array(
                'current_details' => $this->t('Current Details'),
                'forecast_hourly' => $this->t('Forecast after 3 hours each'),
                'forecast_daily' => $this->t('Daily Forecast'),
            ),
            '#default_value' => !empty($config['display_type']) ? $config['display_type'] : 'current_details',
        );
        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $this->config('cms_custom_module_openweather.settings')
                ->set('appid', $form_state->getValue('appid'))
                ->set('input_value', $form_state->getValue('input_value'))
                ->set('count', $form_state->getValue('count'))
                ->set('display_type', $form_state->getValue('display_type'))
                ->save();
        parent::submitForm($form, $form_state);
    }

}
