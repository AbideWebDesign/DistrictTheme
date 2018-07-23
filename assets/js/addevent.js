$(document).ready(function(){
    $("body").bind("ajaxComplete", function(e, xhr, settings){
           addeventatc.refresh();
    });
});