# CrunchzApp - WhatsApp PHP SDK

**CrunchzApp - WhatsApp PHP SDK** provides a simple and easy-to-use interface for integrating WhatsApp automation into your PHP applications using the CrunchzApp API. This SDK helps developers quickly send messages, manage WhatsApp interactions, and automate tasks with minimal effort.

## Requirements
- PHP 7.3 or higher
- Composer for package management
- A CrunchzApp account and API key

## Installation

To install the SDK, use Composer:

```bash
composer require crunchzapp/whatsapp-php-sdk
```
## Configuration

#### Publish configuration

Before initializing the package, make sure you have publish the configuration file by typing the code below.

```bash
php artisan vendor:publish --tag=crunchzapp-config
```
#### Environment Setup

You need to define the `.env` file in order to make it working.

```bash
CRUNCHZAPP_CHANNEL_TOKEN=
CRUNCHZAPP_GLOBAL_TOKEN=
CRUNCHZAPP_GLOBAL_OTP=
```

## Usage

### Send Message

```php 
namespace App\Http\Controllers;

use CrunchzApp\CrunchzApp;

class TestController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index()
    {
        return CrunchzApp::channel()
            ->contact('6281357541790@c.us')
            ->startTyping()
            ->text('This is a message from you')
            ->stopTyping()
            ->sendPool();
    }
}
```
