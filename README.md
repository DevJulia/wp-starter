# Gatling Theme

Theme files only, copy this folder in an existing Wordpress installation.

## How to use Gulp with this theme?

* Install gulp-cli if it is not installed (npm install gulp-cli -g)
* Run "gulp watch" for live development
* For a new build for production, run "gulp build"

### Add a new library

* Add the library with npm
* Edit the "gulpfile.js" and add the library in the "paths" variable
* Run "gulp build" or "gulp js"
* Edit the file "includes/scripts.php" to register the script in Wordpress
