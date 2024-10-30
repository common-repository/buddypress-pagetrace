=== Buddypress Pagetrace ===
Contributors: Adam J Nowak
Donate link: http://hyperspatial.com/donate
Tags: buddypress,debugging,buddypress component,buddypress pages,tools,development tool
Requires at least: 2.9
Tested up to: 3.1
Stable tag: 1.1

A debugging/development tool that displays the name of the current_component and the current_action as found in the $bp global. 

== Description ==

This debugging/development tool displays names of the current_component and the current_action as extracted from the $bp Global. Sometimes action names don't exist or they might not match the displayed link, so its good to know what is going on.  Aditionally Buddypress has its own component and action names for the regular wordpress pages and blog posts, seing how this all works will enable you to write conditionals to display different content for each component. With this tool it is easy to see what those variables are. It might seem unnecessary but believe me it helps.  I never knew that when you go to your profile page the component=activity and the action=just-me, until I created this simple tool.
 
== Installation ==

1. Upload `buddypress-pagetrace` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

Instructions: 

Note: This plugin is for extending the functionality of Buddypress.  Buddypress must be installed.

1. Install the plugin
2. Activate the plugin
3. To turn off the tool: Go to the Wordpress dashboard navigate to the plugin settings via the Buddypress sidebar link/icon.  Then click on BP Pagetrace.

== Screenshots ==

1. The tool in action

== Changelog ==

= 1.0 =
* Hello Buddypress World! 

= 1.1 =
Updated submenu to account for Wp 3.1 changes to multisite menu, which is now Network Admin