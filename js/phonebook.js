

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
                window.location.replace(data);
            }
            else{ alert("Your credentials are not correct!"); }
        }]
    });

}

