document.addEventListener("DOMContentLoaded", function () {
    const editBrandInput = document.getElementById("editBrand");
    const sendEdit = document.getElementById("sendEdit");
    const editBrandForm = document.getElementById("editBrandForm");
    const editButtons = document.querySelectorAll(".editBrandBtn");
    const editForm = document.getElementById("editBrandForm");

    const VALID_NAME_REGEX = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/; // Characters allowed: letters, spaces and accents

    sendEdit.disabled = true;

    document.querySelectorAll(".editBrandBtn").forEach(button => {
        button.addEventListener("click", function() {
            document.getElementById("brand_id").value = this.getAttribute("data-id");
            document.getElementById("editBrand").value = this.getAttribute("data-name");
        });
    });

    editBrandInput.addEventListener("input", function () {
        if (!VALID_NAME_REGEX.test(editBrandInput.value)) {
            editBrandInput.classList.add("is-invalid");
            sendEdit.disabled = true;
        } else {
            editBrandInput.classList.remove("is-invalid");
            sendEdit.disabled = false;
        }
    });

    editButtons.forEach(button => {
        button.addEventListener("click", function() {
            const brandId = this.getAttribute("data-id");
    
            document.getElementById("brand_id").value = brandId;
            sendEdit.disabled = false;
        });
    });
    

    editBrandForm.addEventListener("submit", function (event) {
        if (editBrandInput.classList.contains("is-invalid")) {
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