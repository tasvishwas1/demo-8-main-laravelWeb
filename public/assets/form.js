$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    let $form = $('#addEditForm')
    $form.on('submit', function (e) {
        e.preventDefault();
        let formData = new FormData($form[0])
        $.ajax({
            method: 'POST',
            url: APP_URL + formUrl,
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                swal({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Good Job',
                    text: data.message,
                    showConfirmButton: false,
                    timer: 1500
                });
                setTimeout(function () {
                    window.location.href = APP_URL + redirect_url
                }, 1500);
            },
            error: function (error) {
                swal({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'We are sorry!',
                    text: 'SOMETHING WENT WRONG',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    })

    // integerOnly();
})

