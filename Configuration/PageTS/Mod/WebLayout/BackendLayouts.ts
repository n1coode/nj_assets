mod.web_layout.BackendLayouts {
	startpage {
		title = startpage
		config {
			backend_layout {
				colCount = 1
				rowCount = 3
				rows {
					1 {
						columns {
							1 {
								name = Header
								colPos = 1
							}
						}
					}
					2 {
						columns {
							1 {
								#LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:colPos.I.3
								name = Content-Bereich
								colPos = 0
							}
						}
					}
							3 {
						columns {
							1 {
								name = Footer-Bereich (Optional)
								colPos = 2
							}
						}
					}
				}
			}
		}
		icon = EXT:nj_page/Resources/Public/Icons/BackendLayouts/startpage.png
	}
}

mod.web_layout.BackendLayouts {
	angularjs {
		title = angularjs
		config {
			backend_layout {
				colCount = 1
				rowCount = 1
				rows {
					1 {
						columns {
							1 {
								#LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:colPos.I.3
								name = Content-Bereich
								colPos = 0
							}
						}
					}
				}
			}
		}
		icon = EXT:nj_page/Resources/Public/Icons/BackendLayouts/startpage.png
	}
}