# Manifest Scaffold

This repository is a scaffold for the Make Model Manifest development environment. It provides the following:

* A [Vagrant](http://docs.vagrantup.com/v2/boxes.html) virtual machine running Ubuntu 14.0.4, Apache 2.4.7, MySQL 5.5.40, PHP 5.5.9, Memcached 1.4.14, Postfix 2.11, GNU mailutils, ImageMagick 6.7.7-10, [WP-CLI](http://wp-cli.org/) and more.
* A shell script (wordpress.sh) that installs latest stable version of WordPress in the root
* The Manifest WordPress parent theme which includes [ACF PRO](http://www.advancedcustomfields.com/pro/), [Timber](http://upstatement.com/timber/) and a number of custom functions and plugins
* The Manifest WordPress child theme that provides an ideal theme structure along with an interactive shell script that handles project specfic naming of files and file contents
* [Bower](http://bower.io/) for managing front end dependencies
* [Grunt](http://gruntjs.com/getting-started) for running tasks such as compiling LESS files, minifying assets and linting JavaScript and PHP files

##Prerequisites

You'll need Composer and wget for the instructions below. However, you'll need all prerequisites from the link to complete subsequent steps, so you should make sure everything is installed:

http://docs.athleticsnyc.com/development-environment-prerequisites/

## Getting started

To create a new project from this repository, start by creating a new, EMPTY Github repostory. Then, open a terminal and run:

```
git clone --bare https://github.com/athletics/manifest-scaffold.git

cd manifest-scaffold.git

# Change new-github-repository in the URL below to the slug of the newly created Github repository
git push --mirror https://github.com/athletics/new-github-repository.git
```

Once this is complete, delete the bare repository by running the following commands:

```
cd ../

rm -rf manifest-scaffold.git
```

## Installing WordPress and Configuring Themes

*Note: If you receive a permission denied error trying to run either of the scripts below, run* `chmod +x wordpress.sh` *or* `chmod +x manifest.sh`  

Clone the repository to which you mirror pushed in the step above, `cd` into its root, then open a terminal and run:

```
./wordpress.sh
```

**Note:** If you haven't installed `wget`, you'll get the following error: `wget: command not found`. Please make sure that you followed all the instructions from the link in the [Prerequisites](#prerequisites) section above.

When the script finishes installing, run:

```
composer install
```

Once Composer's project dependencies are installed, configure the Manifest parent and child themes by running:

```
./manifest.sh
```

This script is interactive and will change directory and file names and file contents based on user input. It will also delete this file and replace it with a README that provides instructions for installing the prerequistes needed to use the included development tools, starting the virtual server and configuring WordPress on first run.
