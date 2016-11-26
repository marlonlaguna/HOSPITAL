//para el segundo div
$(document).ready(function(){


$("#divsegundo").click(function(){
    
  
  {
  
  $("#flecha").animate({top: $("#divsegundo").position().top + $("#divsegundo").height()/3})
 }

});


//para el primer div



$("#divprincipal").click(function(){
    
  
  {
  
  $("#flecha").animate({top: $("#divprincipal").position().top + $("#divprincipal").height()/3})
 }

});


//para el tercer div



$("#divtercero").click(function(){
    
  
  {
  
  $("#flecha").animate({top: $("#divtercero").position().top + $("#divtercero").height()/3})
 }

});

$("#divcuarto").click(function(){
    
  
  {
  
  $("#flecha").animate({top: $("#divcuarto").position().top + $("#divcuarto").height()/3})
 }
  $("#div_de_carga").empty();
 $("#div_de_carga").load("mantenimiento.php");
 
});





});



	 

 
	



/* $(document).ready(function(){
 	//definir variables
	var pocision_reportes = $("#imagenreportes").position().top;
	
 inicio();
function inicio(){
	
 $("#flecha").position().top = pocision_reportes;
alert(pocision_reportes);
	
}
 function clickreportes(){
	 alert("si funciona el elclick");
	
	
}

}); */