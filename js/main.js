// autorise

$('button[id="login-btn"]').click(function (e) {

    e.preventDefault();

    $(`input`).removeClass('error');

    let login = $('input[name ="login"]').val();
    let password = $('input[name ="password"]').val();

    $.ajax({
        url: 'includes/signin.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password
        },

        success(data) {

            if (data.status) {
                document.location.href = '/profile.php';
            } else {
                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name='${field}']`).addClass('error')
                    });
                }

                $('.message').removeClass('none').text(data.message);
            }
        }
    });
});

//registration

$('button[id="reg-btn"]').click(function (e) {

    e.preventDefault();

    $(`input`).removeClass('error');

    let full_name = $('input[name ="full_name"]').val();
    let email = $('input[name ="email"]').val();
    let login = $('input[name ="login"]').val();
    let password = $('input[name ="password"]').val();
    let password_confirm = $('input[name ="password_confirm"]').val();

    //let formData = new FormData();
    //formData.append('login', login);
    //formData.append('full_name', full_name);
    //formData.append('email', email);
    //formData.append('password', password);
    //formData.append('password_confirm', password_confirm);
    //formData.append('avatar', avatar);

    $.ajax({
        url: 'includes/signup.php',
        type: 'POST',
        dataType: 'json',
        processData: false, //для отправки аватарки
        contentType: false,
        cache: false,
        data: {
            login: login,
            password: password,
            full_name: full_name,
            email: email,
            password_confirm: password_confirm
        },

        success(data) {

            if (data.status) {
                document.location.href = '/authorise.php';
            } else {
                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name='${field}']`).addClass('error')
                    });
                }

                $('.message').removeClass('none').text(data.message);
            }
        }
    });
});

// avatar give

/*let avatar = false;

$('input[name = "avatar"]').change(function (e) {
    avatar = e.target.files[0];
});*/

