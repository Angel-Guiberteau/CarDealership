document.addEventListener("DOMContentLoaded", function () {
    const editTypeInput = document.getElementById("editType");
    const sendEdit = document.getElementById("sendEdit");
    const editTypeForm = document.getElementById("editTypeForm");
    const editButtons = document.querySelectorAll(".editTypeBtn");
    const editForm = document.getElementById("editTypeForm");

    const VALID_NAME_REGEX = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/; // Characters allowed: letters, spaces and accents

    sendEdit.disabled = true;

    editButtons.forEach(button => {
        button.addEventListener("click", function() {
            document.getElementById("type_id").value = this.getAttribute("data-id");
            editTypeInput.value = this.getAttribute("data-name");
        });
    });

    editTypeInput.addEventListener("input", function () {
        if (!VALID_NAME_REGEX.test(editTypeInput.value)) {
            editTypeInput.classList.add("is-invalid");
            sendEdit.disabled = true;
        } else {
            editTypeInput.classList.remove("is-invalid");
            sendEdit.disabled = false;
        }
    });

    editButtons.forEach(button => {
        button.addEventListener("click", function() {
            const typeId = this.getAttribute("data-id");
    
            document.getElementById("type_id").value = typeId;
            sendEdit.disabled = false;
        });
    });
    

    editTypeForm.addEventListener("submit", function (event) {
        if (editTypeInput.classList.contains("is-invalid")) {
            event.preventDefault();
        }
    });

    editForm.addEventListener("submit", function(event) {
        event.preventDefault(); 

        swal({
            title: "¿Confirmar edición?",
            text: "¿Estás seguro de que deseas modificar este tipo?",
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