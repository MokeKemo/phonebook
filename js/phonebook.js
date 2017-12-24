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


    var validation_status = validateContactInput(info.name, info.lastname, info.email, info.phone);

    if(validation_status === 1)
    {
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
             $('#insertAlert').append('<div class="alert alert-success"> <center><strong>Success!</strong> You inserted contact into your phonebook.</center> </div>');
             $('#insertAlert').fadeOut(5000);
             $('#insertAlert').append('<div id="insertAlert"></div>');
             $('#name').val("");
             $('#lastname').val("");
             $('#email').val("");
             $('#phone').val("");

         }

         }]
         });
    }
    else
    {
        if(validation_status[0] == 1) $('#name').css('color', 'red');
        if(validation_status[1] == 1) $('#lastname').css('color', 'red');
        if(validation_status[2] == 1) $('#email').css('color', 'red');
        if(validation_status[3] == 1) $('#phone').css('color', 'red');
        $('#insertAlert2').attr('class', "alert alert-success");
        setTimeout($('#insertAlert2').attr('class', "alert alert-success hidden"), 5000);
        $('#name').css('color', 'black');
        $('#lastname').css('color', 'black');
        $('#email').css('color', 'black');
        $('#phone').css('color', 'black');
    }
}

function validateContactInput(name, lastname, email, phone)
{
    if( validateName(name) && validateName(lastname) && validateEmail(email) && validatePhone(phone) ) return 1;
    else {
        var n = validateName(name), l = validateName(lastname), e = validateEmail(email), p = validatePhone(phone), check = [0,0,0,0];
        //obrada pogresnog unosa
        if(n == 0) check[0] = 1;
        if(l == 0) check[1] = 1;
        if(e == 0) check[2] = 1;
        if(p == 0) check[3] = 1;
        return check;
    }
}

function validateName(name)
{
    var l    = name.length; // broj karaktera u stringu name, odnosno duzina imena
    var ctrl = 0;
    if(name == "" || l < 3) return 0;
    for( var i = 0; i < l; i++ ){
        if(isLetter(name[i])) ctrl++;
    }

    if(ctrl == i && i < 35 && name != "") return 1;
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
    if(monkey > 0 && dots > 0 && email != "") return 1;
    else return 0;
}

function validatePhone(phone)
{
    var ctrl = 0, l = phone.length;
    if(l < 3 || l > 25 || phone == "") return 0;
    for( var i = 0; i < l; i++ ){
        if(isNumber(phone[i])) ctrl++;
    }
    if(ctrl == i && phone != "") return 1;
    else return 0;
}

function visualisation()
{

}














