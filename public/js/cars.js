document.addEventListener("DOMContentLoaded", function () {

    // Código para los botones de eliminar
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

    // Código para añadir imágenes
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

    // Inicialización de Flatpickr para el campo de año (year) solo para seleccionar el año
    flatpickr("#year", {
        enableTime: false,       // Desactiva la selección de hora
        dateFormat: "Y",         // Solo se selecciona el año (Y es para solo año)
        minDate: "1901-01-01",   // Asegura que no se pueda seleccionar un año menor a 1901
        maxDate: new Date(),     // Asegura que no se pueda seleccionar un año mayor al actual
        allowInput: true,        // Permite que el usuario también pueda escribir directamente el año
        disableMobile: true,     // Desactiva el selector de móvil, ya que el calendario no es necesario
        clickOpens: true,        // Abre el selector al hacer clic
        locale: "es",            // Localización para formato de fecha en español
        mode: "single",          // Establece que solo se selecciona un valor (el año)
        monthSelectorType: "static",  // Desactiva la vista del mes
    });

});
