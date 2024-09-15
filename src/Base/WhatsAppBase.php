<?php

namespace CrunchzApp\Base;

use Crunchzapp\Traits\ContactTrait;
use Crunchzapp\Traits\MessageTrait;

class WhatsAppBase {
    protected $client;
    protected $contactId;
    protected $payload = [];
    protected $token = null;
    protected $seen = false;
    protected $endpoint = 'https://api.crunchz.app/api';

    use MessageTrait, ContactTrait;

    public function contact($contactId): static
    {
        $this->contactId = $contactId;
        return $this;
    }

}
