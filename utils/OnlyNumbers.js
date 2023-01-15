function onlyNumbers(evt){
    const evento = evt || window.event
    const key = evento.keyCode || evento.which
    const keyActive = String.fromCharCode(key)
    const regex = /^[0-9.,]+$/
    if(!regex.test(keyActive)){
        evento.returnValue = false
        if(evento.preventDefault) evento.preventDefault()
    }
}