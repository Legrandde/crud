let body = document.querySelector('body')
let btnAnnulle = document.querySelector('#btn-annulee')
let btnconfirm = document.querySelector('#btn-confirm')
let btnSup = document.querySelector('.btn-sup');
let popupDel = document.querySelector('.popup-del');
let popupAjou = document.querySelector('.popup-ajout');

let btnAjouter = document.querySelector('.btn-ajouter');
btnAjouter.addEventListener('click', () =>{
    console.log(btnAjouter);
    body.style.backgroundColor="#9e9e9e"
    popupAjou.style.display= "block";
    console.log(popupDel)
})


btnSup.addEventListener('click', () =>{
    body.style.backgroundColor="#9e9e9e"
    popupDel.style.display= "block";
    console.log(popupDel)

})

btnAnnulle.addEventListener('click', () =>{
    body.style.backgroundColor="white"
    popupDel.style.display= "none";
    console.log(popupDel)

})

btnconfirm.addEventListener('click', () =>{
    body.style.backgroundColor="white"
    popupDel.style.display= "none";
    console.log(popupDel)

})


