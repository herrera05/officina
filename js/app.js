async function loadData(url, selectId, key, label) {
    let res = await fetch(url);
    let data = await res.json();

    let select = document.getElementById(selectId);

    data.forEach(el => {
        let opt = document.createElement("option");
        opt.value = el[key];
        opt.textContent = el[label];
        select.appendChild(opt);
    });
}

async function init() {
    loadData("api/officine.php", "officine", "codice", "denominazione");
    loadData("api/servizi.php", "servizi", "codice", "descrizione");
    loadData("api/ricambi.php", "ricambi", "codice_pezzo", "descrizione");
    loadData("api/accessori.php", "accessori", "codice_articolo", "descrizione");
    
}

async function cerca() {
    let servizio = document.getElementById("servizi").value;
    let ricambio = document.getElementById("ricambi").value;
    let accessorio = document.getElementById("accessori").value;

    let url = `api/ricerca.php?servizio=${servizio}&ricambio=${ricambio}&accessorio=${accessorio}`;
    let res = await fetch(url);
    let data = await res.json();

    let div = document.getElementById("risultati");
    div.innerHTML = "";

    data.forEach(o => {
        div.innerHTML += `<p>${o.denominazione} - ${o.indirizzo}</p>`;
    });
}

function getOfficinaId(){
    return document.getElementById("officinaSelect").value;
}

function addServizio(){
    fetch("api/servizi.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            nome: document.getElementById("servizioNome").value,
            officina_id: getOfficinaId()
        })
    }).then(()=>alert("Servizio aggiunto"));
}

function addRicambio(){
    fetch("api/ricambi.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            nome: document.getElementById("ricambioNome").value,
            officina_id: getOfficinaId()
        })
    }).then(()=>alert("Ricambio aggiunto"));
}

function addAccessorio(){
    fetch("api/accessori.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            nome: document.getElementById("accessorioNome").value,
            officina_id: getOfficinaId()
        })
    }).then(()=>alert("Accessorio aggiunto"));
}

init();

/*async function loadData(url, selectId, key, label) {
    let res = await fetch(url);
    let data = await res.json();

    let select = document.getElementById(selectId);

    data.forEach(el => {
        let opt = document.createElement("option");
        opt.value = el[key];
        opt.textContent = el[label];
        select.appendChild(opt);
    });
}

async function init() {
    loadData("api/officine.php", "officine", "codice", "denominazione");
    loadData("api/servizi.php", "servizi", "codice", "descrizione");
    loadData("api/ricambi.php", "ricambi", "codice_pezzo", "descrizione");
    loadData("api/accessori.php", "accessori", "codice_articolo", "descrizione");
}

async function cerca() {
    let servizio = document.getElementById("servizi").value;
    let ricambio = document.getElementById("ricambi").value;
    let accessorio = document.getElementById("accessori").value;
    // `(backtick) --> serve per inserire variabili nelle stringhe, se utilizzo "" = conteunuto <p>
    let url = `api/ricerca.php?servizio=${servizio}&ricambio=${ricambio}&accessorio=${accessorio}`;
    let res = await fetch(url);
    let data = await res.json();

    let div = document.getElementById("risultati");
    div.innerHTML = "";

    data.forEach(o => {
        div.innerHTML += `<p>${o.denominazione} - ${o.indirizzo}</p>`;
    });
}

init();*/