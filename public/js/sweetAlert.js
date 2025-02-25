function confirmDeleteBrand(brandId,name) {
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

function confirmDeleteType(typeId,name) {
    swal({
        title: "¿Estás seguro?",
        text: "Se eliminara "+name+". ¿Deseas continuar?",
        icon: "warning",
        buttons: ["Cancelar", "Sí, eliminar"],
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            window.location.href = '/deleteType/' + typeId;
        }
    });
}