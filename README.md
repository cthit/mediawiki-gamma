# mediawiki-gamma

A customized version of MediaWiki to add support for login with Gamma, and includes several extensions for more functionality.

Includes a proxy that helps routing to sub-paths.

# Creating a Client

In order to authorize with Gamma, create a client with a redirect URL that matches `https://[URL of wiki]/wiki/index.php/Special:PluggableAuthLogin`.
Also make sure that the email scope is enabled.

# Wiki Setup

After creating a blank software stack (e.g. through Docker compose), initialize the wiki by navigating to `https://[URL of wiki]/wiki/mw-config` and then follow the instructions.
If there are any database-related errors after this, run the upgrade script: `php maintenance/update.php`.
More information about this update script can be found in MediaWiki's [documentation](https://www.mediawiki.org/wiki/Manual:Update.php).

## Configuration

The following environment variables can be set to configure the wiki:

| Variable        | Description                                      | Example                    |
| --------------- | ------------------------------------------------ | -------------------------- |
| `PROVIDER_URL`  | The URL of the Gamma provider                    | `https://auth.chalmers.it` |
| `CLIENT_ID`     | The client ID of the provider                    | `123456`                   |
| `CLIENT_SECRET` | The client secret of the provider                | `abcdef`                   |
| `WIKI_NAME`     | The name of the wiki                             | `My Wiki`                  |
| `WIKI_PATH`     | The root path of the wiki                        | `/wiki`                    |
| `ROOT_URL`      | The root URL of the wiki                         | `https://wiki.chalmers.it` |
| `DB_SERVER`     | URL to the database                              | `db`                       |
| `DB_NAME`       | The database name to use                         | `wiki`                     |
| `DB_USER`       | Username to access database                      | `wiki`                     |
| `DB_PASSWORD`   | Password to access database                      | `password`                 |
| `DB_PREFIX`     | Prefix to be used when addressing database.      | `mw_`                      |
| `SECRET_KEY`    | The secret key for the wiki                      | `secret`                   |
| `UPGRADE_KEY`   | The upgrade key for the wiki. Used for installs. | `123456`                   |
