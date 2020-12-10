
var table = dataTablesCreated();

function dataTablesCreated() {
    $.ajax({
        type: "POST",
        url: base_url + "/User/allUsers",
        dataType: "json",
        success: function (response) {
            $.each(response.data, function (index, value) {
                $('#data-column').append(value);
            });
        }
    });
}

// $(document).ready(function () {
//     $.ajax({
//         type: "POST",
//         url: base_url + "/Users/allUsers",
//         dataType: "json",
//         success: function (response) {
//             console.log(response);
//         }
//     });
// });