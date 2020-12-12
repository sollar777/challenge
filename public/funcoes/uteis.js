function formatReal(valor) {
    valor = valor.toString().replace(/\D/g,"");
    valor = valor.toString().replace(/(\d)(\d{8})$/,"$1.$2");
    valor = valor.toString().replace(/(\d)(\d{5})$/,"$1.$2");
    valor = valor.toString().replace(/(\d)(\d{2})$/,"$1,$2");
    return valor 
}

//retornará 1234.53
function formatNumberCalc(value) {
    value = convertToFloatNumber(value);
    return value.formatMoney(2, '.', '');
}
//retornará 1.234,53
function formatNumberString(value) {
    value = convertToFloatNumber(value);
    return value.formatMoney(2, ',', '.');
}
//retornará 1,234.53
function formatNumber(value) {
    value = convertToFloatNumber(value);
    return value.formatMoney(2, '.', ',');
}

 //transforma a entrada em número float
 var convertToFloatNumber = function(value) {
     value = value.toString();
      if (value.indexOf('.') !== -1 && value.indexOf(',') !== -1) {
          if (value.indexOf('.') <  value.indexOf(',')) {
             //inglês
             return parseFloat(value.replace(/,/gi,''));
          } else {
            //português
             return parseFloat(value.replace(/\./gi,'').replace(/,/gi,'.'));
          }      
      } else {
         return parseFloat(value);
      }
   }

//prototype para formatar a saída  
Number.prototype.formatMoney = function (c, d, t) {
    var n = this,
        c = isNaN(c = Math.abs(c)) ? 2 : c,
        d = d == undefined ? "." : d,
        t = t == undefined ? "," : t,
        s = n < 0 ? "-" : "",
        i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
        j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + 
        i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
};