# mediawiki-gamma

A customized version of MediaWiki to add support for login with Gamma, and includes several extensions for more functionality.

Includes a proxy that helps routing to sub-paths.

# Usage with Gamma

In order to authorize with Gamma, create a client with a redirect URL that matches `https://[URL of wiki]/[wiki path]/Special:PluggableAuthLogin`.
Also make sure that the email scope is enabled.
If you want to make any restrictions on who can access the wiki, you can set those directly on the client.
The wiki will not do any additional checks other than login status.

# Wiki Setup

After creating a blank software stack (e.g. through Docker compose), you should be able to access the wiki through the proxy at `http://localhost:4000/[wiki path]`, or directly at `http://localhost:4001/[wiki path]`.
Note that doing the latter requires setting `ROOT_URL` to match the non-proxied version, or else all further links will incorrectly lead to the proxied version.
The wiki can now be initialized by navigating to `http://localhost:4000/[wiki path]/mw-config` and following the instructions.
Should you encounter a 404 error when clicking continue, navigate directly to the wiki setup page at http://localhost:4001/mw-config.

If there are any database-related errors after initialization, run the upgrade script: `php maintenance/update.php`.
More information about this update script can be found in MediaWiki's [documentation](https://www.mediawiki.org/wiki/Manual:Update.php).

> [!WARNING]  
> Make sure that there exists a backup of the database before running the upgrade script.

## Upgrading from Previous Versions

If you are upgrading from version < 1.39, you will need to run the upgrade script to create new database tables used by new extensions: `php maintenance/update.php`.

## Configuration

### Environment Variables

The following environment variables can be set to configure the wiki:

| Variable                       | Description                                                    | Default    | Example                    |
| ------------------------------ | -------------------------------------------------------------- | ---------- | -------------------------- |
| `PROVIDER_URL`                 | The URL of the Gamma provider                                  | (Required) | `https://auth.chalmers.it` |
| `CLIENT_ID`                    | The client ID of the provider                                  | (Required) | `123456`                   |
| `CLIENT_SECRET`                | The client secret of the provider                              | (Required) | `abcdef`                   |
| `WIKI_NAME`                    | The name of the wiki                                           | (Required) | `My Wiki`                  |
| `WIKI_PATH`                    | The root path of the wiki                                      | `""`       | `/wiki`                    |
| `ROOT_URL`                     | The root URL of the wiki                                       | (Required) | `https://wiki.chalmers.it` |
| `DB_SERVER`                    | URL to the database                                            | (Required) | `db`                       |
| `DB_NAME`                      | The database name to use                                       | (Required) | `wiki`                     |
| `DB_USER`                      | Username to access database                                    | (Required) | `wiki`                     |
| `DB_PASSWORD`                  | Password to access database                                    | (Required) | `password`                 |
| `DB_PREFIX`                    | Prefix to be used when addressing database.                    | `mw_`      | `wiki_`                    |
| `SECRET_KEY`                   | The secret key for the wiki                                    | (Required) | `secret`                   |
| `UPGRADE_KEY`                  | The upgrade key for the wiki. Used for installs.               | (Required) | `123456`                   |
| `ENABLE_LOCAL_LOGIN`           | Enable local login for the wiki.                               | `false`    | `false`                    |
| `ENABLE_LOCAL_USER_PROPERTIES` | Allow users to edit their own properties.                      | `false`    | `false`                    |
| `USE_WORDMARK`                 | Enable wordmark (text-only logo, used in certain skins)        | `false`    | `true`                     |
| `WORDMARK_WIDTH`               | Width of the wordmark (max 124)                                | `124`      | `64`                       |
| `WORDMARK_HEIGHT`              | Height of the wordmark (max 32)                                | `32`       | `32`                       |
| `DEFAULT_SKIN`                 | Default skin to use. Is also displayed for non-logged in users | `citizen`  | `vector-2022`              |

### Choosing a Path

If you want to host the wiki under a subdirectory, setting the `WIKI_PATH` environment variable to the desired path will make the wiki accessible at `http://localhost:4000/[wiki path]`.
If you want to host the wiki at the root, set `WIKI_PATH` to an empty string.
