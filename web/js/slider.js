/**
 * Created by Rokas on 23/04/16.
 */
$("#slider").dateRangeSlider({
    bounds:{
        min: new Date(1990, 0, 1),
        max: new Date(new Date().toJSON().slice(0,10)) //max value: today
    },
    defaultValues: {
        min: new Date(2000, 2, 19),
        max: new Date(new Date().toJSON().slice(0,10))
    },
    symmetricPositionning: true,
    range: {min: 0}
});
$("#slider").bind("valuesChanging", function(e, data){
    document.getElementById('date1').value = data.values.min;
    document.getElementById('date2').value = data.values.max;
});
