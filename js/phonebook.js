

function getContactInfo(){
    var info = {};

    info.case     = 'contactInfo';
    info.name     = $('#name').val();
    info.lastname = $('#lastname').val();
    info.email    = $('#email').val();
    info.phone    = $('#phone').val();

    //console.log(info);

    $.ajax({
        url: "../controllers/controller.php",
        type: "POST",
        dataType: "JSON",
        data: info,
        async: true,
        success: [function(data)
        {
            if(data != 0)
            {
                //$('#insertAlert').attr('class', "");
                $('#insertAlert').attr('class', "alert alert-success");
                $('#insertAlert').fadeOut(5000);
                $('#name').val("");
                $('#lastname').val("");
                $('#email').val("");
                $('#phone').val("");

            }
            else{ alert("Your credentials are not correct!"); }
        }]
    });

}

