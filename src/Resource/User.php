<?php
/**
 * User Resource
 */
namespace Twigger\UnionCloud\Resource;

/**
 * Class User
 *
 * @package Twigger\UnionCloud\Resource
 */
class User extends BaseResource implements IResource
{
    /**
     * Set the model parameters
     *
     * User constructor.
     *
     * @param $resource
     */
    public function __construct($resource)
    {
        $this->modelParameters = $resource;
    }
}