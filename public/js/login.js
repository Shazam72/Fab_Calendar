// animation des champs du formulaire
(function(){
    Array.from($(".form-group input")).forEach(input => {
        if(input.value!="")
            input.parentNode.classList.add('animation')
    });
})();
$(".form-group input").on("input", (e) => {
    if (e.target.value != "") e.target.parentNode.classList.add("animation");
    else if (e.target.value == "")
        e.target.parentNode.classList.remove("animation");
});
// Montrer/Cacher le mot de passe
$(".form-group i").click((e) => {
    let icon = e.target;
    if (icon.classList.contains("fa-eye")) {
        icon.parentNode.querySelector("input").type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        icon.parentNode.querySelector("input").type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
});

//dynamisme/ & traitement du formulaire

let change_form = (for_mode) => {
    if (for_mode == "logup") {
        $("form header h2").text("Inscription");
        $("form").removeClass("login-mode");
        $("form").addClass("logup-mode");
    } else {
        $("form header h2").text("Connection");
        $("form").removeClass("logup-mode");
        $("form").addClass("login-mode");
    }
    $(".form-buttons button:first-of-type").removeClass("active");
    $(".form-buttons button:first-of-type").before(
        $(".form-buttons button:last-of-type")
    );
    $(".form-buttons button:last-of-type").before($(".form-buttons p"));
    $(".form-buttons button:first-of-type").addClass("active");
};

$("form input,form select").keyup(function () {
    this.parentNode.querySelector(".error-msg").innerText = "";
});

if (/modifier/.test(window.location.href)) {
    $("head title").text("Modifier Infos - Fab Calendar");
}
if (/admin/.test(window.location.href)) {
    $("head title").text("Administration - Fab Calendar");
}
if (/logup/.test(window.location.href)) {
    $("head title").text("Logup - Fab Calendar");
    change_form("logup");
}

$(".form-buttons button").click((e) => {
    e.preventDefault();
    if (e.target.classList.contains("active")) {
        let formdata = new FormData();
        let form = document.querySelector("form");
        formdata.append("_token", form._token.value);
        if (e.target.classList.contains("login-button")) {
            formdata.append("email", form.email.value);
            formdata.append("password", form.password.value);
            formdata.append(
                "password_confirmation",
                form.password_confirmation.value
            );
        } else {
            formdata.append("nom", form.nom.value);
            formdata.append("prenom", form.prenom.value);
            formdata.append("email", form.email.value);
            formdata.append("formasuiv", form.formasuiv.value);
            formdata.append("password", form.password.value);
            formdata.append(
                "password_confirmation",
                form.password_confirmation.value
            );
        }
        fetch(e.target.dataset.target, {
            method: "POST",
            body: formdata,
        })
            .then((resp) => {
                try {
                    return resp.json();
                } catch (error) {
                    throw error;
                }
            })
            .then((resp) => {
                if (resp == "alreadyInDB")
                    swal({
                        title: "Compte d??ja existant!",
                        text:
                            "Vous poss??dez d??ja un copmte ? Connectez-vous pour y acc??der",
                        icon: "info",
                        button: "OK",
                    }).then(() => {
                        document
                            .querySelectorAll("form .form-group input")
                            .forEach((input) => {
                                if (input.name) input.value = "";
                            });
                        change_form("login");
                    });
                else if (resp == "saved")
                    swal({
                        title: "Compte cre?? avec succ??s!",
                        text:
                            "Veuillez v??rifier votre bo??te e-mail afin de confirmer votre inscription",
                        icon: "success",
                        button: "OK",
                    }).then(() => {
                        document
                            .querySelectorAll("form .form-group input")
                            .forEach((input) => {
                                if (input.name) input.value = "";
                            });
                        change_form("login");
                    });
                else if (resp == "unavalaible")
                    swal({
                        title: "Identifiants invalides!",
                        text:
                            "Veuillez r??essayer en entrant des informations correctes s'il vous pla??t",
                        icon: "error",
                        button: "OK",
                    });
                else if (resp.text=="modified") {
                    swal({
                        title: "Donn??es enregistr??es!",
                        text:
                            "Toutes les modifications que vous avez apport?? ont ??t?? enregist??es. Les identifiants de connections vous serviront lors de votre prochaine connection. ",
                        icon: "success",
                        button: "OK",
                    }).then(() => {
                        window.location.href = resp.link;
                    });
                }
                else if (resp.text == "connected")
                    window.location.href = resp.link;
                else if (resp && resp.length != 0) {
                    $(".error-msg.email").text(resp.email);
                    $(".error-msg.password").text(resp.password);
                    $(".error-msg.password_confirmation").text(
                        resp.password_confirmation
                    );
                    $(".error-msg.nom").text(resp.nom);
                    $(".error-msg.prenom").text(resp.prenom);
                    $(".error-msg.formasuiv").text(resp.formasuiv);
                }
            })
            .catch((e) => {
                console.log(e);
            });
    } else {
        if (e.target.classList.contains("login-button")) {
            change_form("login");
        } else {
            change_form("logup");
        }
    }
});
$("form.admin button").click((e) => {
    e.preventDefault();
        let formdata = new FormData();
        let form = document.querySelector("form");
        formdata.append("_token", form._token.value);
            formdata.append("nom", form.nom.value);
            formdata.append("prenom", form.prenom.value);
            formdata.append("email", form.email.value);
            formdata.append("password", form.password.value);
            formdata.append(
                "password_confirmation",
                form.password_confirmation.value
            );
        
        fetch(e.target.dataset.target, {
            method: "POST",
            body: formdata,
        })
            .then((resp) => {
                try {
                    return resp.json();
                } catch (error) {
                    throw error;
                }
            })
            .then((resp) => {
                if (resp.msg == "saved")
                    swal({
                        title: "Compte cre?? avec succ??s!",
                        text:
                            "Veuillez v??rifier votre bo??te e-mail afin de confirmer votre inscription",
                        icon: "success",
                        button: "OK",
                    }).then(() => {
                        window.location.href = resp.link;
                    });
                else if (resp == "unavalaible")
                    swal({
                        title: "Identifiants invalides!",
                        text:
                            "Veuillez r??essayer en entrant des informations correctes s'il vous pla??t",
                        icon: "error",
                        button: "OK",
                    });
                else if (resp.text == "connected")
                    window.location.href = resp.link;
                else if (resp && resp.length != 0) {
                    $(".error-msg.email").text(resp.email);
                    $(".error-msg.password").text(resp.password);
                    $(".error-msg.password_confirmation").text(
                        resp.password_confirmation
                    );
                    $(".error-msg.nom").text(resp.nom);
                    $(".error-msg.prenom").text(resp.prenom);
                }
            })
            .catch((e) => {
                console.log(e);
            });
});

//dynamisme sur la s??lection de la photo de profile
$('form input[type="file"]').change(function(e){

    let file= this.files[0];
    let reader= new FileReader();
    reader.onload=()=>{
        this.parentNode.parentNode.querySelector('img').src=reader.result;
    };
    reader.readAsDataURL(file);

});

