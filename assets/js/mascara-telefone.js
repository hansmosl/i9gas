/*https://stackoverflow.com/questions/46667163/mascara-input-javascript-number-with-country#46668016*/
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,"");                  // Removes all non-digit
    v=v.replace(/^(\d{2})(\d{5})(\d)/g,"($1) $2-$3");
    return v;
}
function id( el ){
	return document.getElementById( el );
}
window.onload = function(){
	id('telefone').onkeyup = function(){
		mascara( this, mtel );
	}
}