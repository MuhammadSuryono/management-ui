$(document).on('click', 'button.link', function (e) {
    e.preventDefault()
    const pageURL = $(this).attr('data-href');
    history.pushState("", null, pageURL)

    $.ajax({
        success: function() {
            window.location.href = pageURL
        }
    })
})