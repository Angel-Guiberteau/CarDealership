document.addEventListener("DOMContentLoaded", function () {
    
    // Add
    const input = document.getElementById("input");
    const sendCreate = document.getElementById("sendButton"); 
    
    // Edit
    const editInput = document.getElementById("edit");
    const sendEdit = document.getElementById("sendEdit");
    const editForm = document.getElementById("editForm");
    const editButtons = document.querySelectorAll(".editBtn");

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

    editInput.addEventListener("input", function () {
        validateInput(editInput, sendEdit);
    });

    input.addEventListener("input", function () {
        validateInput(input, sendCreate);
    });

    editButtons.forEach(button => {
        button.addEventListener("click", function() {
            document.getElementById("id").value = this.getAttribute("data-id");
            document.getElementById("edit").value = this.getAttribute("data-name");
            document.getElementById("editColorHex").value = this.getAttribute("data-hex");
            sendEdit.disabled = false;
        });
    });

    editForm.addEventListener("submit", function (event) {
        if (editInput.classList.contains("is-invalid")) {
            event.preventDefault();
        }
    });

    editForm.addEventListener("submit", function(event) {
        event.preventDefault();

        swal({
            title: "¿Confirmar edición?",
            text: "¿Estás seguro de que deseas modificar esta marca?",
            icon: "warning",
            buttons: ["Cancelar", "Sí, actualizar"],
            dangerMode: false,
        }).then((willEdit) => {
            if (willEdit) {
                editForm.submit();
            }
        });
    });
});
