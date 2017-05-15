<?php
namespace Fruty\PhpSerial;


interface PlatformStrategyInterface
{
    /**
     * @return mixed
     */
    public function initialize();

    /**
     * @param string $device
     * @return bool
     */
    public function setDevice(string $device):bool ;

    /**
     * @param int $rate
     * @return bool
     */
    public function setBaudRate(int $rate) : bool;

     /**
     * @param string $parity
     * @return bool
     */
    public function setParity(string $parity) : bool;

    /**
     * @param int $length
     * @return bool
     */
    public function setCharacterLength(int $length) : bool;
}