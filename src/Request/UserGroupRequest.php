<?php
/**
 * User Groups Request class
 */
namespace Twigger\UnionCloud\Request;


use Twigger\UnionCloud\Auth\Authentication;
use Twigger\UnionCloud\Configuration;
use Twigger\UnionCloud\Response\UserGroupResponse;

/**
 * Class User Groups Request
 *
 * @package Twigger\UnionCloud\UserGroups\UserGroups
 *
 * @license    https://opensource.org/licenses/GPL-3.0  GNU Public License v3
 *
 * @author     Toby Twigger <tt15951@bristol.ac.uk>
 *
 */
class UserGroupRequest extends BaseRequest implements IRequest
{
    /**
     * User Groups Request constructor.
     *
     * @param Authentication $authentication
     * @param Configuration $configuration
     */
    public function __construct($authentication, $configuration)
    {
        parent::__construct($authentication, $configuration, UserGroupResponse::class);
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
     * Description
     * 
     * @param
     * 
     * @return $this|\Twigger\UnionCloud\Response\IResponse|\Twigger\UnionCloud\ResourceCollection
     * 
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Twigger\UnionCloud\Exception\Request\RequestHistoryNotFound
     * @throws \Twigger\UnionCloud\Exception\Response\BaseResponseException
     */
    public function someFunction()
    {
        $this->setAPIParameters(
            'endpoint',
            'GET',
            []
        );
        
        $this->enableMode();
        $this->enablePagination();
        
        $this->call();
        
        return $this->getReturnDetails();
    }

}