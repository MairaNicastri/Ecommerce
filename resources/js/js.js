const navbar = document.querySelector("#bgnav");
const accettati = document.querySelector("#accettati");
const rifiutati = document.querySelector("#rifiutati");
const istruzioni = document.querySelector("#istruzioni");
const sezioniannunci = document.querySelector("#sezioniannunci");

document.addEventListener('scroll', ()=>{
    console.log();
    if(window.scrollY > 2){
        navbar.classList.add('navblurcolor' , 'nav-blur')
        navbar.classList.remove('bg-transparent')}
        else {
            navbar.classList.remove('navblurcolor' , 'nav-blur')
            navbar.classList.add('bg-transparent')}  
})

accettati.addEventListener('click' , ()=>{
    istruzioni.classList.add('d-none');
    sezioniannunci.classList.remove('d-none');
});
rifiutati.addEventListener('click' , ()=>{
    istruzioni.classList.add('d-none');
    sezioniannunci.classList.remove('d-none');

    });


