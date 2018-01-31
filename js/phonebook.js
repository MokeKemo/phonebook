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
    if(email=="") return 1; //email nije obavezan, pa moze ostati prazan
    else
    {
        var monkey = 0, dots = 0, l = email.length;

        for (var i = 0; i < l; i++) {
            if (email[i] == '@') monkey++;
            if (email[i] == '.') dots++;
        }
        if (monkey > 0 && dots > 0) return 1;
        else return 0;
    }
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
    var data       = {}, id = "";
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
                {   id = data[i]["id"]
                    $('#tableBodyId').append('<tr id="trow'+(i+1)+'"> <th scope="row">' + (i+1) + '</th><td class="hidden" id="dbElement'+ (i+1) +'">'+ id +'</td> <td id="name'+(i+1)+'">' + data[i]["name"] + '</td> <td id="lastname'+(i+1)+'">' + data[i]["lastname"] + '</td> <td id="email'+(i+1)+'">' + data[i]["email"] + '</td> <td id="phone-'+(i+1)+'">' + data[i]["phone"] + '</td><td><button onclick="editedValues('+(i+1)+');" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">E</button></td><td><button onclick="deleteContactFromSearch('+(i+1)+');" type="button" class="btn btn-danger">D</button></td></tr>');
                }
            }
        }]
    });

}

function deleteContact(id)
{
    var data = {};

    data.case = 'deleteContact';
    data.name = $('#name' + id).text();
    data.lastname = $('#lastname' + id).text();
    data.phone = $('#phone-' + id).text();

    //console.log(data);
    var del = confirm('Do you really want to delete this contact?');
    if(del) {
        $.ajax({
            url: "../controllers/controller.php",
            type: "POST",
            dataType: "JSON",
            data: data,
            async: true,
            success: [function (data) {
                if (data) {
                    $('#trow' + id).remove();
                    alert('You removed contact!!!');
                }

            }]
        });
    }
}

function deleteContactFromSearch(id)
{
    var data = {};

    data.case = 'deleteContact';
    data.name = $('#name' + id).text();
    data.lastname = $('#lastname' + id).text();
    data.phone = $('#phone-' + id).text();

    //console.log(data);
    var del = confirm('Do you really want to delete this contact?');
    if(del) {
        $.ajax({
            url: "../controllers/controller.php",
            type: "POST",
            dataType: "JSON",
            data: data,
            async: true,
            success: [function (data) {
                if (data) {
                    $('#trow' + id).remove();
                    alert('You removed contact!!!');
                }

            }]
        });
    }
}

function editedValues(id)
{
    var data = {};

    data.name     = $('#name' + id).text();
    data.lastname = $('#lastname' + id).text();
    data.email    = $('#email' + id).text();
    data.phone    = $('#phone-' + id).text();
    data.rid      = $('#dbElement' + id).text();

    $('#lName').val(data.name);
    $('#lLastname').val(data.lastname);
    $('#lEmail').val(data.email);
    $('#lPhone').val(data.phone);
    $('#real_id').val(data.rid);
}

function editContact(id)
{
    var data = {};

    data.case     = 'editContact';
    data.name     = $('#lName').val();
    data.lastname = $('#lLastname').val();
    data.email    = $('#lEmail').val();
    data.phone    = $('#lPhone').val();
    data.rid      = $('#real_id').val();

    $.ajax({
        url: "../controllers/controller.php",
        type: "POST",
        dataType: "JSON",
        data: data,
        async: true,
        success: [function (data) {
            if (data) {
                alert('Contact updated!');
                window.location.reload();
            }

        }]
    });
}

