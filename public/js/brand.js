document.addEventListener("DOMContentLoaded", function () {
    const brandInput = document.getElementById("brand");
    const brandForm = document.getElementById("brandForm");
    const sendButton = document.getElementById("sendButton");

    sendButton.disabled = true;

    brandInput.addEventListener("input", function () {
        const regex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/; // Characters allowed: letters, spaces and accents
        if (!regex.test(brandInput.value)) {
            brandInput.classList.add("is-invalid");
            sendButton.disabled = true;
        } else {
            brandInput.classList.remove("is-invalid");
            sendButton.disabled = false;
        }
    });

    brandForm.addEventListener("submit", function (event) {
        if (brandInput.classList.contains("is-invalid")) {
            event.preventDefault();
        }
    });
});