//**********************************************************************************************************************
//                           ___ _____  ______ _____ _      _____
//                          |_  /  ___| |  ___|_   _| |    |  ___|
//                            | \ `--.  | |_    | | | |    | |__
//                            | |`--. \ |  _|   | | | |    |  __|
//                        /\__/ /\__/ / | |    _| |_| |____| |___
//                        \____/\____/  \_|    \___/\_____/\____/
//**********************************************************************************************************************

//
function getContactInfo(){
    var info = {};

    info.case     = 'contactInfo';
    info.name     = $('#name').val();
    info.lastname = $('#lastname').val();
    info.email    = $('#email').val();
    info.phone    = $('#phone').val();


    console.log(validateContactInput(info.name, info.lastname, info.email, info.phone));

    //console.log(validateName(info.name));
    //console.log(validateName(info.lastname));
    //console.log(validateEmail(info.email));
    //console.log(validatePhone(info.phone));

   /* $.ajax({
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
    });*/

}

function validateContactInput(name, lastname, email, phone)
{
    if( validateName(name) && validateName(lastname) && validateEmail(email) && validatePhone(phone) ) return 1;
    else return 0;
}

function validateName(name)
{
    var l    = name.length; // broj karaktera u stringu name, odnosno duzina imena
    var ctrl = 0;
    if(name == "" || l < 3) return 0;
    for( var i = 0; i < l; i++ ){
        if(isLetter(name[i])) ctrl++;
    }

    if(ctrl == i && i < 35) return 1;
    else return 0;
}

function isLetter(str)
{
    return str.length === 1 && str.match(/[a-z]/i);
}

function isNumber(str)
{
    return str.length === 1 && str.match(/[0-9]/i);
}

function validateEmail(email)
{
    var monkey = 0, dots = 0, l = email.length;

    for( var i = 0; i < l; i++ ){
        if(email[i] == '@') monkey++;
        if(email[i] == '.') dots++;
    }
    if(monkey > 0 && dots > 0) return 1;
    else return 0;
}

function validatePhone(phone)
{
    var ctrl = 0, l = phone.length;
    if(l < 3 || l > 25 || phone == "") return 0;
    for( var i = 0; i < l; i++ ){
        if(isNumber(phone[i])) ctrl++;
    }
    if(ctrl == i) return 1;
    else return 0;
}









