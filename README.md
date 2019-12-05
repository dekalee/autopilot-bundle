Dekalee PubSub swarrot
=====================

[![Latest Stable Version](https://poser.pugx.org/dekalee/pubsub-swarrot-bundle/v/stable)](https://packagist.org/packages/dekalee/pubsub-swarrot-bundle)
[![Total Downloads](https://poser.pugx.org/dekalee/pubsub-swarrot-bundle/downloads)](https://packagist.org/packages/dekalee/pubsub-swarrot-bundle)
[![License](https://poser.pugx.org/dekalee/pubsub-swarrot-bundle/license)](https://packagist.org/packages/dekalee/pubsub-swarrot-bundle)

This bundle will wrap the [picr-autopilot](https://github.com/dekalee/php-autopilothq) library.

Installation
------------

Use composer to install this bundle :

```
    composer require dekalee/autopilot-bundle
```

Activate it in the `bundles.php` file:

```php
    Dekalee\AutopilotBundle\DekaleeAutopilotBundle::class => ['all' => true],
```

Configuration
-------------

In your `config.yml` file, you should set the provider to pubsub and specify the connection :

```yaml
    dekalee_autopilot:
        api_key: '%env(dekalee_autopilot_apikey)%'
```

Usage
-----

You can directly use the service `@Autopilot\AutopilotManager` to use the autopilot api.

You will get some information regarding all the calls  made in your debug toolbar.
