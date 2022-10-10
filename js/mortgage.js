
function calcualteMortgage(e) {


    // este metodo previene el comportamioento por defecto del formulario
    e.preventDefault();

    /*
    recuiperar el valor de los elementos de formulario
    debo indicar el api del DOM 
    */
    let couta = document.forms["fmortgage"]["fcouta"].value;
    let costoTotal = document.forms["fmortgage"]["fvalortotal"].value;
    let interes = document.forms["fmortgage"]["ftinteres"].value;
    let plazoAnio = document.forms["fmortgage"]["fplazo"].value;
    const MONTHS_ON_YEAR = 12;

    const mortgage = {
        totalPrestamo: 0,
        totalInteres: 0,
        cuotaMensual: 0
    };

    mortgage.totalPrestamo = costoTotal - couta;
    mortgage.totalInteres = mortgage.totalPrestamo * interes / 100;
    mortgage.cuotaMensual = (mortgage.totalPrestamo + mortgage.totalInteres) / (plazoAnio * MONTHS_ON_YEAR);


    ouputMortgage(mortgage);

}

function ouputMortgage(finalMortgage) {

    document.getElementById("omontoprestamo").innerHTML = ValueToDollar(finalMortgage.totalPrestamo);
    document.getElementById("ocuota").innerHTML = ValueToDollar(finalMortgage.cuotaMensual);
}

function resetform() {
    document.forms["fmortgage"].reset();
}
// Funcion para convertir el valor con un diseño de dolar 
function ValueToDollar(value) {
    const dollarformatter = Intl.NumberFormat('en-us', { style: 'currency', currency: 'USD', minimumFractionDigits: 2 });
    return dollarformatter.format(value);
}

