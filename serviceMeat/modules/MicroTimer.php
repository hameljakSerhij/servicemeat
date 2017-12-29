<?php
namespace app\modules;
/**
 * Created by PhpStorm.
 * User: hamel
 * Date: 25.12.2017
 * Time: 17:22
 */
class MicroTimer
{
    private $start_time;

    /**
     * MicroTimer constructor.
     */
    public function __construct()
    {
        $this->start();
    }

    public function start(){
        $this->start_time = microtime(true);
    }

    public function printTimer(){
        $end_time = microtime(true);
        $time = (float)$end_time-$this->start_time;

        print_r("RunTime:" . $time . "\n");
    }
}