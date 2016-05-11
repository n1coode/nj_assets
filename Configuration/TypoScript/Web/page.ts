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
	templateRootPaths {
		10 = {$_DEFAULT_TEMPLATES_DIR}
		20 = {$PAGE_TEMPLATES_DIR}
	}
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

## include css
page.includeCSS {
		#bootstrap = {$_ALL_CSS_FILE_BOOTSTRAP}
		#bootstrap.forceOnTop = 1
	reset = {$_DEFAULT_CSS_DIR}/{$_DEFAULT_CSSLIB_RESET}
	reset.forceOnTop = 1
		#fonts = {$_ALL_CSS_FILE_FONTS}
	master = {$_DEFAULT_CSS_DIR}/{$_DEFAULT_CSSFILE_MASTER}
		#grid = {$CSS_GRID}
	core = {$CSS_CORE}
		#font-awesome = {$_ALL_CSS_LIB_FONT_AWESOME}
		#animate = {$_ALL_CSS_LIB_ANIMATE}
}

page.bodyTagCObject = COA
page.bodyTagCObject.10 < lib.layoutswitch
[page|tx_njpage_class_enable = 1]
page.bodyTagCObject.20 = TEXT
page.bodyTagCObject.20.data = FIELD:tx_njpage_class
page.bodyTagCObject.20.noTrimWrap = | ||
[GLOBAL]
page.bodyTagCObject.stdWrap.wrap = <body class="|">


[globalVar = LIT:1 = {$plugin.tx_njpage.settings.general.angularJS.enable}] && [globalVar = LIT:1 = {$tx_njpage.js.angularJS}] 
page.bodyTagAdd := appendString( ng-controller="NavCtrl")
[global]
