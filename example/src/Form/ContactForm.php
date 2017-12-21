<?php
/**
 * @file
 * Contains \Drupal\example\Form\ContactForm.
 */
namespace Drupal\example\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class ContactForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'contact_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['contact_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Candidate Name:'),
      '#required' => TRUE,
    );

    $form['contact_mail'] = array(
      '#type' => 'email',
      '#title' => t('Email ID:'),
      '#required' => TRUE,
    );

    $form['contact_message'] = array (
      '#type' => 'textarea',
      '#title' => t('Message'),
	  '#required' => TRUE,
    );

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Send'),
      '#button_type' => 'primary',
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
	  
    // Insert the record to table.
	db_insert('example')
	   ->fields([
		'name' => $form_state->getValue('contact_name'),
		'emailid' => $form_state->getValue('contact_mail'),	
		'message' =>  $form_state->getValue('contact_message'),
	])
	->execute();
		
    drupal_set_message($this->t('@can_name ,Your application is being submitted!', array('@can_name' => $form_state->getValue('contact_name'))));

   }
}