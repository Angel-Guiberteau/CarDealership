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


    const buttonAddImage = document.querySelector(".input-group-text:last-child"); 
    const fileContainer = buttonAddImage.closest(".mb-3").querySelector(".input-group"); 

    buttonAddImage.addEventListener("click", function () {
        
        const newInputGroup = document.createElement("div");
        newInputGroup.classList.add("input-group", "mt-2");

        const newFileInput = document.createElement("input");
        newFileInput.type = "file";
        newFileInput.classList.add("form-control");
        newFileInput.name = "secondary_images[]";
        newFileInput.accept = "image/*";

        const deleteButton = document.createElement("button");
        deleteButton.classList.add("input-group-text", "btn", "btn-danger");
        deleteButton.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 14a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -14" /><path d="M9 7l1 -3h4l1 3" /></svg>`;

        deleteButton.addEventListener("click", function () {
            newInputGroup.remove();
        });

        newInputGroup.appendChild(newFileInput);
        newInputGroup.appendChild(deleteButton);

        fileContainer.appendChild(newInputGroup);
    });

});