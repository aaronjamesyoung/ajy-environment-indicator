# AJY Environment Indicator Plugin for WordPress

Hello again! Time for another helpful little utility for WordPress development. This is a WordPress
plugin that shows a small indicator of your current IP address, which is handy if you are switching
between two or three different environments (development, staging, and live).

The only configuration required is to specify your live environment's IP address in the plugin code.
This is necessary to disable the IP indicators on your live site without needing to disable the plugin.

Read on for more detail...

### The Problem

When developing WordPress sites, I often am switching my browser between my
development, staging, and live environments. It's way too easy to mistakenly apply edits
to the wrong version of the website, or even worse, to delete crucial content from the live
website.

In addition, I change my hosts file a lot and I always want to make sure that my browser is
keeping up.

### The Solution

A small, unobtrusive visual indicator is all I need to know what server my browser is currently
looking at. So here's a little WordPress plugin that provides that indicator.

### What it shows you

There are two visual indicators, pictured below:

1. The current IP address is printed in a small floating tooltip at the bottom right of the window, and
2. The first section of the current IP is printed in a little badge on the favicon of the website.

![environment-indicator](https://cloud.githubusercontent.com/assets/459077/5986507/8cbd2d54-a8af-11e4-9564-343948ac69b9.png)

If you configure the plugin as in step 3 below, these indicators will NOT display on your live
website, which I'm assuming is what you want.

### Installation

1. Download from Github (I'm going to post it on the WordPress.org plugin repo when I have a chance).
2. Put the plugin folder into wp-content/plugins, OR put it into wp-content/mu-plugins (I find mu-plugins
  to be preferable for little plugins like this that I don't want my clients messing with).
3. Edit ajy-environment-indicator.php. Near the top of the file is a line for you to configure
  your live server IP. This is important to keep the indicators from displaying on your live website.

### Notes

All credit to [favico.js](http://lab.ejci.net/favico.js/) for the awesome favicon badge script.

The favicon indicator is somewhat tricky to get going correctly. Here's what you need to do:

* Make sure you have a favicon file in place.
* Make sure the `<head>` of your WordPress theme has a `<link>` element to the favicon -
  something like this: `<link rel="icon" type="image/png" href="<?php bloginfo('url'); ?>/favicon.png?v=1" />`

And some notes from the favico.js folks:

* Make sure the favicon is hosted on the same domain as the website you're looking at.
* Favico.js currently supports Chrome and Firefox, but may have trouble in other browsers.

Even if your favicon badge isn't working, you can still rest easy knowing the little tooltip in the
bottom corner will be there for you.

I've considered adding an options page to configure your live URL. I'm putting that off for the
time being. It seems to make more sense in the plugin file itself, where you can configure it
once and be done instead of needing to do it in the WP admin for each website.
