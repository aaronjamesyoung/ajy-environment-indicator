=== Plugin Name ===
Contributors: aaronjamesyoung
Tags: development, live, workflow, testing, staging
Requires at least: 4.1
Tested up to: 4.1
Stable tag: 1.0
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Display small visual indicators of your current IP address- handy if you're switching between two or three environments (i.e., dev/staging/live).

== Description ==

This is a WordPress plugin that shows a small indicator of your current IP address, which is handy if you are switching between two or three different environments (development, staging, and live).

The only configuration required is to specify your live environment's IP address in the plugin code. This is necessary to disable the IP indicators on your live site without needing to disable the plugin.

The plugin shows you two visual indicators:

1. The current IP address is printed in a small floating tooltip at bottom right of the window, and
2. The first section of the current IP is printed in a little badge on the favicon of the website.

All credit to [favico.js](http://lab.ejci.net/favico.js/) for the awesome favicon badge script!

== Installation ==

Install as usual through WordPress, or:

1. Download and unzip
2. Upload the `ajy-environment-indicator` directory into `/wp-content/plugins`  on your server.
3. Activate the plugin through the "Plugins" menu in WordPress.

Alternatively, you can upload the `ajy-environment-indicator` directory into `/wp-content/mu-plugins` instead (and you won't need to activate it from within WordPress in this case).

After installing, you probably want to tell the plugin where your live/production IP is. This will prevent the plugin from displaying the IP indicators on that server. In order to do this, edit `ajy-environment-indicator.php` and change the Live IP variable.

== Frequently Asked Questions ==

= The favicon badge isn't displaying =

1. Make sure you have a favicon file in place
2. Make sure that the `<head>` of your WordPress theme has a `<link rel="icon">` tag pointing to your favicon
3. Make sure the favicon is hosted on the same domain as the website you're looking at. This means it'll need to be present in your current environment, for example, and the `<link>` tag needs to reference your current environment.
4. Favico.js currently supports Chrome and Firefox, but may have trouble in other browsers.

Even if your favicon badge isn't working, you can still rest easy knowing the little tooltip in the bottom corner will be there for you.

== Screenshots ==

1. There are two indications of your current server IP.

== Changelog ==

= 1.0 =
Initial Release
