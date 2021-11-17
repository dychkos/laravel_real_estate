let orders = document.querySelectorAll(".order");

orders.forEach(order=>{
    order.addEventListener("click",(e)=>{
        order.classList.toggle("order_open");
    })
})

