<?php

namespace Twigger\UnionCloud\Exception\Authentication;

use Twigger\UnionCloud\Exception\UnionCloudException;
use Throwable;

class UnionCloudAuthenticationException extends UnionCloudException
{

    public function __construct($message = "", $code = 0, Throwable $previous = null, $unionCloudCode=0)
    {
        parent::__construct($message, $code, $previous, $unionCloudCode);
    }

}