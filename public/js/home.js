
let dropdowns = document.querySelectorAll('._dropdown');

dropdowns.forEach(dropdown=>{
    let select = new Select(dropdown,{
        multy:false,
        placeholder:"Choose features"
    });
})
