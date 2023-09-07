//Toasts
const myToastEl = document.getElementById('myToast')
myToastEl.addEventListener('hidden.bs.toast', () => {
    
})

//Switch to dark theme
{
let moon = document.querySelector('.material-symbols-outlined');
document.getElementById('btnSwitch').addEventListener('click', ()=>{
    if (document.documentElement.getAttribute('data-bs-theme') == 'dark') {
        document.documentElement.setAttribute('data-bs-theme','light')
        moon.style.color = 'rgb(0, 0, 0)'
        
    }
    else {
        document.documentElement.setAttribute('data-bs-theme','dark')
        moon.style.color = 'rgb(1255, 255, 255)'
    }
});
}
