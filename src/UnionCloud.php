<?php
/**
 * UnionCloud Wrapper Class
 */

namespace Twigger\UnionCloud;

use Twigger\UnionCloud\Auth\Authentication;
use Twigger\UnionCloud\Auth\IAuthenticator;
use Twigger\UnionCloud\Exception\Authentication\AuthenticatorNotFound;
use Twigger\UnionCloud\Exception\Authentication\BaseUnionCloudAuthenticationException;
use Twigger\UnionCloud\Request;

/**
 * Class UnionCloud
 *
 * Choose your resource from here!
 *
 * @package Twigger\UnionCloud
 * @license    https://opensource.org/licenses/GPL-3.0  GNU Public License v3
 * @author     Toby Twigger <tt15951@bristol.ac.uk>
 */

class UnionCloud
{

    /**
     * Holds the Authentication wrapper, a wrapper for the authenticator
     *
     * @var Authentication
     */
    protected $authentication = null;

    /**
     * Holds configuration variables
     *      - Base URL
     *      - Debug
     * @var Configuration
     */
    protected $configuration;

    /**
     * UnionCloud constructor.
     *
     * Creates an Authenticator and a blank Configuration
     *
     * @param null|array $authParams Associative array of the Authentication Parameters
     * @param null|string $authenticator AuthenticatorClass::class
     *
     * @throws AuthenticatorNotFound
     * @throws Exception\Authentication\AuthenticationParameterMissing
     */
    public function __construct($authParams = null, $authenticator=null)
    {
        $this->authentication = new Authentication($authParams, $authenticator);
        $this->configuration = new Configuration();
    }

    /**
     * Manually set the authenticator
     *
     * @param IAuthenticator $authenticator
     *
     * @throws BaseUnionCloudAuthenticationException
     */
    public function setAuthenticator($authenticator)
    {
        $this->authentication->setAuthenticator($authenticator);
    }

    /**
     * Check UnionCloud is ready for the request
     *
     * @throws AuthenticatorNotFound
     *
     * @return void
     */
    private function checkReadyForRequest()
    {
        if(! $this->authentication->hasAuthentication())
        {
            throw new AuthenticatorNotFound();
        }
        return;
    }

    /**
     * Set the Base URL in the configuration class
     *
     * @param string $baseURL
     */
    public function setBaseURL($baseURL)
    {
        $this->configuration->setBaseUrl($baseURL);
    }

    /**
     * Set the debug status of the API call.
     *
     * By calling debug(), you'll see a lot more details
     * about the API call.
     *
     * @param bool $debug Defaults to true
     */
    public function debug($debug = true)
    {
        $this->configuration->setDebug($debug);
    }

    /**
     * Return a user resource request.
     *
     * @return Request\UserRequest
     *
     * @throws AuthenticatorNotFound
     */
    public function users()
    {
        $this->checkReadyForRequest();
        return new Request\UserRequest($this->authentication, $this->configuration);
    }

}