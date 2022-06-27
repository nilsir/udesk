<?php

/*
 * This file is part of the nilsir/udesk.
 * (c) nilsir <nilsir@qq.com>
 * This source file is subject to the MIT license that is bundled.
 */

namespace Nilsir\Udesk\Responses;

use Sammyjo20\Saloon\Http\SaloonResponse;
use Nilsir\Udesk\Exceptions\SDKRequestException;

class UdeskResponse extends SaloonResponse
{
    /**
     * Create an exception if a server or client error occurred.
     *
     * @return SDKRequestException
     */
    public function toException(): SDKRequestException
    {
        if ($this->failed()) {
            $body = $this->response?->getBody()?->getContents();

            return new SDKRequestException($this, $body, 0, $this->getGuzzleException());
        }
    }
}
