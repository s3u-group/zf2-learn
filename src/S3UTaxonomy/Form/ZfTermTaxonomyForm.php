<?php
namespace S3UTaxonomy\Form;

use Zend\Form\Form;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use S3UTaxonomy\Entity\ZfTerm;
use S3UTaxonomy\Entity\ZfTermTaxonomy;

 class ZfTermTaxonomyForm extends Form
 {
     private $om;

     public function __construct(ObjectManager $objectManager)
     {        
         // we want to ignore the name passed
         parent::__construct('taxonomy');

         $this->om=$objectManager;

         $this->setHydrator(new DoctrineHydrator($objectManager))        
              ->setObject(new ZfTermTaxonomy());
// Định nghĩa các element trong form
         $this->add(array(
             'name' => 'term_taxonomy_id',
             'type' => 'Hidden',
         ));

         
        
         $this->add(array(
             'name' => 'taxonomy',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Tên taxonomy',
             ),

             'attributes'=>array('required'=>'required'),
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
 ?>