function OpenModel(){
    const openModal = document.getElementById('openModal')
    const modal = document.getElementById('modal')
    const closeModal = document.getElementById('exit')

    openModal.addEventListener('click',() =>{
        if (modal.classList.contains('off')){
            modal.classList.remove('off')
        }
    }
    )

    closeModal.addEventListener('click', () => {modal.classList.add('off')})
}

document.addEventListener("DOMContentLoaded", OpenModel, false)