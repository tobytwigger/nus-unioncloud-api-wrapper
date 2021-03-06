<?php
/**
 * Event Attendee Request class
 */
namespace Twigger\UnionCloud\API\Request;


use Twigger\UnionCloud\API\Auth\Authentication;
use Twigger\UnionCloud\API\Configuration;
use Twigger\UnionCloud\API\Response\EventAttendeeResponse;

/**
 * Class Event Attendee Request
 *
 * @package Twigger\UnionCloud\API\Events\EventAttendees
 *
 * @license    https://opensource.org/licenses/GPL-3.0  GNU Public License v3
 *
 * @author     Toby Twigger <tt15951@bristol.ac.uk>
 *
 */
class EventAttendeeRequest extends BaseRequest implements IRequest
{
    /**
     * Event Attendee Request constructor.
     *
     * @param Authentication $authentication
     * @param Configuration $configuration
     */
    public function __construct($authentication, $configuration)
    {
        parent::__construct($authentication, $configuration, EventAttendeeResponse::class);
    }


    /**
     * Gets the current instance
     *
     * @return $this
     *
     */
    public function getInstance()
    {
        return $this;
    }



    /*
    |--------------------------------------------------------------------------
    | API Endpoint Definitions
    |--------------------------------------------------------------------------
    |
    | Define your API endpoints below here
    |
    */
    /**
     * Get the event attendees for an event
     * 
     * @param integer $eventID ID of the event
     * 
     * @return $this|\Twigger\UnionCloud\API\Response\IResponse|\Twigger\UnionCloud\API\ResourceCollection
     * 
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Twigger\UnionCloud\API\Exception\Request\RequestHistoryNotFound
     * @throws \Twigger\UnionCloud\API\Exception\Response\BaseResponseException
     */
    public function forEvent($eventID)
    {
        $this->setAPIParameters(
            'events/'.$eventID.'/attendees',
            'GET'
        );
        
        $this->enableMode();
        $this->enableTimes();
	$this->enablePagination();
        
        $this->call();
        
        return $this->getReturnDetails();
    }

}
