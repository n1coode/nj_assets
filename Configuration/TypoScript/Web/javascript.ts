page.includeJSLibs.pace = {$_DEFAULT_JAVASCRIPT_DIR}/Lib/Pace/1.0.2/pace.min.js
page.includeJSLibs.pace.if.isTrue = {$tx_njpage.js.pace}


## include jQuery
[globalVar = LIT:1 = {$tx_njpage.js.jQuery}] && [globalVar = LIT:1 > {$tx_njpage.js.requireJs}]
	page.includeJSFooterlibs.jQuery = {$_DEFAULT_JAVASCRIPT_DIR}/Lib/{$_DEFAULT_JSLIB_JQUERY}.js
[global]

## include flexSlider
[globalVar = LIT:1 = {$tx_njpage.js.flexSlider}] && [globalVar = LIT:1 > {$tx_njpage.js.requireJs}]
	page.includeJSFooterlibs.jQuery = {$_DEFAULT_JAVASCRIPT_DIR}/Lib/{$_DEFAULT_JSLIB_FLEXSLIDER}.js
[global]

## include imagesLoaded
[globalVar = LIT:1 = {$tx_njpage.js.imagesLoaded}] && [globalVar = LIT:1 > {$tx_njpage.js.requireJs}]
	page.includeJSFooterlibs.imagesLoaded = {$_DEFAULT_JAVASCRIPT_DIR}/Lib/{$_DEFAULT_JSLIB_IMAGESLOADED}.js
[global]

## include masonry
[globalVar = LIT:1 = {$tx_njpage.js.masonry}] && [globalVar = LIT:1 > {$tx_njpage.js.requireJs}]
	page.includeJSFooterlibs.masonry = {$_DEFAULT_JAVASCRIPT_DIR}/Lib/{$_DEFAULT_JSLIB_MASONRY}.js
[global]

## include modernizr
[globalVar = LIT:1 = {$tx_njpage.js.modernizr}] && [globalVar = LIT:1 > {$tx_njpage.js.requireJs}]
	page.includeJSLibs.modernizr = {$_DEFAULT_JAVASCRIPT_DIR}/Lib/{$_DEFAULT_JSLIB_MODERNIZR}.js
[global]


#include requrireJS
[globalVar = LIT:1 = {$tx_njpage.js.requireJs}]
page.includeJSLibs.requireJS = {$_DEFAULT_JAVASCRIPT_DIR}/Lib/{$_DEFAULT_JSLIB_REQUIREJS}.js

