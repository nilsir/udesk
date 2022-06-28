<?php

/*
 * This file is part of the nilsir/udesk.
 * (c) nilsir <nilsir@qq.com>
 * This source file is subject to the MIT license that is bundled.
 */

use Nilsir\Udesk\UdeskConnector;
use Nilsir\Udesk\Requests\General\LoginRequest;

test('test login request', function () {
    $connector = new UdeskConnector(get_api_host());

    $email = get_api_email();
    $passwd = get_api_password();
    $request = new LoginRequest($email, $passwd);

    $request->setConnector($connector);
    $response = $request->send();

    $response->throw();
    $data = $response->json();

    expect($data)->toBeJson()
        ->toHaveKeys(['code', 'open_api_auth_token']);
});
