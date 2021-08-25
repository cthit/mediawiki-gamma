<?php
# This file was automatically generated by the MediaWiki 1.35.1
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
if (!defined('MEDIAWIKI')) {
	exit;
}


## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename = $_ENV["WIKI_NAME"];
$wgMetaNamespace = $_ENV["WIKI_NAME"];

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = $_ENV["WIKI_PATH"];

## The protocol and server name to use in fully-qualified URLs
$wgServer = $_ENV["ROOT_URL"];

## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;

## The URL paths to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo = $wgScriptPath . '/images/logo.png';

## UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = true; # UPO

$wgEmergencyContact = "apache@🌻.invalid";
$wgPasswordSender = "apache@🌻.invalid";

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype = "mysql";
$wgDBserver = $_ENV["DB_SERVER"];
$wgDBname = $_ENV["DB_NAME"];
$wgDBuser = $_ENV["DB_USER"];
$wgDBpassword = $_ENV["DB_PASSWORD"];

# MySQL specific settings
$wgDBprefix = $_ENV["DB_PREFIX"];

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Shared database table
# This has no effect unless $wgSharedDB is also set.
$wgSharedTables[] = "actor";

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
$wgPingback = true;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale. This should ideally be set to an English
## language locale so that the behaviour of C library functions will
## be consistent with typical installations. Use $wgLanguageCode to
## localise the wiki.
$wgShellLocale = "C.UTF-8";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publicly accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Site language code, should be one of the list in ./languages/data/Names.php
$wgLanguageCode = "en";

$wgSecretKey = $_ENV["SECRET_KEY"];

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = $_ENV["UPGRADE_KEY"];

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
$wgDefaultSkin = "vector";

# Enabled skins.
# The following skins were automatically enabled:
wfLoadSkin('MonoBook');
wfLoadSkin('Timeless');
wfLoadSkin('Vector');


# End of automatically generated settings.
# Add more configuration options below.

wfLoadExtension('GetUserName');
wfLoadExtension('ParserFunctions');


#################################################################################################################################
######################### OAUTH GAMMA ###########################################################################################
#################################################################################################################################
wfLoadExtension('MW-OAuth2Client-Gamma');

$wgOAuth2Client['client']['id']     = $_ENV["GAMMA_CLIENT_ID"]; // The client ID assigned to you by the provider
$wgOAuth2Client['client']['secret'] = $_ENV["GAMMA_CLIENT_SECRET"]; // The client secret assigned to you by the provider

$wgOAuth2Client['configuration']['authorize_endpoint']     = $_ENV["GAMMA_AUTH"]; // Authorization URL
$wgOAuth2Client['configuration']['access_token_endpoint']  = $_ENV["GAMMA_TOKEN"]; // Token URL
$wgOAuth2Client['configuration']['api_endpoint']           = $_ENV["GAMMA_USER"]; // URL to fetch user JSON
$wgOAuth2Client['configuration']['redirect_uri']           = $_ENV["GAMMA_REDIRECT"]; // URL for OAuth2 server to redirect to

$wgOAuth2Client['configuration']['username'] = 'cid'; // JSON path to username
$wgOAuth2Client['configuration']['email'] = 'email'; // JSON path to email

$wgOAuth2Client['configuration']['authorized_groups'] = $_ENV["GAMMA_AUTHORIZED_GROUPS"]; // Comma separated list of authorized groups
// $wgOAuth2Client['configuration']['gamma_authority'] = $_ENV["GAMMA_AUTHORITY"]; // Gamma
$wgOAuth2Client['configuration']['service_name'] = 'Gamma'; // the name of your service
$wgOAuth2Client['configuration']['service_login_link_text'] = 'Login with Gamma'; // the text of the login link

$wgOAuth2Client['configuration']['scopes'] = '';

$wgOAuth2Client['configuration']['http_bearer_token'] = 'Bearer'; // Token to use in HTTP Authentication
$wgOAuth2Client['configuration']['query_parameter_token'] = 'auth_token'; // query parameter to use

#################################################################################################################################
######################### digITDefault ##########################################################################################
#################################################################################################################################

# Whitelist oauth login page
$wgWhitelistRead = ['Special:OAuth2Client', 'Special:OAuth2Client/redirect'];


# Allow normal users to move pages etc.
$wgGroupPermissions['user']['move'] = true;
$wgGroupPermissions['user']['move-subpages'] = true;
$wgGroupPermissions['user']['upload'] = true;
$wgGroupPermissions['user']['reupload'] = true;
$wgGroupPermissions['user']['delete'] = true;
$wgGroupPermissions['user']['undelete'] = true;
$wgGroupPermissions['user']['bigdelete'] = true;
$wgGroupPermissions['user']['deletedhistory'] = true;
$wgGroupPermissions['user']['deletedtext'] = true;

$wgGroupPermissions['*']['createaccount'] = false;
$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['*']['read'] = false;

## The relative URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEnableEmail = false;
$wgEnableUserEmail = false; # UPO
$wgEmergencyContact = "digit@chalmers.it";
$wgPasswordSender = "digit@chalmers.it";

$wgHashedUploadDirectory = true;
$wgHashedSharedUploadDirectory = true;

$wgCapitalLinks = false;

$wgFileExtensions = array(
	'png', 'jpg', 'tiff', 'bmp', 'jpeg', 'gif', 'pdf', 'ppt', 'tar.gz', 'tar', 'doc', 'docx', 'xls', 'xlsx'
);

# https://www.mediawiki.org/wiki/Topic:W1xkngh7z9r8xh6v
$wgDisableOutputCompression  = true;
