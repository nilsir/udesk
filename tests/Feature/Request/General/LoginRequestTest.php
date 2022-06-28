<?php

use Nilsir\Udesk\Requests\General\LoginRequest;

test('test login request', function () {
    $email = '';
    $pwd = '';
    $request = new LoginRequest($email, $pwd);
    $response = $request->send();

    $response->throw();
    $data = $response->json();

    expect($data)->toBeJson();
});
