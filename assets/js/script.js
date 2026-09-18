

document.addEventListener('DOMContentLoaded', () => {
    console.log('O DOM foi totalmente carregado!');
    // Seu código aqui (ex: selecionar botões, adicionar outros eventos)
    if (dadosConfig[0].homol) {
        tempInfoFloat = 0;
        auxxInfoFloat = getLocalStorage("infoFloat");
        tempInfoFloat = parseInt(auxxInfoFloat, 10);
        tempInfoFloat += 1;
        showInfoFloat();
        setLocalStorage("infoFloat", tempInfoFloat.toString());
    }
});

const showInfoFloat = () => {
    const infoAuxx = document.getElementById("info-float");
    infoAuxx.innerHTML = `<span># ${auxxInfoFloat}</span>`;
}

const toggleHomol = () => {
    console.log(`${dadosConfig[0].homol}`);
}

const dadosConfig = [
    {
        homol: true,
    },
];

const dadosJson = [
    {
        id: 1,
        filter: "filter-lms_lxp",
        img: "leroy_lex_relatorios.png",
        titulo: "LMS | LXP",
        texto: "Administração de plataforma LXP - Relatórios"
    },
    {
        id: 2,
        filter: "filter-storyline_360",
        img: "ram_dakota.png",
        titulo: "Articulate Storyline 360",
        texto: "HTML5, JS, SCORM"
    },
    {
        id: 3,
        filter: "filter-html5",
        img: "iveco_cssp.png",
        titulo: "HTML5",
        texto: "Reveal.js, HTML5, Quiz"
    },
    {
        id: 4,
        filter: "filter-storyline_360",
        img: "jeep_avenger.png",
        titulo: "Articulate Storyline 360",
        texto: "HTML5, JS, SCORM"
    },
    {
        id: 5,
        filter: "filter-lms_lxp",
        img: "leroy_lex_usuarios.png",
        titulo: "LMS | LXP",
        texto: "Administração de plataforma LXP - Usuários"
    },
    {
        id: 6,
        filter: "filter-html5_flash",
        img: "iveco_conc_fund_motor.png",
        titulo: "Conversão Flash - HTML5",
        texto: "Animate, HTML5, SCORM"
    },
    {
        id: 7,
        filter: "filter-lms_lxp",
        img: "leroy_lex_certificados.png",
        titulo: "LMS | LXP",
        texto: "Administração de plataforma LXP - Certificados"
    },
    {
        id: 8,
        filter: "filter-html5",
        img: "stellantis_motor_turbo_flex.png",
        titulo: "HTML5",
        texto: "Reveal.js, HTML5, Quiz"
    },
];

loadPortifolio = () => {
    const lista = document.getElementById("items-portifolio");

    // Transforma o array em strings de <li> e insere no <ul>
    lista.innerHTML = dadosJson.map(item =>
        `
<div class="col-12 px-3 col-lg-4 col-md-6 portfolio-item isotope-item ${item.filter}">
    <div class="portfolio-card">
        <div class="portfolio-img">
            <div class="image-container">
                <img src="assets/img/portifolio/${item.img}" alt="Portfolio Item" class="img-fluid">
            </div>
            <div class="portfolio-overlay">
                <a href="assets/img/portifolio/${item.img}" class="glightbox portfolio-lightbox">
                    <i class="bi bi-plus-circle pt-2"></i>
                </a>
            </div>
        </div>
        <div class="portfolio-info">
            <h4>${item.titulo}</h4>
            <p>${item.texto}</p>
        </div>
    </div>
</div>    
`).join('');

}

loadPortifolio();




//Dados no LocalStorage
setLocalStorage = (a, b) => {
    var mySetParam = localStorage.setItem(a, b);
    return mySetParam;
}

getLocalStorage = (a) => {
    var myGetParam = localStorage.getItem(a);
    return myGetParam;
}

removeLocalStorage = (a) => {
    var myRemoveParam = localStorage.removeItem(a);
    return myRemoveParam;
}

clearLocalStorage = () => {
    var myClearParam = localStorage.clear();
    return myClearParam;
}


KeyPress = (e) => {
    var evtobj = window.event ? event : e
    if (evtobj.ctrlKey && evtobj.altKey && evtobj.keyCode == 96) {
        /* CTRL + ALT + 0 = Reset localStorage para 0 */
        console.log(`Clicou ${evtobj.keyCode}, tecla ${evtobj.key}`);
        setLocalStorage("infoFloat", 0);
        /* location.reload(); */
    }
    if (evtobj.ctrlKey && evtobj.shiftKey && evtobj.altKey && evtobj.keyCode == 46) {
        /* CTRL + shift + ALT + del = clear local storage */
        console.log(`Clicou ${evtobj.keyCode}, tecla ${evtobj.key}`);
        removeLocalStorage("infoFloat");
    }
    if (evtobj.ctrlKey && evtobj.altKey && evtobj.keyCode == 38) {
        /* CTRL + ALT + 38 = toggle homol */
        console.log(`Clicou ${evtobj.keyCode}, tecla ${evtobj.key}`);
        toggleHomol();
    }
    
}
document.onkeydown = KeyPress;