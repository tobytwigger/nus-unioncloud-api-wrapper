<?php
/**
 * Event Ticket Type Response Class
 */
namespace Twigger\UnionCloud\Response;

use Twigger\UnionCloud\Resource\EventTicketType;

/**
 * Class Event Ticket Type
 *
 * @package Twigger\UnionCloud\Events\EventTicketTypes
 */
class EventTicketTypeResponse extends BaseResponse implements IResponse
{

    /**
     * Event Ticket Type Response constructor.
     *
     * Holds information about the resourceClass
     *
     * resourceClass: the class containing information about how to parse
     * the resource. Must implement BaseResource
     *
     * @param $response
     * @param $request
     * @param $requestOptions
     * @throws \Twigger\UnionCloud\Exception\Response\IncorrectResponseTypeException
     */
    public function __construct($response, $request, $requestOptions)
    {
        $resourceClass = EventTicketType::class;

        parent::__construct($response, $request, $requestOptions, $resourceClass);

        $this->parseResponse();

        return $this->resources;
    }

}