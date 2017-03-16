<?php
namespace src\SmartHome\Common\Http\Response\Traits;

use Fruty\SmartHome\Common\Http\Response\ResponseBuilder;

trait ResponseBuilderAware
{
    /**
     * @var ResponseBuilder
     */
    protected $responseBuilder;

    /**
     * @param ResponseBuilder $responseBuilder
     */
    public function setResponseBuilder(ResponseBuilder $responseBuilder)
    {
        $this->responseBuilder = $responseBuilder;
    }

}
