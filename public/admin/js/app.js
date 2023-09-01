const app = {
    init: () => {
        app.notification.init()
        app.parseTextDatesToClientTimeZone.init()
    },

    notification: {
        init: () => {
            const toastBlade = document.querySelector('[data-blade="toast"]')
            const duration = 4000;
            if(toastBlade){
                toastBlade.addEventListener('click',(event)=>{
                    event.target.closest('#vanilla-toast').remove()
                })
                setTimeout(()=>{
                    toastBlade.closest('#vanilla-toast').remove()
                },duration)
            }
        },
        success: (message) =>{
            vanillaToast.success(
                message,
                {duration:2000, fadeDuration:3, closeButton:true}
            );
        },
        error: (message) =>{
            vanillaToast.error(
                message,
                {duration:2000, fadeDuration:3, closeButton:true}
            );
        },
        info: (message) =>{
            vanillaToast.info(
                message,
                {duration:2000, fadeDuration:3, closeButton:true}
            );
        },
        warning: (message) =>{
            vanillaToast.warning(
                message,
                {duration:2000, fadeDuration:3, closeButton:true}
            );
        },
    },

    parseTextDatesToClientTimeZone: {
        init: () => {
            document.querySelectorAll("[data-to-locale-date]").forEach((item)=>{
                app.parseTextDatesToClientTimeZone.parseToLocale(item)
            })
        },
        parseToLocale: (itemElement) => {
            const utcDate = itemElement.textContent;
            const format = itemElement.dataset.toLocaleDate
            if( format === 'datetime' ){
                itemElement.textContent =
                    new Date(utcDate).toLocaleDateString()
                    + ' ' +
                    new Date(utcDate).toLocaleTimeString()
            }else{
                itemElement.textContent = new Date(utcDate).toLocaleDateString()
            }
        }
    },
}

document.addEventListener("DOMContentLoaded", app.init);
