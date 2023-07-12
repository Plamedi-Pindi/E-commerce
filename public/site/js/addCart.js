const addCart = document.getElementsByClassName("addCart");
const cartModalBotaoContinuar = document.getElementById("cartModalBotaoContinuar")
const cartModal = document.getElementById("cartModal")
const cartModalContent = document.getElementById("cartModalContent")

//

for(i=0; i<=addCart.length; i++){
    addCart[i].addEventListener('click', () => {

        cartModal.style.transition = '0.4s';
        cartModal.style.minWidth = '100%';

        cartModalContent.style.transition = '0.6s';
        setTimeout(() => {

            cartModalContent.style.display = "block"
        }, 300)
        console.log(addCart.length)
    })



    cartModalBotaoContinuar.addEventListener('click', ()=>{

        cartModalContent.style.display = "none"
        setTimeout(() => {
            cartModal.style.transition = '0.4s';
            cartModal.style.minWidth = '0%';
        }, 100)

    })

}
