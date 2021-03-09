// animation des champs du formulaire
$('.form-group input').on('input',(e)=>{
    if(e.target.value!='')
        e.target.parentNode.classList.add('animation')
    else if(e.target.value=='')
        e.target.parentNode.classList.remove('animation') 
})
// Montrer/Cacher le mot de passe
$('.form-group i').click((e)=>{
    let icon=e.target;
    if(icon.classList.contains('fa-eye')){
        icon.parentNode.querySelector('input').type='text'
        icon.classList.remove('fa-eye')
        icon.classList.add('fa-eye-slash')
    } else{
        icon.parentNode.querySelector('input').type='password'
        icon.classList.remove('fa-eye-slash')
        icon.classList.add('fa-eye')
    }
})



//dynamisme/ & traitement du formulaire
$('.form-buttons button').click((e)=>{
    e.preventDefault();
    if(e.target.classList.contains('active')){
        //traitement du formulaire en suivant ajax/fetch
    } else{
        if(e.target.classList.contains('login-button')){
            $('form header h2').text('Connection')
            $('form').removeClass('logup-mode')
            $('form').addClass('login-mode')
        } else{
            $('form header h2').text('Inscription')
            $('form').removeClass('login-mode')
            $('form').addClass('logup-mode')
        }
            
        $('.form-buttons button').removeClass('active')
        e.target.classList.add('active')
        $('.form-buttons button:first-of-type').before($('.form-buttons button:last-of-type'))
        $('.form-buttons button:last-of-type').before($('.form-buttons p'))
    }
})