<?php

namespace CrunchzApp;

use CrunchzApp\Services\ChannelService;

final class CrunchzApp {

    public static function channel()
    {
        return new ChannelService();
    }
}
