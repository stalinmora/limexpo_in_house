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