page = PAGE
page.typeNum = 0

page {
	headerData {
		10 = TEXT
		10.value(
			<meta name="apple-mobile-web-app-capable" content="yes" />
			<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
			<link rel="apple-touch-icon" sizes="144x144" href="{$GFX_DIR}/{$_APPLE_TOUCH_ICON}/144.png" />
			<link rel="apple-touch-icon" sizes="114x114" href="{$GFX_DIR}/{$_APPLE_TOUCH_ICON}/114.png" />
			<link rel="apple-touch-icon" sizes="72x72" href="{$GFX_DIR}/{$_APPLE_TOUCH_ICON}/72.png" />
			<link rel="apple-touch-icon" href="{$GFX_DIR}/{$_APPLE_TOUCH_ICON}/57.png"/>
		)
		20 = TEXT
		20.value(
			<!--[if lt IE 9]>
				<link rel="stylesheet" type="text/css" href="{$CSS_IE}" />
				<script src="{$_DEFAULT_JAVASCRIPT_DIR}/Lib/html5shiv/html5shiv.min.js" type="text/javascript"></script>
			<![endif]-->
		)
		30 = TEXT
		30.value = <link rel="shortcut icon" type="image/x-icon" href="{$DOMAIN_DIR}/favicon.ico" />
	} ## end of page.headerData
}

lib.pageTemplatePath = TEXT
lib.pageTemplatePath.value = {$PAGE_TEMPLATES_DIR}
[globalVar = LIT:1 = {$USE_DEFAULT_TEMPLATES}]
	lib.pageTemplatePath.value = {$_DEFAULT_TEMPLATES_DIR}
[global]

page.10 = FLUIDTEMPLATE
page.10 {
	//file = {$TEMPLATE_DIR}/{TEMPLATE_LAYOUT}.html
	file.stdWrap.cObject = COA
	file.stdWrap.cObject {
		5 = CASE
		5 < lib.pageTemplatePath
		10 = CASE
		10 < lib.layoutswitch
		20 = TEXT
		20.value = .html
	}
}

page.10 {
	partialRootPaths {
		10 = {$_DEFAULT_PARTIALS_DIR}
		20 = {$PAGE_PARTIALS_DIR}
	}
	layoutRootPaths {
		10 = {$_DEFAULT_LAYOUTS_DIR}
		20 = {$PAGE_LAYOUTS_DIR}	
	}

	variables {
		langFile = TEXT
		langFile.value = LLL:{$_DEFAULT_LANGUAGE_DIR}locallang.xlf:

		layout = CASE
		layout < lib.layoutswitch

		logo = TEXT
		logo.value = {$LOGO}

		cContent = CONTENT
		cContent < lib.contentMain

		cFooter = CONTENT
		cFooter < lib.contentFooter

		cHeader = CONTENT
		cHeader < lib.contentHeader

		cLeft = CONTENT
		cLeft < lib.contentLeft

		cRight = CONTENT
		cRight < lib.contentRight

		copyright = TEXT
		copyright < lib.copyright

		templateDir = TEXT
		templateDir.value = {$LAYOUT_DIR}

	}
}

## include pace
[globalVar = LIT:1 = {$plugin.tx_njpage.settings.general.javascriptLibs.pace}]
	page.includeJSLibs.pace = {$_DEFAULT_JAVASCRIPT_DIR}/Lib/Pace/1.0.2/pace.min.js
[global]

## include jQuery
[globalVar = LIT:1 = {$plugin.tx_njpage.settings.general.javascriptLibs.jQuery}]
&&
[globalVar = LIT:1 > {$plugin.tx_njpage.settings.general.javascriptLibs.requireJs}]
	page.includeJSFooterlibs.jQuery = {$_DEFAULT_JAVASCRIPT_DIR}/Lib/{$_DEFAULT_JSLIB_JQUERY}.js
[global]

## include flexSlider
[globalVar = LIT:1 = {$plugin.tx_njpage.settings.general.javascriptLibs.flexSlider}]
&&
[globalVar = LIT:1 > {$plugin.tx_njpage.settings.general.javascriptLibs.requireJs}]
	page.includeJSFooterlibs.jQuery = {$_DEFAULT_JAVASCRIPT_DIR}/Lib/{$_DEFAULT_JSLIB_FLEXSLIDER}.js
[global]

## include imagesLoaded
[globalVar = LIT:1 = {$plugin.tx_njpage.settings.general.javascriptLibs.imagesLoaded}]
&&
[globalVar = LIT:1 > {$plugin.tx_njpage.settings.general.javascriptLibs.requireJs}]
	page.includeJSFooterlibs.imagesLoaded = {$_DEFAULT_JAVASCRIPT_DIR}/Lib/{$_DEFAULT_JSLIB_IMAGESLOADED}.js
[global]

## include masonry
[globalVar = LIT:1 = {$plugin.tx_njpage.settings.general.javascriptLibs.masonry}]
&&
[globalVar = LIT:1 > {$plugin.tx_njpage.settings.general.javascriptLibs.requireJs}]
	page.includeJSLibs.masonry = {$_DEFAULT_JAVASCRIPT_DIR}/Lib/{$_DEFAULT_JSLIB_MASONRY}.js
[global]

## include modernizr
[globalVar = LIT:1 = {$plugin.tx_njpage.settings.general.javascriptLibs.modernizr}]
&&
[globalVar = LIT:1 > {$plugin.tx_njpage.settings.general.javascriptLibs.requireJs}]
	page.includeJSLibs.modernizr = {$_DEFAULT_JAVASCRIPT_DIR}/Lib/{$_DEFAULT_JSLIB_MODERNIZR}.js
[global]


page.includeJSFooter.n1page = {$_DEFAULT_JAVASCRIPT_DIR}/page.js
page.includeJSFooter.n1domain = {$LAYOUT_DIR}/Public/JavaScript/core.js

#include requrireJS
[globalVar = LIT:1 = {$plugin.tx_njpage.settings.general.javascriptLibs.requireJs}]
page.headerData.100 = TEXT 
page.headerData.100.value = <script src="{$_DEFAULT_JAVASCRIPT_DIR}/Lib/requireJs/2.2.0/require.min.js"></script>

page.headerData.101 = TEXT
page.headerData.101.value(
<script type="text/javascript">
	requirejs.config({
		baseUrl: '{$_DEFAULT_JAVASCRIPT_DIR}',
		paths: {
			
	
)

page.headerData.200 = TEXT
page.headerData.200.value(
			modernizr: 'Lib/{$_DEFAULT_JSLIB_MODERNIZR}'
		},
		"shim": {
			"flexslider":["jquery"],
			"masonry": ["jquery"],
			"shuffle": ["jquery"]
		}
	});
</script>
)
[global]


[globalVar = LIT:1 = {$plugin.tx_njpage.settings.general.javascriptLibs.requireJs}]
	page.headerData.105 = TEXT 
	page.headerData.105.value( 
		flexslider: 'Lib/{$_DEFAULT_JSLIB_FLEXSLIDER}',
		imagesloaded: 'Lib/{$_DEFAULT_JSLIB_IMAGESLOADED}',
		jquery: 'Lib/{$_DEFAULT_JSLIB_JQUERY}',
		masonry: 'Lib/{$_DEFAULT_JSLIB_MASONRY}',
	)
[global]