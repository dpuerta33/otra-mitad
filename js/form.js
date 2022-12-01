$(document).ready(function(){
  /* Oculta el párrafo inicial al hacer click en siguiente*/
	$('#start').click(function(){
		$('#parrafo-inicial').hide(500, function(){
			$('#step1').show(700);
		});
	});
  /* Oculta y muestra los sucesivos pasos del funcionario */
  /* NEXT */
	$('#next1').click(function(){
		if(validacion('#step1')){
			$('#step1').hide(500, function(){
				$('#step2').show(700);
			});
		}
	});
	$('#next2').click(function(){
		if(validacion('#step2')){
			$('#step2').hide(500, function(){
				$('#step3').show(700);
			});
		}
	});
  $('#next3').click(function(){
    if(validacion('#step3')){
      $('#step3').hide(500, function(){
        $('#step4').show(700);
      });
    }
  });
  $('#next4').click(function(){
		var especialidades = comprobarEsp();
		var especialidad;
		if(validacion('#step4')){
			$('#step4').hide(500, function(){
				$('#step5').show(700);
				for(i = 0; i<=especialidades.length; i++){
					especialidad = especialidades[i];
					if(especialidad == "Disenio grafico") { //Diseño gráfico
						$('input:checkbox[subespecialidad=grafico]').each(
				    function() {
				    	$(this).removeAttr("disabled");
				    });
					} else if(especialidad == 'Disenio de interiores') { //Diseño interiores
						$('input:checkbox[subespecialidad=interiores]').each(
				    function() {
				    	$(this).removeAttr("disabled");
				    });
					} else if(especialidad == 'Disenio de producto') { //Diseño producto
						$('input:checkbox[subespecialidad=producto]').each(
				    function() {
				    	$(this).removeAttr("disabled");
				    });
					} else if(especialidad == 'Disenio de moda') { //Diseño moda
						$('input:checkbox[subespecialidad=moda]').each(
				    function() {
				    	$(this).removeAttr("disabled");
				    });
					}
				}
			});
		}
	});
  $('#next5').click(function(){
		if(validacion('#step5')){
			$('#step5').hide(500, function(){
				$('#step6').show(700);
			});
		}
	});
  $('#next6').click(function(){
		if(validacion('#step6')){
			$('#step6').hide(500, function(){
				$('#step7').show(700);
			});
		}
	});
  $('#next7').click(function(){
		if(validacion('#step7')){
			$('#step7').hide(500, function(){
				$('#step8').show(700);
			});
		}
	});
  /* BACK ==========================*/
	$('#back1').click(function(){
		$('#step2').hide(500, function(){
			$('#step1').show(700);
		});
	});
	$('#back2').click(function(){
		$('#step3').hide(500, function(){
			$('#step2').show(700);
		});
	});
  $('#back3').click(function(){
		$('#step4').hide(500, function(){
			$('#step3').show(700);
		});
	});

  $('#back4').click(function(){
		$('#step5').hide(500, function(){
			$('#step4').show(700);
			$('input:checkbox[subespecialidad=grafico]').each(
			function() {
				$(this).attr("disabled","disabled");
        $(this).prop('checked', false);
			});
			$('input:checkbox[subespecialidad=interiores]').each(
			function() {
				$(this).attr("disabled","disabled");
        $(this).prop('checked', false);
			});
			$('input:checkbox[subespecialidad=producto]').each(
			function() {
				$(this).attr("disabled","disabled");
        $(this).prop('checked', false);
			});
			$('input:checkbox[subespecialidad=moda]').each(
			function() {
				$(this).attr("disabled","disabled");
        $(this).prop('checked', false);
			});
		});
	});
  $('#back5').click(function(){
		$('#step6').hide(500, function(){
			$('#step5').show(700);
		});
	});

  $('#back6').click(function(){
		$('#step7').hide(500, function(){
			$('#step6').show(700);
		});
	});
  $('#back7').click(function(){
		$('#step8').hide(500, function(){
			$('#step7').show(700);
		});
	});
	/* Comprueba si está marcada la opción 'sí' para habilitar el campo pagina web */
	$('#websi').click(function(){
		$('#web').removeAttr("disabled");
	});
	$('#webno').click(function(){
		$('#web').attr("disabled","disabled");
	});
  /* Comprobar especialidad */
  function comprobarEsp(){
    var values = [];
    var value;
    $('input:checkbox[class=control]:checked').each(
    function() {
      values.push($(this).val());
    });
    return(values);
  }
	function comprobarSubesp(){
		var especialidades = comprobarEsp();
    var values = [];
    var value;
		var aux;
		for(i = 0; i <= especialidades.length; i++){
			aux = especialidades[i];
			if(aux == "Disenio grafico"){
				$('input:checkbox[subespecialidad=grafico]:checked').each(
	 	     function() {
	 	       values.push($(this).val());
	 	     });
			} else if(aux == "Disenio de interiores"){
				$('input:checkbox[subespecialidad=interiores]:checked').each(
	 	     function() {
	 	       values.push($(this).val());
	 	     });
			} else if(aux == "Disenio de producto"){
				$('input:checkbox[subespecialidad=producto]:checked').each(
	 	     function() {
	 	       values.push($(this).val());
	 	     });
		 	} else {
			 $('input:checkbox[subespecialidad=moda]:checked').each(
				function() {
					values.push($(this).val());
				});
			}
		}
    return(values);
  }
	/****************************************/
  /* Validaciones */
  /****************************************/
	function validacion(step){
		if(step == "#step1"){
			var nombre = $('#nombre');
			var anioNacimiento = $('#anioNacimiento');
			var anioFallecimiento = $('#anioFallecimiento'); //No required
			var paisNacimiento = $('#paisNacimiento');
			var paisResidencia = $('#paisResidencia');
			if(emptyFields(step) && caracteres(step)){
				return true;
			} else {
				return false;
			}
		} else if(step == "#step2"){
			var biografia = $('#biografia');
			var foto = $('#foto');
			if(emptyFields(step) && caracteres(step)){
				return true;
			} else {
				return false;
			}
		} else if(step == "#step3"){
			var formacion = $('#formacion');
			var publicaciones = $('#publicaciones'); //No required
			var premios = $('#premios'); //No required
			if(emptyFields(step) && caracteres(step)){
				return true;
			} else {
				return false;
			}
		} else if(step == "#step4"){
			var especialidades = comprobarEsp();
			if(especialidades.length != 0){
				removeErrorPanel();
				return true;
			} else {
				var mess = "<li id='errEmpF'>Debes marcar al menos una opción.</li>";
				addItemError(mess);
				return false;
			}
		} else if(step == "#step5"){
			var subespecialidades = comprobarSubesp();
			if(subespecialidades.length != 0){
				removeErrorPanel();
				return true;
			} else {
				var mess = "<li id='errEmpF'>Debes marcar al menos una opción.</li>";
				addItemError(mess);
				return false;
			}
		} else if(step == "#step6"){
			var descripcion = $('#descripcion'); //No required. Debería existir este campo??????
			var web = $('#web'); //Comprobar si está marcada la opción si del input radio anterior para validar.
			if(emptyFields(step)){
				return true;
			} else {
				return false;
			}
		} else if(step == "#step7"){
			var email = $('#email');
			if(emptyFields(step)){
        if(validateEmail(email)){
          return true;
        } else {
          return false;
        }
			} else {
				return false;
			}
		}
	}
	//=============================================//
	function addClassError(input){
		$('#'+input).addClass("error");
	}
	function removeClassError(input){
		$('#'+input).removeClass("error");
	}
	function createErrorPanel(){
		$('#errorPanel').addClass("errorPanel");
		if($('#w').length == 0){
			var par = "<p id='w'><ul id='errorsList'></ul></p>";
			$('#errorPanel').append(par);
		}
	}
	function removeErrorPanel(){
		$('#errorPanel').removeClass("errorPanel");
		$('#errorPanel').empty();
	}
	function addItemError(mess){
		if(!$('#errorPanel').hasClass('errorPanel')){
			createErrorPanel();
		}
		$('#errorsList').append(mess);
	}
	function removeItemError(id){
		$('#' + id).remove();
	}
	//=============================================//
	function validateEmail(elem){
		var mess = "<li id='errEmail'>El Correo electrónico es incorrecto.</li>";
		/*var expreg = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i; ===*/
		var expreg = /^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/i;
		if( !(expreg.test(elem.val())) ) {
			if($('#errEmail').length == 0){
				addItemError(mess);
			}
			addClassError(elem.attr('id'));
			return false;
		} else {
			removeItemError('errEmail');
			removeClassError(elem.attr('id'));
			return true;
		}
	}
	function emptyFields(section){
		var mess = "<li id='errEmpF'>Debes rellenar los campos marcados con (*)</li>";
		var inputs = $(section + ' .campo');
		var input;
		var errors = 0;
		for(var i=0; i<inputs.length; i++){
			input = inputs[i].id;
			if($('#'+input).attr('required') == 'required'){
				if(inputs[i].value.trim() == 0){
					addClassError(input);
					errors++;
				} else {
					removeClassError(input);
				}
			}
		}
		if(errors > 0){
			if($('#errEmpF').length == 0){
				addItemError(mess);
			}
			return false;
		} else {
			removeItemError('errEmpF');
			removeErrorPanel();
			return true;
		}
	}
	function caracteres(section){
		/*var expreg = /^\w+$/;*/
		/*var expreg = /^[\w\d\sñÑ.,¡!¿?-]*$/;*/
		var expreg = /^[\wÁ-ÿ\d\s/ñÑ&:.,¡!¿?-]*$/;
		var mess = "<li id='errEmpF'>Sólo se admiten caracteres alfanuméricos</li>";
		var inputs = $(section + ' .campo');
		var input;
		var errors = 0;
		for(var i=0; i<inputs.length; i++){
			input = inputs[i].id;
			value = $('#'+input).val();
			if(input != 'anioNacimiento' && input != 'anioFallecimiento' && input != 'foto'){
				if(expreg.test(value)){
					removeClassError(input);
				} else {
					addClassError(input);
					errors++;
				}
			}
		}
		if(errors > 0){
			if($('#errEmpF').length == 0){
				addItemError(mess);
			}
			return false;
		} else {
			removeItemError('errEmpF');
			removeErrorPanel();
			return true;
		}
	}
});
