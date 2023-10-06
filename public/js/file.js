$(function () {
    Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });

    /**
     * defined modal upload file
     *
     */
    var createDirModal = new bootstrap.Modal(
        document.getElementById("mc_file"),
        {
            keyboard: false,
        }
    );

    /**
     * show modal upload file
     *
     */
    $(".new-file").on("click", function (event) {
        createDirModal.show();
    });

    /**
     * submit upload file
     *
     */
    $("#form_upload_file").on("submit", function (event) {
        event.preventDefault();
        const route = $(this).attr("action");
        let files = $("#document")[0].files;
        const csrf = $('[name="_token"]').val();
        const category = $('[name="category"]').val();
        if (files.length > 0) {
            let data = new FormData();
            data.append("document", files[0]);
            data.append("_token", csrf);
            data.append("category", category);
            $.ajax({
                type: "POST",
                url: route,
                data: data,
                contentType: false,
                processData: false,
            })
                .done(function (response) {
                    createDirModal.hide();
                    Toast.fire({
                        icon: "success",
                        title: response.data,
                    });
                    location.reload();
                })
                .fail(function (response) {
                    Toast.fire({
                        icon: "error",
                        title: "Error",
                    });
                });
        }
    });

    /**
     * delete file
     *
     */
    $(".delete-file").on("click", function (event) {
        Swal.fire({
            title: "Are you sure?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Delete",
            preConfirm: () => {
                const url = $(this).attr("data-delete");
                $.ajax({
                    type: "DELETE",
                    url: url,
                    data: {},
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                })
                    .done(function (res) {
                        location.reload();
                    })
                    .fail(function (res) {
                        Toast.fire({
                            icon: "error",
                            title: res,
                        });
                    });
            },
            allowOutsideClick: () => !Swal.isLoading(),
        });
    });
});
