function confirmDelete(brandId,name) {
    swal({
        title: "¿Estás seguro?",
        text: "Se eliminara "+name+". ¿Deseas continuar?",
        icon: "warning",
        buttons: ["Cancelar", "Sí, eliminar"],
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
        buttons: ["Cancelar", "Sí, editar"],
        dangerMode: true,
    })
    .then((willEdit) => {
        if (willEdit) {
            window.location.href = '/updateBrand/' + brandId;
        }
    });
}