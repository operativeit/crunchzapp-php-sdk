<?php

namespace Crunchzapp\Base;

class OtpBase {

    protected $token;
    protected $contactId;
    protected $payload;
    protected $client;
    protected $code;
    protected $type;
    protected $endpoint = 'https://api.crunchz.app/api';

    protected $prompt;
    protected $successMessage;
    protected $failedMessage;
    protected $callbackSuccess;
    protected $callbackFailed;
    protected $expiredMessage;

    public function contact($contactId): static
    {
        $this->contactId = $contactId;
        return $this;
    }

    public function otpType($type): static
    {
        $this->type = $type;
        return $this;
    }

    public function bodyCode(): array
    {
        return [
            'contact_id' => $this->contactId,
            'length' => config('crunchzapp.otp.code.length'),
            'useLetter' => config('crunchzapp.otp.code.useLetter'),
            'useNumber' => config('crunchzapp.otp.code.useNumber'),
            'allCapital' => config('crunchzapp.otp.code.allCapital'),
            'name' => config('crunchzapp.otp.code.name'),
            'expires' => config('crunchzapp.otp.code.expires')
        ];
    }

    public function bodyValidate(): array
    {
        return [
            'contact_id' => $this->contactId,
            'code' => $this->code,
        ];
    }

    public function code($code): static
    {
        if ($this->payload['type'] === 'code') {
            $this->code = $code;
            return $this;
        } else {
            throw new \Exception('You cannot declare code when the otp type was link');
        }
    }

    public function prompt($message): static
    {
        if ($this->payload['type'] === 'link') {
            $this->prompt = $message;
            return $this;
        } else {
            throw new \Exception('You cannot declare prompt when the otp type was code');
        }
    }

    public function successResponse($message): static
    {
        if ($this->payload['type'] === 'link') {
            $this->successMessage = $message;
            return $this;
        } else {
            throw new \Exception('You cannot declare success response when the otp type was code');
        }
    }

    public function failedResponse($message): static
    {
        if ($this->payload['type'] === 'link') {
            $this->failedMessage = $message;
            return $this;
        } else {
            throw new \Exception('You cannot declare failed response when the otp type was code');
        }
    }

    public function expiredResponse($message): static
    {
        if ($this->payload['type'] === 'link') {
            $this->expiredMessage = $message;
            return $this;
        } else {
            throw new \Exception('You cannot declare expired response when the otp type was code');
        }
    }

    /**
     * @throws \Exception
     */
    public function successCallback($url): static
    {
        if ($this->payload['type'] === 'link') {
            if (filter_var($url, FILTER_VALIDATE_URL)) {
                $this->callbackSuccess = $url;
                return $this;
            } else {
                throw new \Exception('The success link mus be a valid url');
            }
        } else {
            throw new \Exception('You cannot declare success callback when the otp type was code');
        }
    }

    /**
     * @throws \Exception
     */
    public function failedCallback($url): static
    {
        if ($this->payload['type'] === 'link') {
            if (filter_var($url, FILTER_VALIDATE_URL)) {
                $this->callbackFailed = $url;
                return $this;
            } else {
                throw new \Exception('The success link mus be a valid url');
            }
        } else {
            throw new \Exception('You cannot declare failed callback when the otp type was code');
        }
    }

    public function bodyLink(): array
    {
        return [
            'contact_id' => $this->contactId,
            'expires' => config('crunchzapp.otp.link.expires'),
            'message' => [
                'prompt' => $this->prompt,
                'success' => $this->successMessage,
                'failed' => $this->failedMessage,
                'expired' => $this->expiredMessage
            ],
            'callback' => [
                'success' => $this->callbackSuccess,
                'failed' => $this->callbackFailed
            ]
        ];
    }
}
