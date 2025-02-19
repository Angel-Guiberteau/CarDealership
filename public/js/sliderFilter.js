document.addEventListener("DOMContentLoaded", function () {
    function updateRange(inputMin, inputMax, displayMin, displayMax) {
        inputMin.addEventListener("input", function () {
            if (parseInt(inputMin.value) > parseInt(inputMax.value)) {
                inputMin.value = inputMax.value;
            }
            displayMin.textContent = inputMin.value;
        });

        inputMax.addEventListener("input", function () {
            if (parseInt(inputMax.value) < parseInt(inputMin.value)) {
                inputMax.value = inputMin.value;
            }
            displayMax.textContent = inputMax.value;
        });
    }

    // Precio
    updateRange(
        document.getElementById("precio_min"),
        document.getElementById("precio_max"),
        document.getElementById("precio_min_val"),
        document.getElementById("precio_max_val")
    );

    // Potencia
    updateRange(
        document.getElementById("potencia_min"),
        document.getElementById("potencia_max"),
        document.getElementById("potencia_min_val"),
        document.getElementById("potencia_max_val")
    );
});
