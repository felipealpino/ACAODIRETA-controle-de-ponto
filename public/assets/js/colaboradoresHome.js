window.onload = () => {
    playButton = document.querySelector('.btn-play')
    stopButton = document.querySelector('.btn-end');
    time = document.querySelector('.time');
    arrayTime = time.innerText.split(':')
    h = arrayTime[0];
    m = arrayTime[1];
    s = arrayTime[2]; 
    intervalo = 0;
    evento();
}

function evento(){
    playButton.addEventListener('click', iniciarCronometro);
    stopButton.addEventListener('click', pararCronometro);
    if(h != 0 || m != 0 || s != 0){
        iniciarCronometro();
    }
}


function escreve(){
    s++;
    if(s > 59){
        m++;
        s=0;
    }
    if(m > 59){
        h++;
        m=0;
    }

    st = ('0' + s).slice(-2);
    mt = ('0' + m).slice(-2);
    ht = ('0' + h).slice(-2);

    time.innerHTML = `${ht}:${mt}:${st}`;
}


function iniciarCronometro(){
    escreve();
    intervalo = setInterval(() => {
        escreve()
    }, 1000);
    playButton.removeEventListener('click', iniciarCronometro);
}


function pararCronometro(){
    clearInterval(intervalo);
    playButton.addEventListener('click', iniciarCronometro);
    time.innerHTML = "00:00:00";   
    h=0;
    m=0;
    s=0;
}



{/* <script>
    document.getElementById('buscar-produto').addEventListener('click', () => { buscar($("#myInput").val()) }, false);

    function buscar(myInput){
        //metodo ajax responsavel pela req
        $.ajax  ({
                    //Configurações
                    type:'POST',    //metodo que está sendo utilizado
                    dataType: 'html',   //tipo de dado que a página vai retornar
                    url: '../php_controller/busca_produto_estoque.php',    //pagina que está sendo solicitada
                    beforeSend: function(){
                        $("#dados-tabela-produtos").html("Carregando....");
                    },
                    data: {myInput: myInput}, //Dados para consulta

                    //funcao que sera executada quando a solicitação for finalizada.
                    success: function(msg){
                        $("#dados-tabela-produtos").html(msg);
                    },
                    complete : function () {
                        ascendingAndDescending();
                    }        
                });
    }
</script> */}