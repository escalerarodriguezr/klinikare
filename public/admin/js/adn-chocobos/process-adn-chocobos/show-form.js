const processAdnChocobos = {
    init: () => {
        processAdnChocobos.adnForm.init()
    },
    adnForm: {
        init: () => {
            const form = document.getElementById('process-adn-chocobos')
            form.onsubmit = async (event) => {
                event.preventDefault();
                const formData = new FormData(event.target);
                try {
                    const response = await fetch(event.target.action, {
                        method: "POST",
                        body: formData,
                        headers: {
                            "Accept": "application/json",
                            'X-CSRF-TOKEN': event.target._token.value
                        },
                    });
                    if( !response.ok ){
                        const message = JSON.parse(await response.text())
                        app.notification.warning(message.error)
                    }else{
                        const blod = await response.blob();
                        const link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blod);
                        link.download = `chocobo-adn_${+new Date()}.txt`;
                        link.click();
                    }
                }catch (error){
                    app.notification.error("Error inesperado")
                }
            }
        }
    }
}

document.addEventListener("DOMContentLoaded", processAdnChocobos.init());
