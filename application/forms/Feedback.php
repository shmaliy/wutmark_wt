<?php
class Application_Form_Feedback extends Zend_Form
{

    public function init()
    {
    	error_reporting(1);
        // Set the method for the display form to POST
        $this->setMethod('post');
        $this->setAttrib('onsubmit', 'return sendData(this, "/contacts");');
 
        // Имя
        $formName = new Zend_Form_Element_Text('name');
        $formName->setLabel('Ваше имя:');
        $formName->setRequired();
        $formName->setFilters(array('StringTrim'));
        $formName->setValidators(array());        
        $formName->setDecorators(array(
        	array('ViewHelper'),
    		array(array('Errors' => 'HtmlTag'), array('placement' => 'append', 'class' => 'error', 'id' => 'name_error', 'style' => 'display:none')),
		    array('HtmlTag', array('tag' => 'dd', 'id' => 'name-element')),
		    array('Label', array('tag' => 'dt')),
        ));
        $this->addElement($formName);
		
		// Add an email element
		$formEmail = new Zend_Form_Element_Text('email');
        $formEmail->setLabel('Электронная почта:');
        $formEmail->setRequired();
        $formEmail->setFilters(array('StringTrim'));
        $formEmail->setValidators(array('EmailAddress'));
        $formEmail->setDecorators(array(
        	array('ViewHelper'),
        	array(array('Errors' => 'HtmlTag'), array('placement' => 'append', 'class' => 'error', 'id' => 'email_error', 'style' => 'display:none')),
       		array('HtmlTag', array('tag' => 'dd', 'id' => 'email-element')),
        	array('Label', array('tag' => 'dt')),
        ));
        $this->addElement($formEmail);
		
		// Телефон
        $formPhone = new Zend_Form_Element_Text('phone');
        $formPhone->setLabel('Телефон:');
        $formPhone->setRequired();
        $formPhone->setFilters(array('StringTrim'));
        $formPhone->setValidators(array(
        		'alnum',
        		array('regex', false, '/^[0-9]{10}$/')
    	));
        $formPhone->setDecorators(array(
        	array('ViewHelper'),
        	array(array('Errors' => 'HtmlTag'), array('placement' => 'append', 'class' => 'error', 'id' => 'phone_error', 'style' => 'display:none')),
        	array('HtmlTag', array('tag' => 'dd', 'id' => 'phone-element')),
        	array('Label', array('tag' => 'dt')),
        ));
        $this->addElement($formPhone);
        
		// Вопрос
		$formQuestion = new Zend_Form_Element_Textarea('question');
		$formQuestion->setLabel('Сообщение:');
		$formQuestion->setRequired();
		$formQuestion->setDecorators(array(
			array('ViewHelper'),
			array(array('Errors' => 'HtmlTag'), array('placement' => 'append', 'class' => 'error', 'id' => 'question_error', 'style' => 'display:none')),
			array('HtmlTag', array('tag' => 'dd', 'id' => 'question-element')),
			array('Label', array('tag' => 'dt')),
		));
		$this->addElement($formQuestion);
        
        // Add a captcha
        /*$this->addElement('captcha', 'captcha', array(
            'label'      => 'Введите текст, изображенный на рисунке:',
            'required'   => true,
            'captcha'    => array(
                'captcha' => 'Image',
                'font' => '../data/tahoma.ttf', 
                'fontSize' => 15,
                'imgDir' => 'captcha',
                'imgUrl' => '/captcha/',
                'height' => 45,
                'width' => 100,
                'wordLen' => 5,
                'timeout' => 300,
                'dotNoiseLevel' => 1,
                'lineNoiseLevel' => 1
            )
        ));*/
        //$captchaSession = $this->getElement('captcha')->getCaptcha()->getSession();
        //$captchaSession->setExpirationHops(100, null, true);// TODO пересоздать сессию для сброса этого параметра
        
        //$captcha->getCaptcha()->setSession($captchaSession);
        
        /*$captcha->setDecorators(array(
			array('ViewHelper'),
			array(array('Errors' => 'HtmlTag'), array('placement' => 'append', 'class' => 'error', 'id' => 'captcha_error')),
			array('HtmlTag', array('tag' => 'dd', 'id' => 'captcha-element')),
			array('Label', array('tag' => 'dt')),
		));*/
		
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Отправить',
        ));
    }


}

