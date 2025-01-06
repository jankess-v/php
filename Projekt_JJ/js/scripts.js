const form = document.getElementById("contactForm");
const kursy = document.getElementsByName("kurs");
const imie = document.getElementById("imie");
const nazwisko = document.getElementById("nazwisko");
const email = document.getElementById("email");
const telefon = document.getElementById("phone");
const adres = document.getElementById("adres");

form.addEventListener('submit', e => {
    e.preventDefault();
    if (validateInputs()) {
        zapiszLS();
        form.submit();  // Submit form if validation is successful
    }
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
};

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = "";
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const isValidEmail = email => {
    const regula = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regula.test(String(email).toLowerCase());
};

const isValidPhone = telefon => {
    const regula = /^(\+\d{1,3} ?)?((\d{3} ?){3})$/;
    return regula.test(String(telefon));
};

function validCheckbox(input_type){
    let inputElements = document.getElementsByName(input_type);
    let checked = false;
    let i = 0;
    while(i < inputElements.length){
        if(inputElements[i].checked){
            checked = true;
        }
        i++;
    }
    return checked;
}

const validateInputs = () => {
    const imieValue = imie.value.trim();
    const nazwiskoValue = nazwisko.value.trim();
    const emailValue = email.value.trim();
    const telefonValue = telefon.value.trim();
    const adresValue = adres.value.trim();

    let isValid = true;

    if (imieValue === "" || imieValue === null) {
        setError(imie, "Imię jest wymagane!");
        isValid = false;
    } else {
        setSuccess(imie);
    }

    if (nazwiskoValue === "" || nazwiskoValue === null) {
        setError(nazwisko, "Nazwisko jest wymagane!");
        isValid = false;
    } else {
        setSuccess(nazwisko);
    }

    if (emailValue === "" || emailValue === null) {
        setError(email, "Email jest wymagany!");
        isValid = false;
    } else if (!isValidEmail(emailValue)) {
        setError(email, "Błędny format adresu email!");
        isValid = false;
    } else {
        setSuccess(email);
    }

    if (telefonValue === "" || telefonValue === null) {
        setError(telefon, "Telefon jest wymagany!");
        isValid = false;
    } else if (!isValidPhone(telefonValue)) {
        setError(telefon, "Błędny format numeru telefonu!");
        isValid = false;
    } else {
        setSuccess(telefon);
    }

    if (adresValue === "" || adresValue === null) {
        setError(adres, "Adres jest wymagany!");
        isValid = false;
    } else if (adresValue.length < 7) {
        setError(adres, "Adres jest za krótki!");
        isValid = false;
    } else {
        setSuccess(adres);
    }

    if(validCheckbox("kurs") === false){
        document.getElementById("error_check").innerHTML = "Zaznacz kurs!"
        isValid = false;
    } else if(validCheckbox("kurs") === true){
        document.getElementById("error_check").innerHTML = "";
    }

    return isValid;
};

function validateEditInputs() {
    const editImie = document.getElementById("edit-imie");
    const editNazwisko = document.getElementById("edit-nazwisko");
    const editEmail = document.getElementById("edit-email");
    const editTelefon = document.getElementById("edit-phone");
    const editAdres = document.getElementById("edit-adres");

    const imieValue = editImie.value.trim();
    const nazwiskoValue = editNazwisko.value.trim();
    const emailValue = editEmail.value.trim();
    const telefonValue = editTelefon.value.trim();
    const adresValue = editAdres.value.trim();

    let isValid = true;

    if (imieValue === "" || imieValue === null) {
        isValid = false;
    }

    if (nazwiskoValue === "" || nazwiskoValue === null) {
        isValid = false;
    }

    if (emailValue === "" || emailValue === null) {
        isValid = false;
    } else if (!isValidEmail(emailValue)) {
        isValid = false;
    }

    if (telefonValue === "" || telefonValue === null) {
        isValid = false;
    } else if (!isValidPhone(telefonValue)) {
        isValid = false;
    }

    if (adresValue === "" || adresValue === null) {
        isValid = false;
    } else if (adresValue.length < 7) {
        isValid = false;
    }

    return isValid;
}

function zapiszLS()
{
    let item = {};
    let input = document.getElementsByName("kurs");
    item.kursy = "";
    item.cena = 0;
    if(input[0].checked){
        item.kursy += document.getElementById("japonski").value + ", ";
        item.cena += 129.99;
    }
    if(input[1].checked){
        item.kursy += document.getElementById("francuski").value + ", ";
        item.cena += 149.99;
    }
    if(input[2].checked){
        item.kursy += document.getElementById("niemiecki").value + ", ";
        item.cena += 149.99
    }
    item.kursy = item.kursy.trim().substring(0, item.kursy.length - 2);
    item.cena = item.cena.toFixed(2).toString();

    item.imie = document.getElementById("imie").value;
    item.nazwisko = document.getElementById("nazwisko").value;
    item.email = document.getElementById("email").value;
    item.phone = document.getElementById("phone").value;
    item.adres = document.getElementById("adres").value;

    let lista = JSON.parse(localStorage.getItem("lista"));
    if(lista === null){
        lista = [];
    }
    lista.push(item);
    localStorage.setItem("lista", JSON.stringify(lista));
}

function wyswietlLS()
{
    let content = "",
        startTab = "<table>",
        startCol = "<tr>",
        startRow = "<td>",
        endRow = "</td>",
        endCol = "</tr>",
        endTab = "</table> <br>";
    var lista = JSON.parse(localStorage.getItem("lista"));
    if(lista === null){
        document.getElementById("basket-content").innerHTML = "Koszyk jest pusty.";
    } else{
        document.getElementById("basket-content").style.visibility = "visible";
        for(let i = 0; i < lista.length; i++) {
            content += "<p class=\"lead fw-bold text-dark mb-0\">"+ "Zamówienie " + parseInt(i + 1) + "</p>";
            content += startTab + startCol + startRow + "<strong>Imię: <strong>" + endRow + startRow + lista[i].imie + endRow + endCol + endTab;
            content += startTab + startCol + startRow + "<strong>Nazwisko: </strong>" + endRow + startRow + lista[i].nazwisko + endRow + endCol + endTab;
            content += startTab + startCol + startRow + "<strong>Kursy: </strong>" + endRow + startRow + lista[i].kursy + endRow + endCol + endTab;
            content += startTab + startCol + startRow + "<strong>Cena: </strong>" + endRow + startRow + lista[i].cena + "zł" + endRow + endCol + endTab;
            content += startTab + startCol + startRow + "<strong>Email: </strong>" + endRow + startRow + lista[i].email + endRow + endCol + endTab;
            content += startTab + startCol + startRow + "<strong>Telefon: </strong>" + endRow + startRow + lista[i].phone + endRow + endCol + endTab;
            content += startTab + startCol + startRow + "<strong>Adres: </strong>" + endRow + startRow + lista[i].adres + endRow + endCol + endTab;
            content += '<button class="btn btn-warning mt-2 mb-5" onclick="editItem(' + i + ')">Edytuj</button>';
        }
        document.getElementById("basket-content").innerHTML = content;
    }
}

function wyczysc()
{
    localStorage.clear();
    document.getElementById("basket-content").innerHTML = "Koszyk jest pusty";
}

function editItem(index) {
    let lista = JSON.parse(localStorage.getItem("lista"));
    let item = lista[index];

    document.getElementById("edit-imie").value = item.imie;
    document.getElementById("edit-nazwisko").value = item.nazwisko;
    document.getElementById("edit-email").value = item.email;
    document.getElementById("edit-phone").value = item.phone;
    document.getElementById("edit-adres").value = item.adres;
    // document.getElementById("edit-kursy").value = item.kursy;

    editIndex = index;

    document.getElementById("edit-form").style.display = "block";
}

function saveEdits() {
    let lista = JSON.parse(localStorage.getItem("lista"));
    let item = lista[editIndex];

    item.imie = document.getElementById("edit-imie").value;
    item.nazwisko = document.getElementById("edit-nazwisko").value;
    item.email = document.getElementById("edit-email").value;
    item.phone = document.getElementById("edit-phone").value;
    item.adres = document.getElementById("edit-adres").value;
    // item.kursy = document.getElementById("edit-kursy").value;

    localStorage.setItem("lista", JSON.stringify(lista));

    document.getElementById("edit-form").style.display = "none";
    wyswietlLS();
}

function cancelEdit() {
    document.getElementById("edit-form").style.display = "none";
}

// content += "<table>";
// content += "<tr><td><strong>Imię: </strong></td><td>" + lista[i].imie + "</td></tr>";
// content += "<tr><td><strong>Nazwisko: </strong></td><td>" + lista[i].nazwisko + "</td></tr>";
// content += "<tr><td><strong>Kursy: </strong></td><td>" + lista[i].kursy + "</td></tr>";
// content += "<tr><td><strong>Cena: </strong></td><td>" + lista[i].cena + " zł</td></tr>";
// content += "<tr><td><strong>Email: </strong></td><td>" + lista[i].email + "</td></tr>";
// content += "<tr><td><strong>Telefon: </strong></td><td>" + lista[i].phone + "</td></tr>";
// content += "<tr><td><strong>Adres: </strong></td><td>" + lista[i].adres + "</td></tr>";
// content += "</table><br>";