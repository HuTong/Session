<?php
namespace HuTong\Session\Drive;

use HuTong\Session\Contract;

class Storage implements Contract
{
	private $container;
	private $lifeTime;
	private $drive;

	public function __construct($config, $drives)
	{
        $this->lifeTime = $config['lifetime'];
		$this->drive = $config['drive'];

		if(is_null($this->container))
        {
            $this->container = new \HuTong\Cache\Storage($drives);
        }
	}

    public function open($savePath, $sessName)
    {
    	return true;
    }

    public function close()
    {
        return true;
    }

    public function read($sessID)
    {
		$data = $this->container->store($this->drive)->get($sessID);
		if(empty($data))
		{
			$data = '';
		}

		return $data;
    }

    public function write($sessID,$sessData)
    {
        return (bool)$this->container->store($this->drive)->set($sessID, $sessData, $this->lifeTime);
    }

    public function destroy($sessID)
    {
		return $this->container->store($this->drive)->del($sessID);
    }

    public function gc($sessMaxLifeTime)
    {
        return true;
    }
}
