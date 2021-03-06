'use strict';
module.exports = function(grunt) {

	// load all grunt tasks
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	grunt.initConfig({

		// Read package.json
		//pkg: grunt.file.readJSON('package.json'),
		
		// Watch for changes
        watch: {
			
            options: {
                livereload: true,
            },
			
			sass: {
				files: ['scss/**.scss'],
				tasks: ['sass']
			},
			
            livereload: {
                files: ['style.css', '*.js', '*.html', '*.php', 'img/**/*.{png,jpg,jpeg,gif,webp,svg}']
            }
			
        },

		// Compile SCSS
		sass: {
			dist: {
				options: {
					outputStyle: 'expanded'
				},
				files: {
					'css/app.css': 'scss/app.scss',
					'css/bootstrap.css' : 'scss/bootstrap.scss',
					'css/search.css' : 'scss/search.scss',
					'css/presentation.css':'scss/presentation.scss',
					'css/new.css':'scss/new.scss'
				}
			}
		},

	});

	// Default task
	grunt.registerTask('default', ['watch']);

	
}