// Funcion entrar en foco pasamos la clase enfoco
function entroEnFoco(elemento){
	elemento.className='enfoco';
    }
// Para salir del foco no pasamos la clase
function salgoDeFoco(elemento){
	elemento.className='';
	}
// para que no pueda quedarse vacio
function revisarObligatorio(elemento){
   
	if(elemento.value==""){
	   
		elemento.className='error';
        elemento.title="Ingrese Campo Obligatorio";
        elemento.focus();
	  }else{
		elemento.className='';
        elemento.title="";
	     }	
    }
// obligar a indicar numeros	
function revisarNumerico(elemento){
    if(elemento.value!=""){
      var dato = elemento.value;
        if(isNaN(dato)){
          elemento.className='error';
          }else{
        elemento.className='';
           }
    }
}
// indicar un minimo de caracteres
function revisarLongitud(elemento, minimoDeseado){
    if(elemento.value!=""){
      var dato = elemento.value;
        if(dato.length<minimoDeseado){
          elemento.className='error';
          }else{
        elemento.className='';
           }
    }
}

// indicar un maximo de caracteres
function revisarLongitud2(elemento, maximoDeseado){
     if(elemento.value!=""){
      var dato = elemento.value;
        if(dato.length>maximoDeseado){
          elemento.className='error';
          alert("Se sobrepasa el maximo de caraxteres :"+maximoDeseado );
          elemento.focus();
          }else{
        elemento.className='';
           }
    }
}

// indicar un formato de correo correcto
function revisarCorreo(elemento){
	if(elemento.value!=""){
      var dato = elemento.value;
	  var expresion = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
        if(!expresion.test(dato)){
          elemento.className='error';
          }else{
        elemento.className='';
           }
    }
}

// V2.0

//	validation functions

	

//trimming
	function trimAll(sString) 
	{
		while (sString.substring(0,1) == ' ')
		{
			sString = sString.substring(1, sString.length);
		}
		
		while (sString.substring(sString.length-1, sString.length) == ' ')
		{
			sString = sString.substring(0,sString.length-1);
		}
		
	return sString;
	}


//	charAsNumber
	function _isInteger(val) 
	{
		var digits="1234567890";
		for (var i=0; i < val.length; i++) 
			{
				if (digits.indexOf(val.charAt(i))==-1) 
				{ 
					return false; 
				}
			}
	return true;
	}
	
function validaIdentificacion(tipoDocumento, identificacion) {

	/* Tipos de Documentos:
	
		R --> RUC
		C --> Cedula
		P --> Pasaporte
	*/
	
	if (tipoDocumento == 'R' || tipoDocumento == 'C') {

		var lv_cedula;
		var lv_vec3;
		var lv_numidentificacion;
		var ll_rc;
		var ll_fin;

		ll_rc = false;
		;
		lv_numidentificacion = identificacion;
		// Control de los 3 últimos dígitos
		ll_fin = identificacion.substring(10);

		if (ll_fin != '001' && tipoDocumento == 'R')
		{
			alert("RUC invalido");
			return false;
		}


		lv_cedula = identificacion.substring(0, 10);
		if (isNaN(Number(lv_cedula))
			|| (lv_numidentificacion.length != 13 && tipoDocumento == 'R'))
			{
    			alert("RUC debe contener 13 digitos")
    			return false;
			}
		if (isNaN(Number(lv_cedula))
			|| (lv_numidentificacion.length != 10 && tipoDocumento == 'C'))
				{
    			alert("Cedula debe contener 10 digitos")
    			return false;
			}

		lv_vec3 = Number(lv_numidentificacion.substring(2, 3));

		if ((lv_vec3 >= 0 && lv_vec3 <= 5) || tipoDocumento == 'C')
			ll_rc = validaCedula(lv_cedula);
		else if (lv_vec3 == 6)
			ll_rc = validaTercero6(lv_cedula);
		else if (lv_vec3 == 9)
			ll_rc = validaTercero9(lv_cedula);
		
		if (ll_rc != 1)
		{
			alert("Identificacion mal conformada");
		}
		
		return ll_rc;

	}
    else           
     {
		return true;
	  }
}

function validaCedula(cedula) {
	// Control de provincia entre 1 y 22
	lv_prov = Number(cedula.substring(0, 2));

	if (lv_prov >= 1 && lv_prov <= 24) {
		lv_numced = cedula;
		ll_TenDig = Number(cedula.substring(9));
		ll_sum = 0;

		ll_Cnt = 0;
		ll_CntPos = 0;
		while (ll_CntPos < 9) {
			ll_CntPos = 2 * ll_Cnt + 1;
			lv_StrNum = lv_numced.substring(ll_CntPos - 1, ll_CntPos);
			ll_multi = Number(lv_StrNum) * 2;
			if (ll_multi >= 10)
				ll_multi = 1 + (ll_multi % 10);
			ll_sum += ll_multi;
			ll_Cnt += 1;
		}

		ll_Cnt = 1;
		ll_CntPos = 1;
		while (ll_CntPos < 8) {
			ll_CntPos = 2 * ll_Cnt;
			lv_StrNum = lv_numced.substring(ll_CntPos - 1, ll_CntPos);
			ll_sum += Number(lv_StrNum);
			ll_Cnt += 1;
		}

		ll_cociente = Math.floor(ll_sum / 10);
		ll_decena = (ll_cociente + 1) * 10;
		ll_verificador = ll_decena - ll_sum;

		if (ll_verificador == 10)
			ll_verificador = 0;
		if (ll_verificador == ll_TenDig)
			return true;
		else
	
			return false;
	} else {

		return false;
	}

}

 function ValidaIdentificacion2(elemento,caracter) {
			 
  

				var RUC = trimAll(elemento.value);


                if(RUC==""){	   
            		elemento.className='error';
                    elemento.title="Ingrese Campo Obligatorio";
                    elemento.focus();
                    return;
            	  }else{
            		elemento.className='';
                    elemento.title="";
            	     }	
				 //valida el pais q sea ecuador
				var cmb_pais = document.getElementById('cmbPaises');
				var text = cmb_pais.options[cmb_pais.selectedIndex].text;

				if (text != "ECUADOR+593")
                {
                    revisarLongitud2(elemento, caracter);
                    return;
                    
                }
					

			//	 valida el tipo de identificacion
				var cmb_idIdent = document.getElementById('cmbID');
				var tipoDocumento = cmb_idIdent.options[cmb_idIdent.selectedIndex].text.substring(0, 2);

				if (tipoDocumento != "RU" && tipoDocumento != "CE")
		        {
                    revisarLongitud2(elemento, caracter);
                    
                }

				var tipoDocumento = tipoDocumento.substring(0, 1);

				var digits = _isInteger(RUC)

				if (digits == 0) {
					alert("Identificacion debe ser un numero");
					elemento.focus();
                    return;
				}

				var valueofId = validaIdentificacion(tipoDocumento, RUC);

				if (valueofId == 1) {
					return true;
				} else {
					elemento.focus();
				}
			}
