## DisableTwoFactorAuth Module 

- This module is used to disable 2FA modules in local installation.
- The 2FA module will be disabled only if the system is in developer mode and is a local installation.


## Installation

```
composer require --dev aonach/module-disabletwofactorauth
bin/magento module:enable Aonach_DisableTwoFactorAuth
bin/magento setup:upgrade
```
