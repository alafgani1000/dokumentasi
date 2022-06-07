$(function () {
    $("#formRegister").on("submit", function (e) {
        e.preventDefault();
        const method = $(this).attr("method");
        const url = $(this).attr("action");
        const data = $(this).serialize();
        $.ajax({
            type: method,
            url: url,
            data: data,
            beforeSend: function () {
                clearRegisFeedback();
            },
        })
            .done(function (res) {
                clearRegisFeedback();
                clearRegisForm();
                regSuccesss.show();
            })
            .fail(function (res) {
                const errors = res.responseJSON.errors;
                $("#feedbackName").text(errors.name);
                $("#feedbackEmail").text(errors.email);
                $("#feedbackPassword").text(errors.password);
                $("#feedbackRepassword").text(errors.re_password);
            });
    });

    function clearRegisFeedback() {
        $("#feedbackName").text("");
        $("#feedbackEmail").text("");
        $("#feedbackPassword").text("");
        $("#feedbackRepassword").text("");
    }

    function clearRegisForm() {
        $("#name").val("");
        $("#email").val("");
        $("#password").val("");
        $("#re_password").val("");
    }

    const regSuccesss = new bootstrap.Modal(
        document.getElementById("regisSuccAlert"),
        {
            keyboard: false,
        }
    );
});
