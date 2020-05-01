$(document).ready(function(){
  $.ajax ({
    url:"http://localhost/charts/data.php",
    method: "GET",
    success: function (data) {
      console.log(data);
    },
    error: function (data) {
      console.log(data);
    }
    
  });
  
});