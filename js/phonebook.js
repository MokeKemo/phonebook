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

    $('#insertAlert').append('<div id="insertAlert"></div>');
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

            $('#alertText').attr('class', "alert alert-success");
             $('#insertAlert').css('display', "block");
             $('#insertAlert').slideUp(3500);
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
        $('#insertAlert2').attr('class', "alert alert-danger");
        $('#insertAlert2').css('display', "block");
        $('#insertAlert2').slideUp(3500);
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

function searchContacts(search_param)
{
    var data       = {};
    data.case      = 'searchContacts';
    data.parameter = search_param;

    $.ajax({
        url: "../controllers/controller.php",
        type: "POST",
        dataType: "JSON",
        data: data,
        async: true,
        success: [function(data)
        {
            if(data)
            {
                var d_l = data.length;
                $('.tableBody').empty();
                for(var i =0; i < d_l; i++)
                {
                    $('#tableBodyId').append('<tr> <th scope="row">' + (i+1) + '</th> <td>' + data[i]["name"] + '</td> <td>' + data[i]["lastname"] + '</td> <td>' + data[i]["email"] + '</td> <td>' + data[i]["phone"] + '</td></tr>');
                }
            }
        }]
    });

}

function deleteContact()
{
    //console.log(name, lastname, phone);
}






