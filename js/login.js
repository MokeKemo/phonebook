/**
 * Created by nikol on 03-Jan-18.
 */

function login()
{
    var lData = {};

    lData.case   = 'loginData';
    lData.user   = $('#inputEmail').val();
    lData.pass   = $('#inputPassword').val();

    $.ajax({
        url: "controllers/controller.php",
        type: "POST",
        dataType: "JSON",
        data: lData,
        async: true,
        success: [function(data)
        {
            window.location.replace(data);
        }]
    });
}