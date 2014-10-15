<?php
return array(
	'controllers' => array(
		'invokables' => array(
			'S3UTaxonomy\Controller\Index' => 'S3UTaxonomy\Controller\IndexController',
		),
	),
    'router' => array(
        'routes' => array(
            's3u_taxonomy' => array(
                'type'    => 'literal', 
                'options' => array(
                    'route'    => '/s3u_taxonomy',                     
                    'defaults' => array(
                       '__NAMESPACE__'=>'S3UTaxonomy\Controller',
                        'controller' => 'Index',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(                    
                    'crud' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '[/][:action][/:id]',
                            'constraints' => array(                            
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'=>'[0-9]+',
                            ),                            
                        ),
                    ),                    
                ),
             ),
         ),
     ),

	'view_manager' => array(
		'template_path_stack' => array(
			'tax' => __DIR__ . '/../view'
		)
	),

	'doctrine' => array(
        'driver' => array(

            's3u_taxonomy_annotation_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__.'/../src/S3UTaxonomy/Entity',//Edit
                ),
            ),

            'orm_default' => array(
                'drivers' => array(

                    'S3UTaxonomy\Entity' => 's3u_taxonomy_annotation_driver'//Edit
                )
            )
        )
    ),
);