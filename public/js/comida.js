function actualizarPreciosComidas() {
    Swal.fire({
        title: '¿Actualizar precios?',
        text: "Se consultarán los precios en la API y se actualizarán en tu base de datos.",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, actualizar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Actualizando precios...',
                text: 'Por favor espera unos segundos.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            fetch('/comidas/actualizar', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Precios actualizados!',
                        text: data.message,
                        timer: 2500
                    }).then(() => {
                        // Recargar tabla después de actualizar
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'No se pudieron actualizar los precios.'
                    });
                }
            })
            .catch(() => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un problema al conectar con la API.'
                });
            });
        }
    });
}