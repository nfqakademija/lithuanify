/**
 * Created by Rokas on 23/04/16.
 */

$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    $("#menu-on").hide();
});

$("#menu-on-off").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    $("#menu-on").delay(400).fadeIn(300);
});

$("#menu-on").click(function() {
    $("#wrapper").toggleClass("toggled");
    $("#menu-on").hide();
});

/*$(".read-toggle").click(function() {
    $('#page-content-wrapper').slideUp(300);
    $('#read-article').delay(300).slideDown(300);
});

$("#read-toggle2").click(function() {
    $('#read-article').slideUp(300);
    $('#page-content-wrapper').delay(300).slideDown(300);
});*/

$("#event-on").click(function() {
    $("#EventForm").toggle();
});