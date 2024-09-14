<?php

namespace Crunchzapp\Services;

use Crunchzapp\Base\OtpBase;
use Illuminate\Support\Facades\Http;

class OtpService extends OtpBase
{

    public function __construct()
    {
        $this->tokenHandler();
        $this->otpLinkConstruct();
        $this->client = Http::baseUrl($this->endpoint)
            ->withToken($this->token);
    }

    public function send()
    {
        $client = $this->client->post($this->payload['path_request'], [
            ''
        ]);
        return $client->json();
    }

    /**
     * @return void
     */
    public function tokenHandler(): void
    {
        $this->token = config('crunchzapp.channel.token');
        if (config('crunchzapp.otp.is_global')) {
            $this->token = config('crunchzapp.global.token');
        }
    }

    /**
     * @return void
     */
    public function otpLinkConstruct(): void
    {
        $this->prompt = config('crunchzapp.otp.link.prompt');
        $this->successMessage = config('crunchzapp.otp.link.respond.success');
        $this->failedMessage = config('crunchzapp.otp.link.respond.failed');
        $this->expiredMessage = config('crunchzapp.otp.link.respond.expired');
        $this->callbackSuccess = config('crunchzapp.otp.link.callback.success');
        $this->callbackFailed = config('crunchzapp.otp.link.callback.failed');

    }
}
