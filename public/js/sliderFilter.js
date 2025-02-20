document.addEventListener("DOMContentLoaded", function () {
    function updateRange(inputMin, inputMax, displayMin, displayMax, track) {
        function updateTrack() {
            let minVal = parseInt(inputMin.value);
            let maxVal = parseInt(inputMax.value);
            let rangeMin = parseInt(inputMin.min);
            let rangeMax = parseInt(inputMax.max);

            let minPercent = ((minVal - rangeMin) / (rangeMax - rangeMin)) * 100;
            let maxPercent = ((maxVal - rangeMin) / (rangeMax - rangeMin)) * 100;

            track.style.background = `linear-gradient(to right, #ccc ${minPercent}%, #C9A66B ${minPercent}%, #C9A66B ${maxPercent}%, #ccc ${maxPercent}%)`;

            displayMin.textContent = minVal;
            displayMax.textContent = maxVal;
        }

        inputMin.addEventListener("input", function () {
            if (parseInt(inputMin.value) > parseInt(inputMax.value)) {
                inputMin.value = inputMax.value;
            }
            updateTrack();
        });

        inputMax.addEventListener("input", function () {
            if (parseInt(inputMax.value) < parseInt(inputMin.value)) {
                inputMax.value = inputMin.value;
            }
            updateTrack();
        });

        updateTrack(); // Inicializar la barra
    }

    // Precio
    let precioContainer = document.getElementById("precio_min").closest(".range-container");
    updateRange(
        document.getElementById("precio_min"),
        document.getElementById("precio_max"),
        document.getElementById("precio_min_val"),
        document.getElementById("precio_max_val"),
        precioContainer.querySelector(".slider-track")
    );

    // Potencia
    let potenciaContainer = document.getElementById("potencia_min").closest(".range-container");
    updateRange(
        document.getElementById("potencia_min"),
        document.getElementById("potencia_max"),
        document.getElementById("potencia_min_val"),
        document.getElementById("potencia_max_val"),
        potenciaContainer.querySelector(".slider-track")
    );

    // Botón Restablecer
    const resetButton = document.getElementById("reset");
    resetButton.addEventListener("click", function () {
        // Restablecer selectores
        document.getElementById("marca").selectedIndex = 0;
        document.getElementById("color").selectedIndex = 0;

        // Restablecer input de modelo
        document.getElementById("modelo").value = "";

        // Restablecer rangos de precio
        document.getElementById("precio_min").value = 5000;
        document.getElementById("precio_max").value = 100000;
        document.getElementById("precio_min_val").textContent = "5000";
        document.getElementById("precio_max_val").textContent = "100000";
        updateRange(
            document.getElementById("precio_min"),
            document.getElementById("precio_max"),
            document.getElementById("precio_min_val"),
            document.getElementById("precio_max_val"),
            precioContainer.querySelector(".slider-track")
        );

        // Restablecer rangos de potencia
        document.getElementById("potencia_min").value = 50;
        document.getElementById("potencia_max").value = 1000;
        document.getElementById("potencia_min_val").textContent = "50";
        document.getElementById("potencia_max_val").textContent = "1000";
        updateRange(
            document.getElementById("potencia_min"),
            document.getElementById("potencia_max"),
            document.getElementById("potencia_min_val"),
            document.getElementById("potencia_max_val"),
            potenciaContainer.querySelector(".slider-track")
        );
    });
});