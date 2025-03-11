document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("vehiculoForm");
    const modelInput = document.getElementById("modelo");
    const yearInput = document.getElementById("year-add");
    const imageInput = document.getElementById("imagenInput");
    const submitButton = form.querySelector("button[type='submit']");
    const VALID_NAME_REGEX = /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\s]+$/; 
    const VALID_YEAR_REGEX = /^(19|20)\d{2}$/;

    submitButton.disabled = true;

    function validateField(input, regex) {
        if (!regex.test(input.value.trim())) {
            input.classList.add("is-invalid");
            return false;
        } else {
            input.classList.remove("is-invalid");
            return true;
        }
    }

    function validateModel() {
        validateField(modelInput, VALID_NAME_REGEX);
        validateForm();
    }

    function validateYear() {
        validateField(yearInput, VALID_YEAR_REGEX);
        validateForm();
    }

    function validateImage() {
        return imageInput.files.length > 0;
    }

    function validateForm() {
        const isModelValid = VALID_NAME_REGEX.test(modelInput.value.trim());
        const isYearValid = VALID_YEAR_REGEX.test(yearInput.value.trim());
        const isImageValid = validateImage();
        
        submitButton.disabled = !(isModelValid && isYearValid && isImageValid);
    }

    modelInput.addEventListener("input", validateModel);
    yearInput.addEventListener("input", validateYear);
    imageInput.addEventListener("change", validateForm);
    
    form.addEventListener("submit", function (event) {
        if (submitButton.disabled) {
            event.preventDefault();
        }
    });
});
