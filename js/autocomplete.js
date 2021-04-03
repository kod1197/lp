$(function() {
 
    $("#topic_title").autocomplete({
        source: "./searching.php",
        minLength: 2,
        html: true,
        open: function(event, ui) {
            $(".ui-autocomplete").css("z-index", 1000);
        }
    });
 
});