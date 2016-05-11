lib.copyright = TEXT
lib.copyright {
  data = date : U
  strftime = %Y
}

lib.copyright.noTrimWrap = |Copyright <i class="fa fa-copyright"></i> {$COPYRIGHT_START} - | <nowrap><strong>{$AUTHOR}</strong></nowrap>. <br/><i>Alle Rechte vorbehalten</i>.|
[globalVar = GP:L = 1]
lib.copyright.noTrimWrap = |Copyright <i class="fa fa-copyright"></i> {$COPYRIGHT_START} - | <nowrap><strong>{$AUTHOR}</strong></nowrap>. <br/><i>All rights reserved</i>.|
[global]


lib.layoutswitch = CASE
lib.layoutswitch {
  stdWrap.wrap = |
  key.data = levelfield:-2, backend_layout_next_level, slide
  key.override.field = backend_layout
  default = TEXT
  default.value = standard
	pagets__startpage = TEXT
	pagets__startpage.value = startpage
	pagets__angularjs = TEXT
	pagets__angularjs.value = angularjs
	2 = TEXT
	2.value = standard
	3 = TEXT
	3.value = portal
	4 = TEXT
	4.value = login
}


//
// CONTENT
//

lib.contentMain = CONTENT
lib.contentMain {
	table = tt_content
	select {
	   orderBy = sorting
	   where = colPos=0
	   languageField = sys_language_uid
	}
}

lib.contentHeader = CONTENT
lib.contentHeader < lib.contentMain
lib.contentHeader.select.where = colPos=1

lib.contentFooter = CONTENT
lib.contentFooter < lib.contentMain
lib.contentFooter.select.where = colPos=2

lib.contentLeft = CONTENT
lib.contentLeft < lib.contentMain
lib.contentLeft.select.where = colPos=3


lib.contentRight = CONTENT
lib.contentRight < lib.contentMain
lib.contentRight.select.where = colPos=4