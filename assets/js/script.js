document.addEventListener('click', e=> {
    if(e.target.type == 'checkbox'){
        if(e.target.type == 'checkbox'){
            if(e.target.checked==false){
                fetch(`controller-ajax.php?unvalidateid=${e.target.dataset.userId}`)
            } else {
                fetch(`controller-ajax.php?validateid=${e.target.dataset.userId}`)
            }
        }
    }
})