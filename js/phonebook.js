    // the dom is in place, but everything is not necessarily loaded


function getContactInfo(){
    var info = {};

    info.name     = $('#name').val();
    info.lastname = $('#lastname').val();
    info.email    = $('#email').val();
    info.phone    = $('#phone').val();

    console.log(info);
}

