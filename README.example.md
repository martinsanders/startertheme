# NAME_OF_YOUR_THEME theme

## Installation
* Create a composer.json file in the MODX webroot with the following content:
```json
{
    "name": "heibel/PROJECTNAME",
    "version": "v1.0.0",
    "type": "project",
    "license": "MIT",
    "minimum-stability": "dev",
    "prefer-stable": true,
    "repositories": [
        { "type": "vcs", "url": "git@bitbucket.org:YOUR_NAME/NAME_OF_YOUR_THEME.git" }
    ],
    "require": {
        "heibel/NAME_OF_YOUR_THEME": "THEME_VERSION"
    }
}
```
* Run `composer update` in the MODX webroot folder
* Run `php ./PATH_TO_THEME/installer/installer.php` in the MODX webroot folder
* __Optional:__ Import the `configuration/acl/client.policy.xml` file as ACL policy for the Client.
* __Optional:__ Import the `configuration/formcustomization/set_create.xml` and `configuration/formcustomization/set_update.xml` files as form customization for the Client.

## Update this theme
* Update the version number of the theme in the composer.json file
* Run `composer update` in the MODX webroot folder
* Run `php ./PATH_TO_THEME/installer/installer.php` in the MODX webroot folder

## Features

* Describe the features of this theme here.
* ...
* ...