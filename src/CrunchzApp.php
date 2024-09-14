<?php

namespace CrunchzApp;

use CrunchzApp\Services\ChannelService;
use Crunchzapp\Services\OtpService;

final class CrunchzApp {

    public static function channel(): ChannelService
    {
        return new ChannelService();
    }

    public static function otp()
    {
        return new OtpService();
    }
}
