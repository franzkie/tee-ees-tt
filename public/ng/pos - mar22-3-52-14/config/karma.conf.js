
module.exports = function(config){
	config.set({
		files:[
		  'js/lib/jquery/jquery.v1.8.3.min.js',
		  'js/lib/angular/angular-*.js',
		  'js/lib/angular/angular.min.js',
		  'templates/html2js/*.js',
		  'js/lib/angular/bootstrap/ui-bootstrap-0.6.0.js',
		  'js/lib/angular/bootstrap/position.js',
		  'js/lib/angular/bootstrap/ui.bootstrap.modal.js',
		  'js/*.js',
		  'test/lib/angular/angular-mocks.js',
		  'test/unit/helpers/*.js',
		  'test/unit/*.js'
		],
		basePath: '../',
		frameworks : ["jasmine"],
		autoWatch : true,

		browsers : ['Firefox'],

		junitReporter : {
		  outputFile: 'test_out/unit.xml',
		  suite: 'unit'
		},
		preprocessors : {
		  '../templates/increment.html': 'html2js'
		}
	});
	/*basePath = '../';
	frameworks = ["JASMINE"];

	files = [
	  'app/lib/angular/angular.js',
	  'app/lib/angular/angular-*.js',
	  'test/lib/angular/angular-mocks.js',
	  'app/js/** / *.js',
	  'test/unit/** / *.js'
	];

	autoWatch = true;

	browsers = ['Chrome'];

	junitReporter = {
	  outputFile: 'test_out/unit.xml',
	  suite: 'unit'
	};*/
}