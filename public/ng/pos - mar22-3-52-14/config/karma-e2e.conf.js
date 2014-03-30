/*basePath = '../';

files = [
  ANGULAR_SCENARIO,
  ANGULAR_SCENARIO_ADAPTER,
  'test/e2e/** / *.js'
];

autoWatch = false;

browsers = ['Chrome'];

singleRun = true;

proxies = {
  '/': 'http://localhost:8000/'
};

junitReporter = {
  outputFile: 'test_out/e2e.xml',
  suite: 'e2e'
};
*/


module.exports = function(config){
	config.set({
		files:[
		  'js/lib/angular/angular-*.js',
		  'js/lib/angular/bootstrap/ui-bootstrap-0.6.0.js',
		  'js/lib/angular/bootstrap/position.js',
		  'js/lib/angular/bootstrap/ui.bootstrap.modal.js',
		  'js/*.js',
		  'test/lib/angular/angular-scenario.js',
		  'test/e2e/scenario.js'
		],
		basePath: '../',
		frameworks : ["ng-scenario"],
		autoWatch : true,

		browsers : ['Firefox'],

		junitReporter : {
		  outputFile: 'test_out/unit.xml',
		  suite: 'unit'
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