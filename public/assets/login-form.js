$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    let $form = $('#addEditForm')
    $form.on('submit', function (e) {
        console.log('xxx1111');

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
                    window.location.href = redirect_url
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

    // $("#country_id").on('change', function () {
    //     $.ajax({
    //         type: "POST",
    //         url: APP_URL + '/getCity',
    //         dataType: "html",
    //         data: {country_id: $("#country_id").val()},
    //         success: function (data) {
    //             $("#city_id").html(data);
    //             $('#city_id').multiSelect('refresh');
    //             loaderHide();
    //         },
    //         error: function (data) {
    //             console.log('Error:', data);
    //             loaderHide();
    //         }
    //     });
    //
    //     axios
    //         .post(APP_URL + '/getCity', {country_id: $(this).val()},{
    //             responseType:'html'
    //         })
    //         .then(function (response) {
    //             $("#city_id").html(response.data)
    //             $('#city_id').multiSelect('refresh');
    //             loaderHide();
    //         })
    //         .catch(function (error) {
    //             notificationToast(error.response.data.message, 'warning')
    //             loaderHide();
    //         });
    // })

    // $(".city_id").on('change', function () {
    //     axios
    //         .post(APP_URL + '/getArea', {city_id: $(this).val()})
    //         .then(function (response) {
    //             $('#area_id').html(response.data)
    //             loaderHide();
    //         })
    //         .catch(function (error) {
    //             notificationToast(error.response.data.message, 'warning')
    //             loaderHide();
    //         });
    // })

    // integerOnly();
})

