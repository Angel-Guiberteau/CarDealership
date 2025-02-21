function confirmDelete(brandId, name) {
    swal({
        title: "¿Estás seguro?",
        text: "Se eliminará " + name + ". ¿Deseas continuar?",
        icon: "warning",
        buttons: {
            cancel: {
                text: "Cancelar",
                value: null,
                visible: true,
                className: "swal-button--center",
                closeModal: true,
            },
            confirm: {
                text: "Sí, eliminar",
                value: true,
                visible: true,
                className: "swal-button--center",
                closeModal: true
            }
        },
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            window.location.href = '/deleteBrand/' + brandId;
        }
    });
}

function confirmEdit(brandId) {
    swal({
        title: "¿Estás seguro?",
        text: "¿Deseas editar este registro?",
        icon: "warning",
        buttons: {
            cancel: {
                text: "Cancelar",
                value: null,
                visible: true,
                className: "swal-button--center",
                closeModal: true,
            },
            confirm: {
                text: "Sí, editar",
                value: true,
                visible: true,
                className: "swal-button--center",
                closeModal: true
            }
        },
        dangerMode: true,
    })
    .then((willEdit) => {
        if (willEdit) {
            window.location.href = '/updateBrand/' + brandId;
        }
    });
}