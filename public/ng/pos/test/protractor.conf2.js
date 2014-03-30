exports.config = {

  specs : [
    './e2e/scenarios.js'
  ],

  baseUrl: 'http://localhost:3333',

  capabilities: { 'browserName': 'firefox' }

};