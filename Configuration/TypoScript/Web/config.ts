config {
    ## start general settings
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

	spamProtectEmailAddresses = ascii
    spamProtectEmailAddresses_atSubst = (at)


	## useful imagenames for seo
	meaningfulTempFilePrefix = 80

	## multidomain
	MP_mapRootPoints = {$MULTIDOMAIN_ROOTPOINTS}
	content_from_pid_allowOutsideDomain=1
	typolinkCheckRootline = 1
	typolinkEnableLinksAcrossDomains = 1
	index_enable = 1

	## start real url #####
    simulateStaticDocuments = 0
    simulateStaticDocuments_noTypeIfNoTitle = 0
    tx_cooluri_enable = 0
    tx_realurl_enable = 0
    redirectOldLinksToNew = 1
	absRefPrefix = {$BASE_URL}
    prefixLocalAnchors = all 
    ## end real url #####

	## start language #####
    sys_language_uid = 0
    language = de
    #locale_all = de_DE.UTF-8
	locale_all = de_DE@euro
    htmlTag_langKey = de
    sys_language_overlay = 1
    sys_language_mode = content_fallback;0
    uniqueLinkVars = 1
    linkVars = L(0-3), print
    ## end language #####
}


## compression and concatenation for JS and CSS
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
	concatenateCss = 0}
	concatenateJs = 0
	## removes HTML Comments in sourcecode
	disablePrefixComment = 0
}
[global]


## debug settings
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
[global]

