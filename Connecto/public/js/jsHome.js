// ce code est pour le bouton popup d'admin

function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}

function incidentForm() {
    document.getElementById("incidentForm").style.display = "block";
}

window.onload = function(event) {
    let form = document.getElementById("incidentForm")
    if (form != null) {
        if (form.dataset.status.trim() == 'open') {
            form.style.display = "block";
        }
    }
}



//calendrier création incident

$('.datepicker').datepicker();
$(document).off('.datepicker.data-api');

//tentative de popup signalement 

function showCollapseAccordion() {

    let uncollapseBoxTitle = event.target;
    let uncollapseBox = uncollapseBoxTitle.nextElementSibling;

    uncollapseBox.classList.toggle("collapse");
}