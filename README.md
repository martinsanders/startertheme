# Heibel - Base theme

This is the Heibel base theme, with this theme you can easily create new themes for Heibel. It contains Bootstrap 4 and basic styling and HTML.  

## Create a new theme based on the base theme

* Copy this base theme and rename the folder
* Search for `startertheme` and `starter-theme` and rename it to your theme name
* Change the composer.json in the root to match your theme
* Host your theme on GIT, for example on Bitbucket (the repository needs public access)
* Remove this README.md and replace it with the README.example.md, then change it to match your theme
  
This theme folder can live in one of the following directories:  
  
* MODX_WEBROOT/theme-name
* MODX_WEBROOT/heibel/theme-name
* MODX_WEBROOT/vendor/heibel/theme-name (for composer installations)

Run the `php ./PATH_TO_THEME/installer/installer.php` to install all the database related data, it does both create and update migrations.

## Elements
The elements (chunks, plugins, snippets, templates) can be found in the `elements` folder.

## Lexicons
The lexicons can be found in the `lexicon` folder.

## Assets
The CSS and JavaScript assets can be found in the `assets` folder. They are getting compiled by ModxMinify.
To override assets on website level just create a `MODX_WEBROOT/theme-configuration` folder in the webroot of MODX and enable line 1 and 36 in this file: `/assets/scss/style.scss`
Now create this files in de MODX webroot folder:

* MODX_WEBROOT/theme-configuration/assets/scss/settings/vars.scss
* MODX_WEBROOT/theme-configuration/assets/scss/override.scss

And start overriding the SCSS.

If you create new variables in `/assets/scss/settings/_vars.scss` please make sure you add the `!default` suffix, to allow overriding on theme level.

## Configurations
Configuration files can be found in the `configuration` folder. To override a config on website level just copy the config and put it in `MODX_WEBROOT/theme-configuration`.
The configs will now get merged and the `theme-configuration` config is leading.  
The configuration files can be used to create, update or install:  

* Chunks
* Packages
* Plugins
* Resources
* Settings (both system and context)
* Snippets
* Templates
* Template variables
* Categories
* Contexts 
* Content types
* Menus
* Media sources
* Namespaces
* MIGX JSON configs
* Client config settings

You can also manage other database models with the additional config. For examples look at the existing configs in the `configuration` folder. We use XPDO objects so you can edit every single database table field.
Records can be skipped from updating by adding `'exclude_from_update' => true` to the object. Or skip certain fields (on update) like this `'exclude_fields_from_update' => ['longtitle', 'description']`.