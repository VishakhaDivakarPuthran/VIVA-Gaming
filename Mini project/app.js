const menu=document.querrySelector('#mobile-menu')
const menulinks=document.querySelector('.navbar__menu')

menu.addEventsListener('click',function(){
    menu.classList.toggle('is-active')
    menulinks.classList.toggle('active');
})