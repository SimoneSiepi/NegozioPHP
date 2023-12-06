/* function handleFocus() {
    var nicknameInput = document.getElementById("Nickname");
    if (nicknameInput.value === "Inserisci Nickname") {
        nicknameInput.value="";
        nicknameInput.style.color = "black"; // Cambia il colore del testo quando inizia a scrivere
    }
}

function handleBlur() {
    var nicknameInput = document.getElementById("Nickname");
    if (nicknameInput.value === "") {
        nicknameInput.value = "Inserisci Nickname";
        nicknameInput.style.color = "gray"; // Ripristina il colore del testo sbiadito quando non è in focus
    }
} */

function controlloTesto(testo) {
    return testo.trim() !== '';
}

function controlloNumeri(numero) {
    return numero >= 0;
}

function controlloISBN(isbn) {
    const isbnRegex = /^(?:\d{9}[\dXx]|\d{13})$/;
    return isbnRegex.test(isbn);
}

function verificaForm() {
    event.preventDefault(); // Impedisce il comportamento di default del modulo del form
    var verifica=true;
    var isbn = document.getElementById('cod_ISBN').value;
    var titolo = document.getElementById('titoloLibro').value;
    var autore = document.getElementById('autore').value;
    var prezzo = document.getElementById('prezzo').value;
    var scortaMinima = document.getElementById('scorta_min').value;

    if (!controlloISBN(isbn)) {
        alert('Inserisci un codice ISBN valido.');
        verifica=false;
    }

    if (!controlloTesto(titolo)) {
        alert('Inserisci un titolo valido.');
        verifica=false;
    }

    if (!controlloTesto(autore)) {
        alert("inserisci un autore valido");
        verifica=false;
    }

    if (!controlloNumeri(prezzo)) {
        alert('Il prezzo non deve essere un numero negativo');
        verifica=false;
    }

    if (!controlloNumeri(scortaMinima)) {
        alert('la scorta minima deve essere un numero non negativo');
        verifica=false;
    }
    
    if (verifica) {
        document.getElementById('formValue').value = "1";
    }
    else{
        console.log("form non valido");
    }

    return verifica;

}
