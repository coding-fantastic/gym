$('input#name-submit').on('click',function(){  /* ~event handler~   do something if button is pressed */
    //alert(1); 
    var name = $('input#name').val();  //value of name-submit put it into variable name
    //alert(name);
    if ($.trim(name)!=''){
      //alert(1);
      $.post('ajax/name.php',{name: name},function(data){
	    $('div#name-data').text(data);
      });
    }
});