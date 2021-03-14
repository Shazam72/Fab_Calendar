// animation des champs du formulaire
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
                        title: "Compte déja existant!",
                        text:
                            "Vous possédez déja un copmte! Connectez-vous pour y accéder",
                        icon: "info",
                        button: "OK",
                    }).then(() => {
                        document
                            .querySelectorAll("form input")
                            .forEach((input) => {
                                input.value = "";
                            });
                        change_form("login");
                    });
                else if (resp == "saved")
                    swal({
                        title: "Compte creé avec succès!",
                        text:
                            "Veuillez vérifier votre boîte e-mail afin de confirmer votre inscription",
                        icon: "success",
                        button: "OK",
                    });
                else if (resp == "unavalaible")
                    swal({
                        title: "Identifiants invalides!",
                        text:
                            "Veuillez réessayer en entrant des informations correctes s'il vous plaît",
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
