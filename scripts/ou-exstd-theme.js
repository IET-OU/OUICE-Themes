// JavaScript Document
jQuery(function () {
    activeContext();
    persistNav();
});
// Used to replace a link with strong - so context menu item is highlighted.
function activeContext() {
    jQuery("div.ou-context-nav a.active").each(function () {
        text = $(this).text();
        $(this).replaceWith("<strong>" + $(this).text() + "</strong>");
    });
	
	jQuery("div.ou-full-nav a.active").each(function () {
        text = $(this).text();
        $(this).replaceWith("<strong>" + $(this).text() + "</strong>");
    });
}
function persistNav(){
    jQuery("ul.sections li.selected a").addClass('selected');
    jQuery("ul.sections li.selected a").addClass('active');
}