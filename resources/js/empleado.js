document.addEventListener('DOMContentLoaded', function () {
    let today = new Date();
    let MinMiliseconds = 1000 * 60 * 60 * 24 * 7;
    let restMin = today.getTime() - MinMiliseconds; //getTime devuelve milisegundos de esa fecha
    let fechaMin = new Date(restMin);

    let restMax = today.getTime(); //getTime devuelve milisegundos de esa fecha
    let fechaMax = new Date(restMax);

    options = {
        format: 'yyyy-mm-dd',
        minDate: fechaMin,
        maxDate: fechaMax,
        defaultDate: fechaMax,
        changeMonth: true,
        changeYear: true,
        yearRange: 0,
        autoClose: true,
        i18n: {
            cancel: "Cancelar",

            months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto",
                "Septiembre", "Octubre", "Noviembre", "Diciembre"
            ],
            monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct",
                "Nov", "Dic"
            ],
            weekdays: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
            weekdaysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
            weekdaysAbbrev: ["D", "L", "M", "M", "J", "V", "S"]
        }
    };
    var elems = document.querySelectorAll('.datepicker');
    M.Datepicker.init(elems, options);
});


window.onload = () => {
    let foto = document.getElementById("foto");
    let fotoPreview = document.getElementById("foto-preview");

    async function loadPhoto(event) {
        if (event.target.files.length == 0) {
            fotoPreview.innerHTML = "";
        } else {
            img = URL.createObjectURL(event.target.files[0]);
            fotoPreview.innerHTML = `<img id="foto-preview" class="materialboxed img-thumbnail responsive-img-100 ml-3" 
            src="${img}">`;
        }
    }
    foto.addEventListener("change", loadPhoto, false);

    let hv = document.getElementById("hv");
    let hvPreview = document.getElementById("hv-preview");
    async function loadHV(event) {
        if (event.target.files.length == 0) {
            hvPreview.innerHTML = "";
        } else {
            pdf = URL.createObjectURL(event.target.files[0]);
            hvPreview.innerHTML = `<iframe id="hv-preview" class="materialboxed img-thumbnail responsive-img-100 ml-8" type="pdf"  src="${pdf}">`;
        }
    }
    hv.addEventListener("change", loadHV, false);
};
