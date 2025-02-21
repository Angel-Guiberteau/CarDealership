document.addEventListener("DOMContentLoaded", function () {
    const editBrandInput = document.getElementById("editBrand");
    const sendEdit = document.getElementById("sendEdit");
    const editBrandForm = document.getElementById("editBrandForm");
    const editButtons = document.querySelectorAll(".editBrandBtn");

    const VALID_NAME_REGEX = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/; // Characters allowed: letters, spaces and accents

    sendEdit.disabled = true;

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
});
