
module.exports = function (grunt) {
  'use strict';


  var fs = require('fs');
  var path = require('path');

  // Project configuration.
  grunt.initConfig({

    // Task configuration.
    clean: {
      dist: 'css'
    },
    
    csslint: {
      options: {
        csslintrc: 'bootstrap/less/.csslintrc'
      },
      src: [
        'css/styles.css'
      ]
    },

    less: {
      compileCore: {
        options: {
          strictMath: true,
          sourceMap: true,
          outputSourceFiles: true,
          sourceMapURL: 'styles.css.map',
          sourceMapFilename: 'css/styles.css.map'
        },
        files: {
          'css/styles.css': 'less/style.less'
        }
      },
      compileTheme: {
        options: {
          strictMath: true,
          sourceMap: true,
          outputSourceFiles: true,
          sourceMapURL: 'styles.css.map',
          sourceMapFilename: 'css/styles.css.map'
        },
        files: {
          'css/styles-theme.css': 'less/style.less'
        }
      },
      minify: {
        options: {
          cleancss: true,
          report: 'min'
        },
        files: {
          'css/styles.min.css': 'css/styles.css',
        }
      }
    },
    
    watch: {
      less: {
        files: 'less/*.less',
        tasks: 'less'
      }
    },

  
  });

  // These plugins provide necessary tasks.
  require('load-grunt-tasks')(grunt, {scope: 'devDependencies'});

  grunt.registerTask('default', ['less', 'watch']);

};
