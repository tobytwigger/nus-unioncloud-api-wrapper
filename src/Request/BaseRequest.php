<?php

namespace Twigger\UnionCloud\Request;

use Twigger\UnionCloud\Auth\Authentication;

/**
 * Contains helper functions relevant to making a request
 *
 * @package    UnionCloud
 * @license    https://opensource.org/licenses/GPL-3.0  GNU Public License v3
 * @author     Toby Twigger <tt15951@bristol.ac.uk>
 */
class BaseRequest
{

    /**
     * @var Authentication
     */
    protected $authentication;

    /**
     * @var array $rawData Raw data array returned in an API call
     */
    protected $rawData;

    public function __construct($authentication)
    {
        $this->authentication = $authentication;
    }

    /**
     * Handle creating the API request and receiving the response.
     *
     * @return array The data returned from the request.
     */
    protected function call()
    {
        // Build up API Call
        $options = [];

        $options = $this->authentication->addAuthentication($options);
        var_dump($options);
        return $options;
        $this->setRawData([
            'event_id' => '33',
            'event_name' => 'Fun event'
        ]);
    }

    /**
     * Get the data from the API call
     *
     * @return array
     */
    protected function getRawData()
    {
        return $this->rawData;
    }

    /**
     * Parse and set the raw data returned from the request.
     *
     * @param array $rawData Raw data returned in a request
     */
    private function setRawData($rawData)
    {
        $this->rawData = $rawData;
    }

}