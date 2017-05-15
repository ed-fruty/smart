<?php
namespace Fruty\Detector;


class Server
{
    /**
     * @param bool $lower
     * @return string
     */
    public function getOS($lower = false) : string
    {
        return $lower ? strtolower(PHP_OS) : PHP_OS;
    }

    /**
     * @return string
     */
    public function getDirectorySeparator() : string
    {
        return DIRECTORY_SEPARATOR;
    }

    /**
     * @return string
     */
    public function getShLibSuffix()
    {
        return PHP_SHLIB_SUFFIX;
    }

    /**
     * @return string
     */
    public function getPathSeparator()
    {
        return PATH_SEPARATOR;
    }

    /**
     * @return string
     */
    public function getSapiName()
    {
        return php_sapi_name();
    }

    /**
     * @return bool
     */
    public function isCli()
    {
        return 'cli' === strtolower(substr($this->getSapiName(), 0, 3));
    }
}