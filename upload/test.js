function add(){
    var i = 0;
    $("#addmore").click(function(){
        if(i > 3){
            alert('Больше 3-х изображений нельзя');
        }
        else{
            $('<br><input type="file" name="img[]" multiple="multiple">').insertAfter($("#cur"));
            i+= 1;
        }
    })
}



/*

$(function(){
 var schentchik_zadannogo_mesta = 0;
 $("#schentchik_zadannogo_mesta").click(function(){
  schentchik_zadannogo_mesta += 1;
  $("zadannoe_mesto").html(schentchik_zadannogo_mesta);
  return false;
 });
})



*/