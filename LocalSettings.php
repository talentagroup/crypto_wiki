<?php
# This file was automatically generated by the MediaWiki 1.32.1
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# https://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}


## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename = "Cryptowiki";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = "/mediawiki";

## The protocol and server name to use in fully-qualified URLs
##$wgServer = "http://139.180.131.232";
$wgServer = "http://wiki.talenta.com";

## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;

## The URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo = "$wgResourceBasePath/resources/assets/logo-horizontal.png";
$wgFavicon = "$wgResourceBasePath/resources/assets/logo.png";
## UPO means: this is also a user preference option
$wgUploadDirectory = "images";
$wgUploadPath = "$wgScriptPath/images";
$wgAllowExternalImages = true;

$wgEnableEmail = true;
$wgEnableUserEmail = true; # UPO

$wgEmergencyContact = "apache@139.180.131.232";
$wgPasswordSender = "apache@139.180.131.232";

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype = "mysql";
$wgDBserver = "localhost";
$wgDBname = "mediawiki_db";
$wgDBuser = "mediawiki";
$wgDBpassword = "Talenta2018";

# MySQL specific settings
$wgDBprefix = "";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

## Shared memory settings
$wgMainCacheType = CACHE_NONE;
$wgMemCachedServers = [];

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = false;

# Periodically send a pingback to https://www.mediawiki.org/ with basic data
# about this MediaWiki instance. The Wikimedia Foundation shares this data
# with MediaWiki developers to help guide future development efforts.
$wgPingback = false;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "C.UTF-8";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Site language code, should be one of the list in ./languages/data/Names.php
$wgLanguageCode = "en";

$wgSecretKey = "65c0232a114e99150aac5820b865063cc4301c81bc7a3981a4b9ec60999c9820";

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = "fb64249c6ca5ab5a";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'vector', 'monobook':
$wgDefaultSkin = "chameleon";
# Enabled skins.
# The following skins were automatically enabled:
wfLoadSkin( 'MonoBook' );
wfLoadSkin( 'Timeless' );
wfLoadSkin( 'Vector' );


# Enabled extensions. Most of the extensions are enabled by adding
# wfLoadExtensions('ExtensionName');
# to LocalSettings.php. Check specific extension documentation for more details.
# The following extensions were automatically enabled:
wfLoadExtension( 'CategoryTree' );
wfLoadExtension( 'Cite' );
wfLoadExtension( 'CiteThisPage' );
wfLoadExtension( 'CodeEditor' );
wfLoadExtension( 'ConfirmEdit' );
wfLoadExtension( 'Gadgets' );
wfLoadExtension( 'ImageMap' );
wfLoadExtension( 'InputBox' );
wfLoadExtension( 'Interwiki' );
wfLoadExtension( 'LocalisationUpdate' );
wfLoadExtension( 'MultimediaViewer' );
wfLoadExtension( 'Nuke' );
wfLoadExtension( 'OATHAuth' );
wfLoadExtension( 'ParserFunctions' );
wfLoadExtension( 'PdfHandler' );
wfLoadExtension( 'Poem' );
wfLoadExtension( 'Renameuser' );
wfLoadExtension( 'ReplaceText' );
wfLoadExtension( 'SpamBlacklist' );
wfLoadExtension( 'SyntaxHighlight_GeSHi' );
wfLoadExtension( 'TitleBlacklist' );
wfLoadExtension( 'WikiEditor' );
wfLoadExtension( 'Moderation' );
# End of automatically generated settings.
# Add more configuration options below.
#wfLoadExtension( 'MobileFrontend' );
$wgMFAutodetectMobileView = true;
#wfLoadSkin( 'MinervaNeue' );
#$wgMFDefaultSkinClass = 'chameleon';
wfLoadSkin( 'chameleon' );
wfLoadExtension( 'Scribunto' );
$wgScribuntoDefaultEngine = 'luastandalone';
wfLoadExtension( 'WikiSEO' );
wfLoadExtension( 'Amp' );
wfLoadExtension( 'EmbedVideo' );
#Translation
wfLoadExtension( 'Babel' );
wfLoadExtension( 'cldr' );
wfLoadExtension( 'CleanChanges' );
$wgCCTrailerFilter = true;
$wgCCUserFilter = false;
$wgDefaultUserOptions['usenewrc'] = 1;
wfLoadExtension( 'LocalisationUpdate' );
$wgLocalisationUpdateDirectory = "$IP/cache";

require_once "$IP/extensions/Translate/Translate.php";
$wgGroupPermissions['translator']['translate'] = true;
$wgGroupPermissions['translator']['skipcaptcha'] = true;
$wgGroupPermissions['user']['translate'] = true;
$wgGroupPermissions['user']['translate-messagereview'] = true;
$wgGroupPermissions['user']['translate-groupreview'] = true;
$wgGroupPermissions['user']['translate-import'] = true;
$wgGroupPermissions['sysop']['pagetranslation'] = true;
$wgGroupPermissions['sysop']['translate-manage'] = true;
$wgTranslateDocumentationLanguageCode = 'qqq';
$wgExtraLanguageNames['qqq'] = 'Message documentation'; # No linguistic content. Used for documenting messages
$wgTranslatePageTranslationULS = false;
wfLoadExtension( 'UniversalLanguageSelector' );
$wgEnablePageTranslation = true;
#html js
$wgRawHtml = true;
$wgAllowUserJs = true;

#google analytics
require_once "$IP/extensions/googleAnalytics/googleAnalytics.php";
// Replace xxxxxxx-x with YOUR GoogleAnalytics UA number
$wgGoogleAnalyticsAccount = 'UA-142143185-1'; 
// Add HTML code for any additional web analytics (can be used alone or with $wgGoogleAnalyticsAccount)
$wgGoogleAnalyticsOtherCode = '<script type="text/javascript" src="https://analytics.example.com/tracking.js"></script>';

// Optional configuration (for defaults see googleAnalytics.php)
// Store full IP address in Google Universal Analytics (see https://support.google.com/analytics/answer/2763052?hl=en for details)
$wgGoogleAnalyticsAnonymizeIP = true; 
// Array with NUMERIC namespace IDs where web analytics code should NOT be included.
$wgGoogleAnalyticsIgnoreNsIDs = array(500);
// Array with page names (see magic word {{FULLPAGENAME}}) where web analytics code should NOT be included.
$wgGoogleAnalyticsIgnorePages = array('ArticleX', 'Foo:Bar');
// Array with special pages where web analytics code should NOT be included.
$wgGoogleAnalyticsIgnoreSpecials = array( 'Userlogin', 'Userlogout', 'Preferences', 'ChangePassword', 'OATH');
// Use 'noanalytics' permission to exclude specific user groups from web analytics, e.g.
$wgGroupPermissions['sysop']['noanalytics'] = false;
$wgGroupPermissions['bot']['noanalytics'] = true;
// To exclude all logged in users give 'noanalytics' permission to 'user' group, i.e.
$wgGroupPermissions['user']['noanalytics'] = false;

#Mobile Detect
require_once "$IP/extensions/MobileDetect/MobileDetect.php";

#SKin Customization
$egChameleonLayoutFile= __DIR__ . '/skins/chameleon/layouts/clean.xml';
$egChameleonExternalStyleVariables = [
    '$cmln-navbar-bg-color' => 'dark',
    '$dark' => 'black',
    '$navbar-light-color' => '#f0f0f0',
    '$cmln-search-bar-btn-color' => 'dark',
    '$navbar-light-hover-color' => '#32c5d2',
    '$cmln-navbar-logo-height' => '40px',    
];

