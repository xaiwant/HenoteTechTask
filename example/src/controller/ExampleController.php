<?php

/**
 * @file
 * @author Your Name
 * Contains \Drupal\example\Controller\ExampleController.
 */
 
 
 namespace Drupal\example\Controller;
 
 use Drupal\Core\Url;
 
 /**
 * Provides route responses for the Example module.
 */
class ExampleController {
	
	

	/**
     * Returns a simple page.
     *
     * @return array
     *   A simple renderable array.
     */
    public function home() {
		
		$url = Url::fromRoute('example.contact_form');
        $internal_link = \Drupal::l(t('Contact Page'), $url);
        $element = array(
            '#markup' => t('Hello. This is my First Page. <br> Cick here to redirect to'). ' ' .$internal_link ,
        );
        return $element;
    }
}	