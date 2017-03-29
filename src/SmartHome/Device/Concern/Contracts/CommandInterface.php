<?php

namespace Fruty\SmartHome\Device\Concern\Contracts;

interface CommandInterface
{
    /**
     * @return string
     */
    public function getName() : string;

    /**
     * @return string
     */
    public function getSignature() : string;
}
