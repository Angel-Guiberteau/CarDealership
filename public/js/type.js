document.addEventListener("DOMContentLoaded", function () {
    // Add
    const typeInput = document.getElementById("type");
    const sendCreate = document.getElementById("sendButton");

    // Edit
    const editTypeInput = document.getElementById("editType");
    const sendEdit = document.getElementById("sendEdit");
    const editTypeForm = document.getElementById("editTypeForm");
    const editButtons = document.querySelectorAll(".editTypeBtn");


    const VALID_NAME_REGEX = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/; // Characters allowed: letters, spaces and accents

    // Deshabilitar los botones al inicio
    sendEdit.disabled = true;
    sendCreate.disabled = true;

    function validateInput(input, button) {
        if (!VALID_NAME_REGEX.test(input.value.trim())) {
            input.classList.add("is-invalid");
            button.disabled = true;
        } else {
            input.classList.remove("is-invalid");
            button.disabled = false;
        }
    }

    editTypeInput.addEventListener("input", function () {
        validateInput(editTypeInput, sendEdit);
    });

    typeInput.addEventListener("input", function () {
        validateInput(typeInput, sendCreate);
    });

    editButtons.forEach(button => {
        button.addEventListener("click", function() {
            document.getElementById("type_id").value = this.getAttribute("data-id");
            editTypeInput.value = this.getAttribute("data-name");
            sendEdit.disabled = false;
        });
    });

    editTypeForm.addEventListener("submit", function (event) {
        if (editTypeInput.classList.contains("is-invalid")) {
            event.preventDefault();
        }
    });

    createTypeForm.addEventListener("submit", function (event) {
        if (typeInput.classList.contains("is-invalid")) {
            event.preventDefault();
        }
    });

    editTypeForm.addEventListener("submit", function(event) {
        event.preventDefault();

        swal({
            title: "¿Confirmar edición?",
            text: "¿Estás seguro de que deseas modificar este tipo?",
            icon: "warning",
            buttons: ["Cancelar", "Sí, actualizar"],
            dangerMode: false,
        }).then((willEdit) => {
            if (willEdit) {
                editTypeForm.submit();
            }
        });
    });
});
