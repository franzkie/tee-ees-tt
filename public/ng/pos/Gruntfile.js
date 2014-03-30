module.exports = function(grunt) {

	grunt.initConfig({
		uglify: {
			my_target: {
				files: {
					'js.min.js': ['js.js'],
					'mytest.min.js': ['mytest.js']
				}
			}
		},
		concat: {
		    options: {
		      separator: ';',
		    },
		    dist: {
		      src: ['jquery.bgiframe.js','angular.js'],
		      dest: 'js.js',
		    },
	   },
	   jshint: {
	    options: {
	      curly: true,
	      eqeqeq: true,
	      eqnull: true,
	      browser: true,
	      globals: {
	        jQuery: true
	      },
	    },
        files: {
          src: ['js/*.js','test/unit/*.js']
        },
	  },
	  karma: {
		  unit: {
		    configFile: 'config/karma.conf.js'
		  }
		},
	html2js: {
	    options: {
	      // custom options, see below    
	    },
	    html2js: {
	      src: ['templates/directives/mainTable.html'],
	      dest: 'templates/html2js/templates.js'
	    },
	  }
	});
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-karma');
  grunt.loadNpmTasks('grunt-html2js');
  grunt.registerTask('default',['jshint','html2js','karma']);
}