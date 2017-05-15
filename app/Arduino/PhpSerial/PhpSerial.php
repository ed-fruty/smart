<?php
namespace App\Arduino\PhpSerial;


class PhpSerial
{
    protected $platforms = [];


    public function registerPlatform(PlatformStrategyInterace $strategy)
    {
        $this->platforms[$strategy->getName()] = $strategy;
    }

    public function getCurrentPlatform()
    {
        $platform = strtolower(PHP_OS);

        return $this->platforms[$platform] ?? null;
    }

    public function __call($name, $arguments)
    {
        return $this->getPlatform()->$name(...$arguments);
    }
}

interface PlatformStrategyInterface
{
    public function getName();

    /**
     * @return mixed
     */
    public function initialize();

    /**
     * @param string $device
     * @return mixed
     */
    public function setDevice(string $device);

    /**
     * @param int $rate
     * @return mixed
     */
    public function setBaudRate(int $rate);

    /**
     * @param string $parity
     * @return mixed
     */
    public function setParity(string $parity);
}