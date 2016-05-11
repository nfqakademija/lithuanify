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

$("#event-on").click(function() {
    $("#EventForm").toggle();
});