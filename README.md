### INPSYDE Assignment 
#### Show the list of user from https://jsonplaceholder.typicode.com,

##### to install this plugin download the zip file or clone the repo on wp-content/plugins directory

##### after activate the plugin its create a page lovely User List


Run this command for creating test environment
```bash
bash bin/install-wp-tests.sh wordpress_test root '' localhost latest
```
- wordpress_test is the name of database
- root is mysql user name
- '' is mysql user password
- localhost is mysql server host
- latest is wordpress version

for install php dependency
```bash
composer install
```
for check phpcs
```bash
composer phpcs
```
for check phpcompatibility
```bash
composer phpcbf
```
for run phpunit test
```bash
vendor/bin/phpunit
```