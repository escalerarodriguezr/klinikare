const processChocoBilly = {
    init: () => {
        console.log("carga");
        processChocoBilly.chocoBillyForm.init()
    },
    chocoBillyForm: {
        init: () => {
            const form = document.getElementById('process-chocobilly')
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
                        link.download = `choco-billy_${+new Date()}.txt`;
                        link.click();
                    }
                }catch (error){
                    app.notification.error("Error inesperado")
                }
            }
        }
    }
}

document.addEventListener("DOMContentLoaded", processChocoBilly.init());
