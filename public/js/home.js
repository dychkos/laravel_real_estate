
let dropdowns = document.querySelectorAll('._dropdown');

dropdowns.forEach(dropdown=>{
    let select = new Select(dropdown,{
        multy:false,
        placeholder:"Choose features"
    });
})


let swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    slidesPerGroup: 1,
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        991:{
            slidesPerView:3
        },
        320:{
            slidesPerView:1
        }
    }

});


let comments = document.querySelectorAll(".comment");
comments[4].classList.add("active");
console.log("current",swiper.realIndex)
swiper.on("slidePrevTransitionStart",function (){
    deactivateComments(comments);
    console.log("click to prev",swiper.previousIndex)
    comments[swiper.previousIndex].classList.add("active");
})

swiper.on("slideNextTransitionStart",function (){
    deactivateComments(comments);
    console.log("click to Next",swiper.previousIndex + 2)
    comments[swiper.previousIndex + 2].classList.add("active");
})

const deactivateComments = (comments) =>{
    comments.forEach(comment=>{
        if(comment.classList.contains("active")){
            comment.classList.remove("active");
        }
    })
}