page.headerData.101 = TEXT
page.headerData.101.value(
<script type="text/javascript">
	requirejs.config({
)
[global]		


[globalVar = LIT:1 = {$tx_njpage.js.requireJs}] && [globalVar = LIT:1 > {$tx_njpage.js.angularJS}]
lib.tx_njpage.js.require.baseUrl = TEXT
lib.tx_njpage.js.require.baseUrl.value = {$_DEFAULT_JAVASCRIPT_DIR}
[global]

[globalVar = LIT:1 = {$tx_njpage.js.requireJs}] && [globalVar = LIT:1 = {$tx_njpage.js.angularJS}]
lib.tx_njpage.js.require.baseUrl = TEXT
lib.tx_njpage.js.require.baseUrl.value = {$LAYOUT_DIR}/App
[global]


[globalVar = LIT:1 = {$tx_njpage.js.requireJs}]
page.headerData.102 = TEXT
page.headerData.102 < lib.tx_njpage.js.require.baseUrl
page.headerData.102.wrap = baseUrl: '|',
[global]


[globalVar = LIT:1 = {$tx_njpage.js.requireJs}]
page.headerData.103 = TEXT
page.headerData.103.value(
		paths: {
)
[global]


[globalVar = LIT:1 = {$tx_njpage.js.requireJs}] && [globalVar = LIT:1 > {$tx_njpage.js.angularJS}]
page.headerData.104 = TEXT 
page.headerData.104.value( 
			flexslider: 'Lib/{$_DEFAULT_JSLIB_FLEXSLIDER}',
			imagesloaded: 'Lib/{$_DEFAULT_JSLIB_IMAGESLOADED}',
			jquery: 'Lib/{$_DEFAULT_JSLIB_JQUERY}',
			jqueryUI: 'Lib/{$_DEFAULT_JSLIB_JQUERY_UI}',
			masonry: 'Lib/{$_DEFAULT_JSLIB_MASONRY}',
			njPage: 'NjPage',
)
[global]

[globalVar = LIT:1 = {$tx_njpage.js.requireJs}] && [globalVar = LIT:1 = {$tx_njpage.js.angularJS}]
page.headerData.104 = TEXT 
page.headerData.104.value( 
			'angular': '../../../../../{$_DEFAULT_JAVASCRIPT_DIR}/Lib/{$_DEFAULT_JSLIB_ANGULARJS_DIR}/angular.min',
			'ngAnimate' : '../../../../../{$_DEFAULT_JAVASCRIPT_DIR}/Lib/{$_DEFAULT_JSLIB_ANGULARJS_DIR}/Modules/angular-animate.min',
			'ngResource': '../../../../../{$_DEFAULT_JAVASCRIPT_DIR}/Lib/{$_DEFAULT_JSLIB_ANGULARJS_DIR}/Modules/angular-resource.min',
			'ngRoute': '../../../../../{$_DEFAULT_JAVASCRIPT_DIR}/Lib/{$_DEFAULT_JSLIB_ANGULARJS_DIR}/Modules/angular-route.min',
			'ngSanitize':'../../../../../{$_DEFAULT_JAVASCRIPT_DIR}/Lib/{$_DEFAULT_JSLIB_ANGULARJS_DIR}/Modules/angular-sanitize.min',
			'app': 'app',
			'coreModule': 'coreModule',
			'flexslider': '../../../../../{$_DEFAULT_JAVASCRIPT_DIR}/Lib/{$_DEFAULT_JSLIB_FLEXSLIDER}',
			'imagesloaded': '../../../../../{$_DEFAULT_JAVASCRIPT_DIR}/Lib/{$_DEFAULT_JSLIB_IMAGESLOADED}',
			'jquery': '../../../../../{$_DEFAULT_JAVASCRIPT_DIR}/Lib/{$_DEFAULT_JSLIB_JQUERY}',
			'jqueryUI': '../../../../../{$_DEFAULT_JAVASCRIPT_DIR}/Lib/{$_DEFAULT_JSLIB_JQUERY_UI}',
			'masonry': '../../../../../{$_DEFAULT_JAVASCRIPT_DIR}/Lib/{$_DEFAULT_JSLIB_MASONRY}',
			'njPage': '../../../../../{$_DEFAULT_JAVASCRIPT_DIR}/NjPage',
)
[global]

[globalVar = LIT:1 = {$tx_njpage.js.requireJs}]
page.headerData.200 = TEXT
page.headerData.200.value(
			modernizr: 'Lib/{$_DEFAULT_JSLIB_MODERNIZR}'
		},
		"shim": {
			"flexslider":["jquery"],
			"jquery" : { "exports" : "$" },
			"jqueryUI":["jquery"],
			"masonry": ["jquery"],
			"njPage": ["jquery"],
			"shuffle": ["jquery"],
)
[global]

[globalVar = LIT:1 = {$tx_njpage.js.requireJs}] && [globalVar = LIT:1 = {$tx_njpage.js.angularJS}]
page.headerData.201 = TEXT
page.headerData.201.value(
			"app" : ["angular", "ngAnimate", "ngRoute", "ngResource", "ngSanitize"],
			"angular" : { "exports" : "angular" },
			"ngAnimate" : ["angular"],
			"ngResource" : ["angular"],
			"ngRoute" : ["angular"],
			"ngSanitize" : ["angular"],
)
[global]

[globalVar = LIT:1 = {$tx_njpage.js.requireJs}]
page.headerData.250 = TEXT
page.headerData.250.value(
		},
		
)
[global]




[globalVar = LIT:1 = {$tx_njpage.js.requireJs}]
page.headerData.255 = TEXT
page.headerData.255.value(
});

require(['app','controllers','services','routing'], function (app) {
	app.init();
});

</script>
)
[global]





//page.includeJSFooter.n1page = {$_DEFAULT_JAVASCRIPT_DIR}/tx_njpage_frontend.js
[globalVar = LIT:1 = {$plugin.tx_njpage.settings.general.angularJS.enable}] && [globalVar = LIT:1 = {$tx_njpage.js.angularJS}]
//page.includeJSFooter.angularApp = {$LAYOUT_DIR}/App/app.js
[else]
page.includeJSFooter.n1domain = {$LAYOUT_DIR}/Public/JavaScript/core.js
[global]