<?php

/*
 * This file is part of the nilsir/udesk.
 * (c) nilsir <nilsir@qq.com>
 * This source file is subject to the MIT license that is bundled.
 */

namespace Nilsir\Udesk\Auth;

use Sammyjo20\Saloon\Http\SaloonRequest;
use Sammyjo20\Saloon\Interfaces\AuthenticatorInterface;

class Authenticator implements AuthenticatorInterface
{
    public function __construct(
        protected string $openApiToken,
        protected string $adminEmail,
    ) {
    }

    public function set(SaloonRequest $request): void
    {
        $timestamp = time();
        $nonce = uniqid();
        $signVersion = 'v2';
        $sign = sha1("{$this->adminEmail}&{$this->openApiToken}&{$timestamp}&$nonce&$signVersion");

        $request->setQuery([
            'email' => $this->adminEmail,
            'timestamp' => $timestamp,
            'sign' => $sign,
            'nonce' => $nonce,
            'sign_version' => $signVersion,
        ]);
    }
}
