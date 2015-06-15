$(document).ready(function() {
  var myArr = [];

  $.ajax({
    type: "GET",
    url: "xml/cities.xml", 
    dataType: "xml",
    success: parseXml,
    complete: setupAC,
    failure: function(data) {
      alert("XML File could not be found");
    }
  });

  function parseXml(xml)
  {
    //find every query value
    $(xml).find("city").each(function()
    {
      //you are going to create an array of objects 
      var thisItem = {}; 
      thisItem['city'] = $(this).attr("city"); 
        
      myArr.push(thisItem); 
    }); 
  }
});