[globalString = GP:json=1]
config {
	disableAllHeaderCode = 1
	doctype = none
	xhtml_cleaning = 0
	admPanel = 0
	debug = 0
	no_cache = 1
	additionalHeaders = Content-type:application/json
}
[else]
config {
	baseURL = {$BASE_URL}
	doctype(
		<!DOCTYPE html>
        <!--[if lt IE 7 ]> <html lang="de-DE" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
        <!--[if IE 7 ]>    <html lang="de-DE" class="no-js lt-ie9 lt-ie8"> <![endif]-->
        <!--[if IE 8 ]>    <html lang="de-DE" class="no-js lt-ie9"> <![endif]-->
        <!--[if gt IE 8 ]><![endif]-->
    )
	metaCharset = {$CHARSET}
    renderCharset = {$CHARSET}
	xmlprologue = none
}
[global]

config {
	meaningfulTempFilePrefix = 80
	spamProtectEmailAddresses = ascii
    spamProtectEmailAddresses_atSubst = (at)

	## multidomain
	index_enable = 1
	content_from_pid_allowOutsideDomain=1
	MP_mapRootPoints = {$MULTIDOMAIN_ROOTPOINTS}
	typolinkCheckRootline = 1
	typolinkEnableLinksAcrossDomains = 1
}

## start LANGUAGE ###
config {
	sys_language_uid = 0
    language = de
    #locale_all = de_DE.UTF-8
	locale_all = de_DE@euro
    htmlTag_setParams = lang="de"
    sys_language_overlay = 1
    sys_language_mode = content_fallback;0
    uniqueLinkVars = 1
    linkVars = L(0-3), print
}
## end LANGUAGE ###


## start SEO-URLS ###
config {
	tx_cooluri_enable = {$COOLURI_ENABLE}
    tx_realurl_enable = {$REALURL_ENABLE}
    redirectOldLinksToNew = 1
	absRelPath = /
	absRefPrefix = {$BASE_URL}
    prefixLocalAnchors = all 
}
## end SEO-URLS ###


## start COMPRESSION & CONCATENATION FOR JS AND CSS ###
config {
	compressCss = {$CSS_COMPRESS}
	compressJs = {$JS_COMPRESS}
	concatenateCss = {$CSS_CONCENATE}
	concatenateJs = {$JS_CONCENATE}
	## removes HTML Comments in sourcecode
	disablePrefixComment = 1
}
[globalVar = LIT:1 = {$DEVELOPMENT_MODE}]
config {
	compressCss = 0
	compressJs = 0
	concatenateCss = 0
	concatenateJs = 0
	## removes HTML Comments in sourcecode
	disablePrefixComment = 0
}
[global]
## end COMPRESSION & CONCATENATION FOR JS AND CSS ###

## start DEBUG SETTINGS ###
config {
	contentObjectExceptionHandler = 0
}
config {
	admPanel = 0
	contentObjectExceptionHandler = 0
	debug = 0
	displayErrors = 0
	no_cache = 0
}
[globalVar = LIT:1 = {$DEVELOPMENT_MODE}]
config {
	admPanel = {$ADMINPANEL}
	contentObjectExceptionHandler = 0
	debug = {$DEBUG}
	displayErrors = {$DISPLAYERRORS}
	no_cache = {$NO_CACHE}
}
page.config.no_cache = {$NO_CACHE}
[global]
## end DEBUG SETTINGS ###


[globalString = GP:json=1]
config {
	disableAllHeaderCode = 1
	doctype = none
	xhtml_cleaning = 0
	admPanel = 0
	debug = 0
	no_cache = 1
	additionalHeaders = Content-type:application/json
}
[global]