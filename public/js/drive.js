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
     * defined modal create category
     *
     */
    var createDirModal = new bootstrap.Modal(
        document.getElementById("mc_category"),
        {
            keyboard: false,
        }
    );

    /**
     * defined modal delete confirmation
     *
     */
    var deleteConfirmModal = new bootstrap.Modal(
        document.getElementById("confirm_del_category"),
        {
            keyboard: false,
        }
    );

    /**
     * defined modal rename category
     *
     */
    var renameModal = new bootstrap.Modal(
        document.getElementById("mc_rename_category"),
        {
            keyboard: false,
        }
    );

    /**
     * show modal create category
     *
     */
    $(".new-directory").on("click", function (event) {
        createDirModal.show();
    });

    /**
     * show modal rename
     *
     */
    $(".rename-category").on("click", function (event) {
        const url = $(this).attr("data-edit");
        const urlRename = $(this).attr("data-update");
        $.ajax({
            type: "GET",
            url: url,
            data: {},
        })
            .done(function (res) {
                $("#form_rename_category").attr("action", urlRename);
                $("#name").val(res.name);
                renameModal.show();
            })
            .fail(function (res) {
                Toast.fire({
                    icon: "error",
                    title: res,
                });
            });
    });

    /**
     * rename submit
     *
     */
    $("#form_rename_category").on("submit", function (event) {
        event.preventDefault();
        const data = $(this).serialize();
        const url = $(this).attr("action");
        $.ajax({
            type: "PUT",
            url: url,
            data: data,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
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
    });

    /**
     * submit create category
     *
     */
    $("#form_create_category").on("submit", function (event) {
        event.preventDefault();
        const data = $(this).serialize();
        const route = $(this).attr("action");
        $.ajax({
            type: "POST",
            url: route,
            data: data,
        })
            .done(function (response) {
                createDirModal.hide();
                location.reload();
            })
            .fail(function (response) {
                Toast.fire({
                    icon: "error",
                    title: "Error",
                });
            });
    });

    /**
     * delete category
     *
     */
    $(".delete-category").on("click", function (event) {
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
