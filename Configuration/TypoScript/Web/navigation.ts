#####################################
# NAVIGATION : REFERENZ
#####################################
lib.navigationAbstract = HMENU
lib.navigationAbstract {
	
    special = directory
    special.value = 1
    
    1 = TMENU
    1 {
        expAll = 1
        wrap = <ul class="n1navigation clearfix">|</ul>
        NO = 1
        NO {
            wrapItemAndSub = <li class="no">|</li>

            stdWrap.cObject = COA
            stdWrap.cObject {
                20 = TEXT
                20.wrap = |
                20.field =  nav_title // title
            }
        }
		
	IFSUB < .NO
		
        ACT < .NO
        ACT {
            wrapItemAndSub = <li class="act">|</li>
        }

        ACTIFSUB < .ACT
    }
	
    2 < .1
    2 {
        wrap = <ul class="sub">|</ul>
    }
    3 < .2
    3 {
        wrap = <ul class="bottom">|</ul>
    }
    4 < .3
    4 {
        wrap = <ul class="down">|</ul>
    }
	
} ## end of lib.navigationAbstract


#####################################
# NAVIGATION : TOPLINE
#####################################
lib.navigationMain < lib.navigationAbstract
lib.navigationMain {
    special = list
    special.value = {$NAVIGATION_PIDS_MAIN}

    1 {
        wrap = <ul class="clearfix">|</ul>
        NO {
            wrapItemAndSub = <li class="no">|</li>
            ATagBeforeWrap = 1
            linkWrap = <i class="fa fa-book"></i>| ||<i class="fa fa-user"></i>| ||<i class="fa fa-paint-brush"></i>| ||<i class="fa fa-phone"></i>
        }
        IFSUB < .NO
        
        ACT = 1
        ACT {
            allWrap = |
            wrapItemAndSub = <li class="act"><i class="fa fa-book"></i>|</li>||<li class="act"><i class="fa fa-user"></i>|</li>||<li class="act"><i class="fa fa-paint-brush"></i>|</li>||<li class="act"><i class="fa fa-phone"></i>|</li>
            doNotLinkIt = 1
        }
        ACTIFSUB < .ACT
    }
    2 >
    3 >
    4 >
}

lib.navigationTopbar < lib.navigationAbstract
lib.navigationTopbar {
    special = list
    special.value = {$NAVIGATION_PIDS_TOPBAR}

    1 {
        wrap = <ul class="clearfix">|</ul>
        NO {
            wrapItemAndSub = <li class="no">|</li>
		}
        IFSUB < .NO
        
        ACT = 1
        ACT {
            
            wrapItemAndSub = <li class="act">|</li>
            doNotLinkIt = 1
        }
        ACTIFSUB < .ACT
    }
    2 >
    3 >
    4 >
}

#uids that should not be included in the menu
lib.excludeUidsMenubar = {$NAVIGATION_PIDS_TOPBAR}
#add actual site
lib.excludeUidsMenubar := addToList(current)
#add impressum, sitemap
lib.excludeUidsMenubar := addToList(21,25)

lib.navigationMenubar < lib.navigationAbstract
lib.navigationMenubar {
	excludeUidList < lib.excludeUidsMenubar
    special = directory
	special.value = 1
    1 {
        wrap = <ul class="clearfix">|</ul>
        NO {
            wrapItemAndSub = <li class="no">|</li>
		}
        IFSUB < .NO
        
        ACT = 0
    }
    2 >
    3 >
    4 >
}

lib.navigationLegal < lib.navigationAbstract
lib.navigationLegal {
	special = list
    special.value = {$NAVIGATION_LEGAL_PIDS}
	1 {
        wrap = <ul class="clearfix">|</ul>
        NO {
            wrapItemAndSub = <li class="no">|</li>
		}
        IFSUB < .NO
        
        ACT = 0
    }
    2 >
    3 >
    4 >
}