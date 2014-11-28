"use strict";

module.exports = function( grunt ){
	//load all tasks
	require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);

	grunt.initConfig({
	   pkg: grunt.file.readJSON('package.json'),
	  
	  uglify: {
	    options: {
	      mangle: false
	    },
	    my_target: {
	      files: {
	        'js/all.min.js': ['js/main.js']
	      }
	    },
	   },

	   watch: {
			sass: {
				files: [ 'sass/**/*' ],
				tasks: [ 'sass' ]
			},
			css: {
				files: [ 'css/**/*' ],
				tasks: [ 'cssmin' ]
			},
			js: {
				files: 'js/*',
				tasks: [ 'uglify' ]
			}
		},

	   cssmin: {
	   	minify: {
	   		expand:true,
	   		cwd: 'css/',
	   		src: ['*.css'],
	   		dest: 'css/',
	   		ext: '.min.css'
	   	}
	   },


	   concat: {
	      basic: {
	         src: ['css/*.min.css'],
	         dest: 'css/main.css'
	      }
	   },


	    sass: {                                    // task
	        dist: {                                // target
	            files: {                        // dictionary of files
	                'css/layout.min.css': 'sass/layout.scss'
	            }
	        },
	        dev: {                                // another target
	            options: {                        // dictionary of render options
	                sourceMap: true
	            },
	            files: {
	                'css/layout.css': 'sass/layout.scss',
	            }
	        }
	    }
	});

	grunt.loadNpmTasks('grunt-contrib-uglify');
   grunt.loadNpmTasks('grunt-contrib-watch');
   grunt.loadNpmTasks('grunt-contrib-cssmin');
   grunt.loadNpmTasks('grunt-contrib-concat');
   grunt.loadNpmTasks('grunt-sass');
	grunt.registerTask( 'default', [ 'uglify', 'watch', 'cssmin', 'concat', 'sass' ] );
}