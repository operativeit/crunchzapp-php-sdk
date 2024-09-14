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
### Sending Message
This are a few step you can achieve to send a message using this SDK.
#### Sending Text
```php
use CrunchzApp\CrunchzApp;

CrunchzApp::channel()
    ->contact('xxx@c.us')
    ->text(
        message: 'This is a message from you'
    )
    ->send();
```
#### Sending Image
```php
use CrunchzApp\CrunchzApp;

CrunchzApp::channel()
    ->contact('xxx@c.us')
    ->image(
        caption: 'Check out this image!',
        mimeType: 'image/png',
        filename: 'image.png',
        url:'https://raw.githubusercontent.com/CrunchzApp/asset-example/main/examples/logo.png'   
    )
    ->send();
```
#### Sending Location
```php
use CrunchzApp\CrunchzApp;

CrunchzApp::channel()
    ->contact('xxx@c.us')
    ->location(
        latitude: '-6.142157673038987',
        longitude: '106.19428522218833',
        title: 'CrunchzApp HQ'  
    )
    ->send();
```
#### Sending Voice
```php
use CrunchzApp\CrunchzApp;

CrunchzApp::channel()
    ->contact('xxx@c.us')
    ->voice(
        audioUrl: 'https://github.com/CrunchzApp/asset-example/raw/main/examples/julie-voice.opus'
    )
    ->send();
```
#### Sending Video
```php
use CrunchzApp\CrunchzApp;

CrunchzApp::channel()
    ->contact('xxx@c.us')
    ->video(
        videoUrl: 'https://github.com/CrunchzApp/asset-example/raw/main/examples/video.mp4',
        caption: 'Check out this video' 
    )
    ->send();
```
#### React to Message
```php
use CrunchzApp\CrunchzApp;

CrunchzApp::channel()
    ->contact('xxx@c.us')
    ->react(
        messageId: 'false_xxxx@c.us_xxx',
        reaction: '😍'  
    )
    ->send();
```
#### Send Polling
```php
use CrunchzApp\CrunchzApp;

CrunchzApp::channel()
    ->contact('xxx@c.us')
    ->polling(
        title: 'Survey about iPhone 16',
        options: ['Expensive', 'Cheap', 'Can buy it'],
        isMultipleAnswer: false,  
    )
    ->send();
```
#### Star / Un-star Message
```php
use CrunchzApp\CrunchzApp;

CrunchzApp::channel()
    ->contact('xxx@c.us')
    ->star(
        messageId: 'false_xxxx@c.us_xxx',
        starred: true  
    )
    ->send();
```
#### Delete Message
```php
use CrunchzApp\CrunchzApp;

CrunchzApp::channel()
    ->contact('xxx@c.us')
    ->delete(
        messageId: 'false_xxxx@c.us_xxx'
    )
    ->send();
```
#### Seen Message
```php
use CrunchzApp\CrunchzApp;

CrunchzApp::channel()
    ->contact('xxx@c.us')
    ->seen(
        messageId: 'false_xxxx@c.us_xxx'
    )
    ->send();
```
#### Start Typing
```php
use CrunchzApp\CrunchzApp;

CrunchzApp::channel()
    ->contact('xxx@c.us')
    ->startTyping()
    ->send();
```
#### Stop Typing
```php
use CrunchzApp\CrunchzApp;

CrunchzApp::channel()
    ->contact('xxx@c.us')
    ->stopTyping()
    ->send();
```



## Metodologies
There are 2 methods to sending message within this sdk.
- Parallel method
- Single method

### Parallel Method
It means you can asynchronously send a message by stacking each function method that available. For example, you want to sending text message but you also want it to be natural so you'll gonna use :
- Typing
- Send Message (Text)
- Stop Typing.

These function are available in this SDK, so you will do something like

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
