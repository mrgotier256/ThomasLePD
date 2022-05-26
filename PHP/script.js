
function GetProfile() {

    var name = document.getElementById("name").value;
    if (name) {
        console.log(name);
        $.ajax({
            type: 'post',
            url: '../PHP/Class.php',
            data: {
                name: name,
                GetProfile: true,
            },
            success: function (response) {
                $('#resultTyping').html(response);
            }
        });
    }
}


