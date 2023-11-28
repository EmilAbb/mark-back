$(document).ready(function () {
    $('.delete-form').on('submit', function (e) {
        e.preventDefault();
        if (confirm('Delete?')) {
            const url = $(this).attr('action')
            const tokenInput = $(this).serializeArray().find(function (input) {
                return input.name == '_token';
            })
            $.ajax({
                method: "POST",
                url:url,
                data:{
                    _method: "delete",
                    _token: tokenInput.value
                },
                success(){
                    window.location.reload()
                }
            })
        }
    })
})


