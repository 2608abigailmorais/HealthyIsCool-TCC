const botao = document.querySelector('#grafico');
const id = document.getElementsByClassName('id');

if (botao) {
    botao.addEventListener('click', function (e) {
        e.preventDefault();
        console.log(botao.value);
        let valores = [];
        for (let i = 0; i < 1; i++) {
            valores.push(id[i].innerHTML);
            // console.log("passou aqui");
        };
        // let id = valores.toString();
        xhr = new XMLHttpRequest();
        xhr.open('GET', 'busca.php?id='+valores.toString()); //"?tipo=' + botao.value, true" adicionar caso queira separar os gráficos
        xhr.addEventListener('load', (data) => {
            datajson = JSON.parse(data.target.responseText);
            console.log(datajson);
            Grafico_peso(datajson);
            Grafico_altura(datajson);
            Grafico_imc(datajson);
        });
        xhr.send();
    });
}