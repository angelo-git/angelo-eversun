=== WP-Menu ===
Contributors: vizioninteractive
Tags: menu, theme, custom, wp
Requires at least: 2.6
Tested up to: 2.8.2
Stable tag: 0.2.6

Customizable hook to pull Page Navigation into a theme. Page Exclusion, Inclusion, Site Map, Top Level, Secondary menus and more

== Description ==

Customizable hook to pull Page Navigation into a theme. Page Exclusion, Inclusion, Site Map, Top Level, Secondary menus and more

**Options:**

* **return** = options (int): 0 = print / 1 = return {default = 0}
* **nav_type** = options: single / secondary / sitemap / single_secondary {default = single}
* **nav_levels** = options (int): 0 = all / 1+ = stop after level X {default = 0}
* **nav_tag** = options: ul / ol / dl {default = ul}
* **nav_wrap** = options (int): 0 = do not wrap the first level of navigation / 1 = wrap the first level of navigation in the normal tags (Ex: `<ul>...</ul>`) {default = 1}
* **nav_class** = assign a class="...." to navigation {default = none}
* **nav_id** = assign an id="...." to navigation {default = none}
* **div** = div wrapper on menu (int) {default = 0}
* **div_class** = `<div class="....">` {default = none}
* **div_id** = `<div id="....">` {default = none}
* **heading** = options: h2 / dt / 0 (off) {default = 0}
* **this_id** = change the active ID (int) referenced {default = current post/page ID}
* **parent_id** = base the menus off of this ID {default = 0}
* **parent_href** = base the menus off of this href {default = root of wordpress site}
* **active** = options: item / link (this is what the selected class gets applied to) {default = item}
* **active_class** = gets added to an item that is "active"; for example: class="selected" {default = selected}
* **target** = `<a href="/contact-us/" target="....">Link</a>` {default = none}
* **accesskeys** = Assign accesskeys; for example: accesskey="1" {default = 1}
* **exclude** = Do not show these IDs {default = none}
* **include** = Show only these IDs {default = none}
* **exclude_uri** = options: false = off / (string) (Do not show any pages that have this in their URL, Ex: thank-you) {default = false}
* **show_home** = To show or not show the Home link, must provide home_path {default = 1}
* **home_path** = The real home link! (ex: /home/) {default = /home/}
* **home_link** = What we want home to link to! (ex: /) {default = /}
* **start_link** = Adds a new menu item to the beginning of the menu (ex: /) {default = false}
* **start_title** = The new menu item's title (ex: Home) {default = Home}
* **nofollow** = `<a rel="nofollow" ...` A comma-separated list of Page IDs to nofollow, you can also enter "all" to apply to all menu links (Ex: 1,4,5) {default = false}
* **unique_class** = Current item's ID added to the class of the item (Ex: `class="prefix-PAGE_ID_HERE"`) {default = 0}
* **unique_prefix** = Gets added to the unique class (if on) (Ex: `class="wpmenu-PAGE_ID_HERE"`) {default = wpmenu}
* **c2p_cid** = Catgory ID for Category=Page (category called press releases) {default = none}
* **c2p_pid** = Page ID for Category=Page (page called press releases) {default = none}
* **b2p_pid** = Page ID for Blog (all posts) {default = none}

== Installation ==

1. Unpack the entire contents of this plugin zip file into your `wp-content/plugins/` folder locally
1. Upload to your site
1. Navigate to `wp-admin/plugins.php` on your site (your WP plugin page)
1. Activate this plugin

OR you can just install it with WordPress by going to Plugins >> Add New >> and type WP-Menu

== Usage ==

This function will automatically `print`.

`<?php wp_menu('nav_type=single_secondary&nav_levels=2&nav_tag=ul&nav_id=nav&exclude=17,21,19,3&accesskeys=1&active=item&active_class=current&b2p_pid=5'); ?>`