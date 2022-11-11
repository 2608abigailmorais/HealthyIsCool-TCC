const data = document.getElementById('data');

if (data) {
    var today = new Date();

    var dd = today.getDate();
    var mm = today.getMonth() + 1; //Janeiro é 0 e Dezembro é 11
    var yyyy = today.getFullYear();

    if (dd < 10) {
        dd = '0' + dd;
    }

    if (mm < 10) {
        mm = '0' + mm;
    } 
        
    today = yyyy + '-' + mm + '-' + dd;
    data.setAttribute("max", today);
    console.log(today);
}else{
    const dateProf = document.getElementById('dataNasci');

    var today = new Date();

    var dd = today.getDate();
    var mm = today.getMonth() + 1; //Janeiro é 0 e Dezembro é 11
    var yyyy = today.getFullYear();

    if (dd < 10) {
    dd = '0' + dd;
    }

    if (mm < 10) {
    mm = '0' + mm;
    } 

    if (yyyy) {
        yyyy = yyyy - 18;
    }
        
    today = yyyy + '-' + mm + '-' + dd;
    dateProf.setAttribute("max", today);
}