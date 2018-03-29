<?php
namespace HuTong\Session;

class User
{
    public function __construct($config, $drives)
    {
        $instance = $this->getInstance($config, $drives);

        session_set_save_handler(
            array($instance, 'open'),
            array($instance, 'close'),
            array($instance, 'read'),
            array($instance, 'write'),
            array($instance, 'destroy'),
            array($instance, 'gc')
        );

        register_shutdown_function('session_write_close');
    }

    public function getInstance($config, $drives)
    {
        $class = "HuTong\Session\Drive\\".$config['connection'];

        $instance = new $class($config, $drives);

        return $instance;
    }

    public function start()
    {
        ini_set('session.serialize_handler', 'php_serialize');
        session_start();
    }
}
