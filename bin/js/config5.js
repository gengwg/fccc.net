function createjsDOMenu() {
absoluteMenu1 = new jsDOMenu(150, "absolute", "", true);
  with (absoluteMenu1) {
    addMenuItem(new menuItem("Media Homepage", "mh", "/media/"));
    addMenuItem(new menuItem("-"));
    addMenuItem(new menuItem("2-Word Hymns", "tw", "?view=02"));
    addMenuItem(new menuItem("3-Word Hymns", "th", "?view=03"));
    addMenuItem(new menuItem("4-Word Hymns", "fo", "?view=04"));
    addMenuItem(new menuItem("5-Word Hymns", "fi", "?view=05"));
    addMenuItem(new menuItem("6-Word Hymns", "si", "?view=06"));
    addMenuItem(new menuItem("7-Word Hymns", "se", "?view=07"));
    addMenuItem(new menuItem("8-Word Hymns", "ei", "?view=08"));
    addMenuItem(new menuItem("9-Word Hymns", "ni", "?view=09"));
    addMenuItem(new menuItem("10-Word Hymns", "te", "?view=10"));
    addMenuItem(new menuItem("-"));
    addMenuItem(new menuItem("Worship", "ws", "?view=worship"));
	addMenuItem(new menuItem("Choir", "co", "?view=choir"));
		moveTo(10, 100);
    show();
  }
/*
	//Add icons
	absoluteMenu1.items.mh.showIcon("base", "base");
	absoluteMenu1.items.tw.showIcon("blank", "media");
	absoluteMenu1.items.th.showIcon("blank", "media");
	absoluteMenu1.items.fo.showIcon("blank", "media");
	absoluteMenu1.items.fi.showIcon("blank", "media");
	absoluteMenu1.items.si.showIcon("blank", "media");
	absoluteMenu1.items.se.showIcon("blank", "media");
	absoluteMenu1.items.ei.showIcon("blank", "media");
	absoluteMenu1.items.ni.showIcon("blank", "media");
	absoluteMenu1.items.te.showIcon("blank", "media");
	absoluteMenu1.items.ws.showIcon("blank", "media");
	absoluteMenu1.items.co.showIcon("blank", "media");
*/
}