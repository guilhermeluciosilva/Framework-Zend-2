<?php
 // Filename: /module/Blog/config/module.config.php
 return array(
    'db' => array(
        'driver'         => 'Pdo',
        'username'       => 'root',  //edit this
        'password'       => '',  //edit this
        'dsn'            => 'mysql:dbname=blog;host=localhost',
        'driver_options' => array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        )
    ),

    'service_manager' => array(
        'factories' => array(
            'Blog\Mapper\PostMapperInterface'   => 'Blog\Factory\ZendDbSqlMapperFactory',
            'Blog\Service\PostServiceInterface' => 'Blog\Service\Factory\PostServiceFactory',
            'Zend\Db\Adapter\Adapter'           => 'Zend\Db\Adapter\AdapterServiceFactory'
        )
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__.'/../view',
        ),
    ),
        'controllers'  => array(
            'factories' => array(
                'Blog\Controller\List' => 'Blog\Factory\ListControllerFactory'
            )
            ),

     // This lines opens the configuration for the RouteManager
     'router' => array(
        // Open configuration for all possible routes
        'routes' => array(
            // Define a new route called "post"
            'blog' => array(
                'type' => 'literal',
                'options' => array(
                    'route'    => '/blog',
                    'defaults' => array(
                        'controller' => 'Blog\Controller\List',
                        'action'     => 'index',
                    )
                ),
                'may_terminate' => true,
                'child_routes'  => array(
                    'detail' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route'    => '/:id',
                            'defaults' => array(
                                'action' => 'detail'
                            ),
                            'constraints' => array(
                                'id' => '\d+'
                            )
                        )
                    ),
                    'add' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route'    => '/add',
                            'defaults' => array(
                                'controller' => 'Blog\Controller\Write',
                                'action'     => 'add'
                            )
                        )
                    )
                )
            )
        )
    )
);