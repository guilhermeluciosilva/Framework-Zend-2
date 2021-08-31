<?php

namespace Album\Form;

use Zend\Form\Form;

class AlbumForm extends Form
{
    public function __construct($name = null)
    {
        // HTML-Forms can be sent using POST and GET. ZF2s default is POST, therefore you don’t have to be explicit in setting this option. If you want to change it to GET though, all you have to do is set the specific attribute in the constructor.

        // $this->setAttribute('method', 'GET');


        // we want to ignore the name passed
        parent::__construct('album');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'title',
            'type' => 'Text',
            'options' => array(
                'label' => 'Title',
            ),
        ));
        $this->add(array(
            'name' => 'artist',
            'type' => 'Text',
            'options' => array(
                'label' => 'Artist',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}