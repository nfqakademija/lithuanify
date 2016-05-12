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

$('#date_pick_beginDate').datepicker({
    format: "mm/dd/yyyy",
    todayBtn: "linked",
    language: "lt",
    autoclose: true,
    todayHighlight: true,
    startDate: "01/01/1990",
    endDate: "today"
});
$('#date_pick_endDate').datepicker({
    format: "mm/dd/yyyy",
    todayBtn: "linked",
    language: "lt",
    autoclose: true,
    todayHighlight: true,
    startDate: "01/01/1990",
    endDate: "today"
});