$(".titles h3").click(function () {
    $(".titles h3").removeClass("active");
    this.classList.add("active");
    $(".stats,.table").hide();
    $(this.dataset.target).show();
});

$(".form-reservation form").submit(function (e) {
    e.preventDefault();

    fetch(window.location.href, {
        method: "POST",
        body: new FormData(this),
    })
        .then((resp) => resp.json())
        .then((resp) => {
            if (resp.text) {
                swal({
                    title: "Enregistrement réussi",
                    text: "Ce jour a été en registé avec succès",
                    icon: "success",
                    confirm: true,
                }).then(() => {
                    this.querySelectorAll("label ~ input").forEach((input) => {
                        if (input.name) input.value = "";
                    });
                });
            } else if (resp.error) {
                swal({
                    title: "Erreur",
                    text: resp.error,
                    icon: "error",
                    confirm: true,
                });
            } else {
                $(".errors-msg.day").text(resp.day);
                $(".errors-msg.places").text(resp.places);
                $(".errors-msg.time_start").text(resp.time_start);
                $(".errors-msg.time_end").text(resp.time_end);
            }
        });
});
$('.btn.valid,.btn.refuse').click(function(){
    let form=new FormData();
    form.append('_token',this.parentNode.querySelector('input[name="_token"]').value);
    fetch(this.dataset.target,{
        method:'POST',
        body: form,
    }).then(resp=>resp.text()).then((resp)=>{
        if(this.classList.contains('refuse'))
            $(this.parentNode.parentNode).remove();
        else {
            $(this).text('Validé')
            $(this).css({
                'color':'green',
                'background':'none',
                'border':'none',
                'box-shadow':'none',
                'pointer-events':'none'
            })
        }
    });
});
