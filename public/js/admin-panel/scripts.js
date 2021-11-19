/*!
    * Start Bootstrap - SB Admin v7.0.4 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2021 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    //
// Scripts
//

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});



setTimeout(()=>{
    let controlledInputs = document.querySelectorAll(".controlled-input");
    controlledInputs.forEach(input=>{
        input.addEventListener("change",(event)=>{
            input.dataset.changed = "true";
        })
    });

    let housesForm = document.querySelector("#houses_form");
    let usersForm = document.querySelector("#users_form");


    if(housesForm){
        housesForm.addEventListener("submit",(e)=>{
            beforeFormSend(controlledInputs);
        })
    }

    if(usersForm){
        usersForm.addEventListener("submit",(e)=>{
            beforeFormSend(controlledInputs);
        })
    }

},0)


let beforeFormSend = (controlledInputs) =>{
    controlledInputs.forEach(input=>{
        if(!input.dataset.changed){
            input.setAttribute("disabled","disabled");
        }
    })
}
