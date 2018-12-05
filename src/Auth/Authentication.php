<?php

namespace Twigger\UnionCloud\Auth;

use Twigger\UnionCloud\Exception\Authentication\AuthenticationParameterMissing;
use Twigger\UnionCloud\Exception\Authentication\AuthenticatorMustExtendIAuthenticator;
use Twigger\UnionCloud\Exception\Authentication\AuthenticatorNotFound;

class Authentication
{

    /**
     * @var IAuthenticator
     */
    private $authenticator;
    /**
     * Authentication constructor.
     *
     * Creates an Authentication instance if possible
     *
     * @param null $authParams
     * @param null $authenticator
     *
     * @throws AuthenticatorNotFound
     * @throws AuthenticationParameterMissing
     */
    public function __construct($authParams = null, $authenticator=null)
    {
        if(is_array($authParams))
        {
            // Find the authenticator class
            if($authenticator === null) {
                $this->authenticator = new v0Authenticator();
            } elseif($authenticator instanceof IAuthenticator) {
                $this->authenticator = $authenticator;
            } else {
                throw new AuthenticatorNotFound();
            }

            // Set the parameters
            $this->authenticator->setParameters($authParams);
        }
    }

    /**
     * Manually set the Authenticator
     *
     * @param IAuthenticator $authenticator The authenticator to use for authentication
     *
     * @throws AuthenticatorMustExtendIAuthenticator
     *
     * @return void
     */
    public function setAuthenticator($authenticator)
    {
        if($authenticator instanceof IAuthenticator)
        {
            $this->authenticator = $authenticator;
            return;
        }

        throw new AuthenticatorMustExtendIAuthenticator();
    }

    public function addAuthentication($options)
    {
        $this->authenticator->authenticate();

        return $this->authenticator->addAuthentication($options);
    }

    /**
     * Check the authenticator is present and ready
     * @return bool
     */
    public function hasAuthentication()
    {
        if ( ! $this->authenticator instanceof IAuthenticator)
        {
            return false;
        }
        return true;
    }
}