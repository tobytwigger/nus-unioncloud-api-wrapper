<?php

namespace Twigger\UnionCloud\Exception\Authentication;

use Throwable;

class AuthenticationIncorrectParameters extends UnionCloudResponseAuthenticationException
{

    public function __construct($message, $code, Throwable $previous = null, $unionCloudCode = 0)
    {
        parent::__construct($message, $code, $previous, $unionCloudCode);
    }

}