document.addEventListener("DOMContentLoaded", function(event) { 
    const expList = document.querySelectorAll(".collapse");
    expList.forEach(element => {
        let triggerId = element.getAttribute('trigger');
        if(triggerId!=null){
            let trigger = document.getElementById(triggerId);
            if(trigger!=null){
                trigger.addEventListener('click', e=>{
                    if(element.style.maxHeight)element.style.maxHeight=null; 
                    else element.style.maxHeight = element.scrollHeight+'px';               
                });
            }
        }
    });
});
