<?php
class Application_Form_Sites extends My_Form
{

    public function init()
    {
    	
        $this->setMethod('post');
        $this->setAttrib('onsubmit', 'return false;'); // Force send only with ajax
        
        $this->addElement('select', 'sites', array(
        	'label' => '',
        	'onchange' => 'window.location.href = this.value;'
        ));
	}


}

