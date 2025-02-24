document.addEventListener("DOMContentLoaded", function () {
    
    // Add
    const brandInput = document.getElementById("brand");
    const sendCreate = document.getElementById("sendButton"); 
    
    // Edit
    const editBrandInput = document.getElementById("editBrand");
    const sendEdit = document.getElementById("sendEdit");
    const editBrandForm = document.getElementById("editBrandForm");
    const createBrandForm = document.getElementById("createBrandForm");
    const editButtons = document.querySelectorAll(".editBrandBtn");

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

    editBrandInput.addEventListener("input", function () {
        validateInput(editBrandInput, sendEdit);
    });

    brandInput.addEventListener("input", function () {
        validateInput(brandInput, sendCreate);
    });

    editButtons.forEach(button => {
        button.addEventListener("click", function() {
            document.getElementById("brand_id").value = this.getAttribute("data-id");
            document.getElementById("editBrand").value = this.getAttribute("data-name");
            sendEdit.disabled = false;
        });
    });

    editBrandForm.addEventListener("submit", function (event) {
        if (editBrandInput.classList.contains("is-invalid")) {
            event.preventDefault();
        }
    });

    createBrandForm.addEventListener("submit", function (event) {
        if (brandInput.classList.contains("is-invalid")) {
            event.preventDefault();
        }
    });

    editBrandForm.addEventListener("submit", function(event) {
        event.preventDefault();

        swal({
            title: "¿Confirmar edición?",
            text: "¿Estás seguro de que deseas modificar esta marca?",
            icon: "warning",
            buttons: ["Cancelar", "Sí, actualizar"],
            dangerMode: false,
        }).then((willEdit) => {
            if (willEdit) {
                editBrandForm.submit();
            }
        });
    });
});
