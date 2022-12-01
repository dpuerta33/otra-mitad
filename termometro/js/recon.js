$(document).ready(function(){
	$("#int-rojo").click(function() {
		if ($(".hombre").hasClass('oscuro')){
			$(".hombre").removeClass("oscuro");
			$("#int-rojo").removeClass("oscuro");
		}else{
			$(".hombre").addClass("oscuro");
			$("#int-rojo").addClass("oscuro");
		}
	});
	$("#int-amarillo").click(function() {
		if ($(".mujer").hasClass('oscuro')){
			$(".mujer").removeClass("oscuro");
			$("#int-amarillo").removeClass("oscuro");
		}else{
			$(".mujer").addClass("oscuro");
			$("#int-amarillo").addClass("oscuro");
		}
	});
});