<?php
namespace Fruty\SmartHome\Common\Http\Response\Contracts;

use Fruty\SmartHome\Common\Http\Response\ResponseBuilder;

interface ResponseBuilderAwareInterface
{
    /**
     * @param ResponseBuilder $responseBuilder
     */
    public function setResponseBuilder(ResponseBuilder $responseBuilder);
}
