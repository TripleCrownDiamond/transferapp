window.addEventListener('alert', (event) => {
    let data = event.detail;

    Swal.fire({
        position: data.position,
        icon: data.type,
        title: data.title,
        text: data.text,
        showConfirmButton: false,
        timer: data.timer
    })

});