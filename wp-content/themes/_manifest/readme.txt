Manifest WordPress Parent Theme

We recommend using Composer (https://getcomposer.org/) to include MNFST as a dependency
in a WordPress based project. We used to include it as a submodule but kept running 
into issues when deploying to staging or production. Instructions for installing 
Composer on OS X can be found here - 
https://getcomposer.org/doc/00-intro.md#globally-on-osx-via-homebrew-. Instructions 
for other operating systems are available on that same page.

You will need to create a file name composer.json in the root of your project with the 
following contents:  
{
    "config": {
        "preferred-install": "dist"
    },
    "require": {
        "mnfst": "dev-master",
        "composer/installers": "~1.0"
    },
    "repositories": [
        {
            "type": "composer",
            "url": "http://packages.krnlthe.me"
        }
    ],
    "extra": {
        "installer-paths": {
            "themes/_{$name}/": ["type:wordpress-theme"]
        }
    }
}
 

The installer-paths node above is for including Manifest from the root of a WordPress 
install. If you're including Manifest from somewhere else, please edit accordingly.