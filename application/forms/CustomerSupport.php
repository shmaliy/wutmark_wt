<?php

class Application_Form_CustomerSupport extends My_Form
{
	public function init()
	{
		$this->setName('CustomerSupport');
		$this->setMethod('post');
		$this->setAttrib('onsubmit', '$.fn.supportManager("request"); return false;'); // Force send only with ajax
		$this->setAttrib('class', 'via_ajax');
	
		
		$nameIsEmpty = array(
			'ru' => 'Укажите пожалуйста ваше имя',
			'en' => 'Please fill in your name',
			'de' => 'Bitte geben Sie Ihren Namen'
		);
		
		$phoneNotDigits = array(
			'ru' => 'Номер телефона должен состоять из цифр',
			'en' => 'Phone number must consist of numbers',
			'de' => 'Telefonnummer muss aus Zahlen bestehen'
		);
		
		$emailIsEmpty = array(
			'ru' => 'Укажите пожалуйста эл. адрес',
			'en' => 'Enter your email address please',
			'de' => 'Geben Sie einfach Ihre E-Mail-Adresse bitte'
		);
		
		$emailAddressInvalidFormat = array(
			'ru' => 'Неправильный формат электронного адреса',
			'en' => 'Invalid format for email address',
			'de' => 'Ungültiges Format für E-Mail-Adresse'
		);
		
		$questionIsEmpty = array(
			'ru' => 'Укажите пожалуйста ваш вопрос',
			'en' => 'Please enter your your question',
			'de' => 'Bitte geben Sie Ihre Frage'
		);
		
		$this->addElement('text', 'name', array(
			'required' => true
		));
		
		$this->getElement('name')->addValidator(
			'NotEmpty',
			true,
	        array('messages' => array('isEmpty' => $nameIsEmpty))
        );
				
		$this->addElement('text', 'phone', array(
			'required' => false
		));
		$this->getElement('phone')->addValidator(
			'Digits',
			true,
			array('messages' => array('notDigits' => $phoneNotDigits))
		);
		
		$this->addElement('text', 'email', array(
			'required' => true
		));
		$this->getElement('email')->addValidator(
			'NotEmpty',
			true,
			array('messages' => array('isEmpty' => $emailIsEmpty))
		);
		$this->getElement('email')->addValidator(
			'EmailAddress',
			true,
			array('messages' => array('emailAddressInvalidFormat' => $emailAddressInvalidFormat))
		);
		
		$this->addElement('textarea', 'question', array(
		'required' => true
		));
				
		$this->getElement('question')->addValidator(
			'NotEmpty',
			true,
			array('messages' => array('isEmpty' => $questionIsEmpty))
		);
		
		$this->addElement('submit', 'submit', array(
			'ignore' => true,
		));
	}
	
	
}
