/**
 *
 * Reusable Functions
 *
 */

function imagePreview(input, selector) {
    if (input.files && input.files[0]) {
        var render = new FileReader();

        render.onload = function (e) {
            $(selector).attr('src', e.target.result)
        }

        render.readAsDataURL(input.files[0]);
    }
}

function searchUsers(query){
    $.ajax({
        method: "GET",
        url: '/messenger/search',
        data: {query:query},
        success: function (data){
            $('.user_search_list_result').html(data.records);
        }, error : function (xhr, status, error){

        }
    })
}

function debounce(callback, delay) {
    let timerId;
    return function (...args) {
        clearTimeout(timerId);
        timerId = setTimeout(() => {
            callback.apply(this, args);
        }, delay)
    }
}


/**
 * -----------------------------------
 * On Dom Load
 * -----------------------------------
 */

$(document).ready(function () {
    $('#select_file').change(function () {
        imagePreview(this, '.profile-image-preview')
    });


    /** Search Action on Keyup */
    const debouncedSearch = debounce(function () {
        const value = $('.user_search').val();
        searchUsers(value);
    }, 500);

    $('.user_search').on('keyup', function () {
        let query = $(this).val();
        if (query.length > 0) {
            debouncedSearch();
        }
    })
});
