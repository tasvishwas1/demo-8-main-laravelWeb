$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    loadCharts();

    $(document).on('click', '#load_charts', function (e) {
        e.preventDefault();
        loadCharts();
    });

    function loadCharts() {
        $.ajax({
            method: 'POST',
            url : APP_URL + 'charts-loading',
            success: function (data) {
                //
            },
            error: function (data) {
                //
            },
        })
    }
});
