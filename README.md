## DisableTwoFactorAuth Module 

- This module is used to disable 2FA modules in local installation.
- The 2FA module will be disabled only if the system is in developer mode and is a local installation.


## Installation

```
Add the repository in composer.json
"aonach/module-disabletwofactorauth": {
   "type": "vcs",
   "url": "https://github.com/aonach/Aonach_DisableTwoFactorAuth"
}

Run composer require --dev aonach/module-disabletwofactorauth

Run bin/magento setup:upgrade
```
