<?php
/**
 * Event Question Request class
 */
namespace Twigger\UnionCloud\API\Request;


use Twigger\UnionCloud\API\Auth\Authentication;
use Twigger\UnionCloud\API\Configuration;
use Twigger\UnionCloud\API\Response\EventQuestionResponse;

/**
 * Class Event Question Request
 *
 * @package Twigger\UnionCloud\API\Events\EventQuestions
 *
 * @license    https://opensource.org/licenses/GPL-3.0  GNU Public License v3
 *
 * @author     Toby Twigger <tt15951@bristol.ac.uk>
 *
 */
class EventQuestionRequest extends BaseRequest implements IRequest
{
    /**
     * Event Question Request constructor.
     *
     * @param Authentication $authentication
     * @param Configuration $configuration
     */
    public function __construct($authentication, $configuration)
    {
        parent::__construct($authentication, $configuration, EventQuestionResponse::class);
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
     * Create a new Event Question
     *
     * @param integer $eventID ID of the event to create the question for
     * @param mixed[] $questionData Data to construct the question
     *
     * @return $this|\Twigger\UnionCloud\API\Response\IResponse|\Twigger\UnionCloud\API\ResourceCollection
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Twigger\UnionCloud\API\Exception\Request\RequestHistoryNotFound
     * @throws \Twigger\UnionCloud\API\Exception\Response\BaseResponseException
     */
    public function create($eventID, $questionData)
    {
        $this->setAPIParameters(
            'events/'.$eventID.'/questions',
            'POST',
            $questionData
        );

        $this->call();

        return $this->getReturnDetails();
    }

    /**
     * Update an Event Question
     *
     * @param integer $eventID ID of the event
     * @param integer $questionID ID of the question to update
     * @param mixed[] $questionData Data of the question to update
     *
     * @return $this|\Twigger\UnionCloud\API\Response\IResponse|\Twigger\UnionCloud\API\ResourceCollection
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Twigger\UnionCloud\API\Exception\Request\RequestHistoryNotFound
     * @throws \Twigger\UnionCloud\API\Exception\Response\BaseResponseException
     */
    public function update($eventID, $questionID, $questionData)
    {
        $this->setAPIParameters(
            'events/'.$eventID.'/questions/'.$questionID,
            'PUT',
            $questionData
        );

        $this->call();

        return $this->getReturnDetails();
    }

    /**
     * Delete an event question
     *
     * @param integer $eventID ID of the event
     * @param integer $questionID ID of the event ticket type
     *
     * @return $this|\Twigger\UnionCloud\API\Response\IResponse|\Twigger\UnionCloud\API\ResourceCollection
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Twigger\UnionCloud\API\Exception\Request\RequestHistoryNotFound
     * @throws \Twigger\UnionCloud\API\Exception\Response\BaseResponseException
     */
    public function delete($eventID, $questionID)
    {
        $this->setAPIParameters(
            'events/'.$eventID.'/questions/'.$questionID,
            'DELETE'
        );

        $this->call();

        return $this->getReturnDetails();
    }

}