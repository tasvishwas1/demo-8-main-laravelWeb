$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    const table = $('#export-button').DataTable({
        processing: true,
        serverSide: true,
        "bDestroy": true,
        ajax: {
            url: APP_URL + datatable_url,
            type: 'GET',
            data: function (d) {
                d.status = $("#status").val()
            }
        },

        drawCallback: function () {
            setTimeout(function () {
                notify.update('message', '<i class="fa fa-bell-o"></i><strong>Loading</strong> Inner Data.');
            }, 1000);
        },
        language: {
            // processing: '<div class="spinner-border text-primary m-1" role="status"><span class="sr-only">Loading...</span></div>'
        },
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, 'All']]
    })

    $(document).on('click', '.delete-single', function () {
        const value_id = $(this).data('id')

        swal({
            title: 'Delete Record',
            text: 'Are you want to delete this record?',
            icon: "warning",
            buttons: {
                cancel: 'Cancel',
                confirm: 'Delete',
            },
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                deleteRecord(value_id)
            }
        });
    })

    function deleteRecord(value_id) {
        $.ajax({
            method: 'DELETE',
            url: APP_URL + form_url + '/' + value_id,
            success: function (data) {
                swal({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Good Job!',
                    text: data.message,
                    showConfirmButton: false,
                    timer: 1500
                });
                table.draw();
            },
            error: function (data) {
                swal({
                    position: 'top-end',
                    icon: 'success',
                    title: 'We are sorry!',
                    text: data.message,
                    showConfirmButton: false,
                    timer: 1500
                });
                table.draw();
            }
        });
    }

    $(document).on('click', '.status-change', function () {
        const value_id = $(this).data('id');
        const status = $(this).data('status');
        swal({
            title: 'Status Change',
            text: 'Are you sure to ' + status + ' this status',
            icon: "warning",
            buttons: {
                cancel: 'Cancel',
                confirm: 'Yes change it.',
            },
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                changeStatus(value_id, status)
            }
        });

    });

    function changeStatus(value_id, status) {
        $.ajax({
            method: 'GET',
            url: APP_URL + form_url + '/status' + '/' + value_id + '/' + status,
            success: function (data) {
                swal({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Good Job!',
                    text: data.message,
                    showConfirmButton: false,
                    timer: 1500
                });
                table.draw();
            },
            error: function (data) {
                swal({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'We are sorry!',
                    text: data.message,
                    showConfirmButton: false,
                    timer: 1500
                });
                table.draw();
            },
        });
    }

    $(document).on('click', '.detail-button', function () {
        const value_id = $(this).data('id');
        $.ajax({
            method: 'GET',
            url: APP_URL + modal_url + '/' + value_id,
            success: function (response) {
                $('#details_modal_body').html(response.data);
                $('#detailsModal').modal('show');
                table.draw();
            },
            error: function (error) {
                console.log(error);
                table.draw();
            },
        });
    });

    // integerOnly();

})


