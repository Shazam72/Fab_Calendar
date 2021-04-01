$(".modal-footer button").click(function () {
    if ($(this).hasClass("reserve")) {
        let formdata = new FormData();
        formdata.append(
            "_token",
            document.querySelector('input[name="_token"]').value
        );
        formdata.append("res_id", this.dataset.value);

        fetch(this.dataset.target, {
            method: "POST",
            body: formdata,
        })
            .then((resp) => resp.json())
            .then((resp) => {
                if (resp == "reserved") {
                    $(this).text("Annuler");
                    $(this).removeClass("btn-primary").addClass("btn-danger");
                    $(this).removeClass("reserve").addClass("cancel");
                    this.dataset.target = this.dataset.target.replace(
                        /reserve/,
                        "cancel"
                    );
                }
            });
    }
    if ($(this).hasClass("cancel")) {
        let formdata = new FormData();
        formdata.append(
            "_token",
            document.querySelector('input[name="_token"]').value
        );
        formdata.append("res_id", this.dataset.value);

        fetch(this.dataset.target, {
            method: "POST",
            body: formdata,
        })
            .then((resp) => resp.json())
            .then((resp) => {
                if (resp == "canceled") {
                    $(this).text("Réserver");
                    $(this).removeClass("btn-danger").addClass("btn-primary");
                    $(this).removeClass("cancel").addClass("reserve");
                    this.dataset.target = this.dataset.target.replace(
                        /cancel/,
                        "reserve"
                    );
                }
            });
    }
});
