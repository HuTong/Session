<?php
namespace HuTong\Session;

interface Contract
{
    public function open($savePath, $sessName);

    public function close();

    public function read($sessID);

    public function write($sessID,$sessData);

    public function destroy($sessID);

    public function gc($sessMaxLifeTime);
}
