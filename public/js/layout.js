$(".logo img,.avatar img").click(function () {
    window.location.href = this.dataset.target;
});
$("a.logout-btn").click(function (e) {
    e.preventDefault();
    swal({
        title: "Voulez-vous vous déconnecter ?",
        text:
            "Si vous continuez, vous allez être déconnecté de la plate-forme. En êtes-vous sûr ?",
        buttons: {
            confirm: true,
            cancel: true,
        },
    }).then((confirm, cancel) => {
        if (confirm) window.location.href = this.href;
    });
});
