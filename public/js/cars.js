document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function (e) {
            const taskId = this.getAttribute('data-car-id');

            swal({
                title: "Are you sure?",
                text: "This action cannot be undone.",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "btn-cancel",
                        closeModal: true
                    },
                    confirm: {
                        text: "Yes, delete it!",
                        value: true,
                        visible: true,
                        className: "btn-confirm",
                        closeModal: true
                    }
                },
            }).then(function (result) {
                if (result) {
                    window.location.href = '/deleteCar/' + taskId;
                }
            });
        });
    });

});