var gulp = require('gulp');                             // Gulp!

var sass = require('gulp-sass');                        // Sass
var minifycss = require('gulp-minify-css');             // Minify CSS
var concat = require('gulp-concat');                    // Concat files
var uglify = require('gulp-uglify');                    // Uglify javascript
var rename = require('gulp-rename');                    // Rename files
var util = require('gulp-util');                        // Writing stuff
var livereload = require('gulp-livereload');            // LiveReload



//
//      Compile all CSS for the site
//
//////////////////////////////////////////////////////////////////////


    gulp.task('sass', function (){
        gulp.src(['assets/scss/buildvariables.scss'])                    // Build Our Stylesheet
            .pipe(sass({style: 'compressed', errLogToConsole: true}))  // Compile scss
            .pipe(rename('main.min.css'))                              // Rename it
            .pipe(minifycss())                                         // Minify the CSS
            .pipe(gulp.dest('assets/css/'))                            // Set the destination to assets/css
            .pipe(livereload());                                       // Reloads server
            util.log(util.colors.yellow('Sass compiled & minified'));  // Output to terminal
    });



//
//      Default gulp task.
//
//////////////////////////////////////////////////////////////////////


gulp.task('watch', function(){

    var server = livereload();
    gulp.watch('**/*.php').on('change', function(file) {
          server.changed(file.path);
          util.log(util.colors.yellow('PHP file changed' + ' (' + file.path + ')'));
      });
    gulp.watch('**/*.phtml').on('change', function(file) {
          server.changed(file.path);
          util.log(util.colors.yellow('PHTML file changed' + ' (' + file.path + ')'));
      });

    gulp.watch("assets/scss/**/*.scss", ['sass']);              // Watch and run sass on changes
    
});

gulp.task('default', ['sass', 'watch']);