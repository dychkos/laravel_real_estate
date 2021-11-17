let multyDropdown = document.querySelector(".dropdown_multyselect");

let multySelect = new Select(multyDropdown,{
    multy:true,
    placeholder:"Choose features"
})

document.getElementById('file_input').addEventListener("change",function (e) {
    let files = this.files;
    let fileLabel = document.querySelector(".file_label");
    if (files.length >= 2) {
        fileLabel.textContent  = files.length + " Files Ready To Upload";
    } else {
        fileLabel.textContent = e.target.value.split("\\").pop();
    }
});