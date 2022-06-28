<?php

/*
 * This file is part of the nilsir/udesk.
 * (c) nilsir <nilsir@qq.com>
 * This source file is subject to the MIT license that is bundled.
 */

namespace Nilsir\Udesk\Requests\General;

use Nilsir\Udesk\Requests\Request;
use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Traits\Plugins\HasJsonBody;

class LoginRequest extends Request
{
    use HasJsonBody;
    /**
     * Define the method that the request will use.
     *
     * @var string|null
     */
    protected ?string $method = Saloon::POST;

    /**
     * @return string
     */
    public function defineEndpoint(): string
    {
        return '/log_in';
    }

    public function defaultData(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
        ];
    }

    public function __construct(
        public string $email,
        public string $password,
    ) {
    }
}
