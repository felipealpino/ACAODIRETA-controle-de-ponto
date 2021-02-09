window.onload = () => {
    h=0; 
    m=0;
    s=0;
    tempoIniciado =0;
    playButton = document.querySelector('.btn-play')
    stopButton = document.querySelector('.btn-end');
    time = document.querySelector('.time');
    intervalo = 0;
    evento();
}


function evento(){
    playButton.addEventListener('click', iniciarCronometro);
    stopButton.addEventListener('click', pararCronometro);
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



