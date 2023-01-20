$(function () {
    if (typeof localStorage['adetech_user'] !== 'undefined') {
        alert("You are already logged-in");
        window.location = 'home.php';
    }

    $('#login').on("click", function (e) {
        e.preventDefault();

        let uname = $('#uname').val();
        let pass = $('#pass').val();

        if (uname == "" || pass == "") {
            alert("Please input username or password!");
        } else {
            $.post('api/login.php', { uname, pass }, function (res) {
                let data = JSON.parse(res)
                if (typeof data.error === "undefined") {
                    localStorage['adetech_user'] = res;
                    alert("Log in Successful!");
                    if (data.isBranchHead == 1) {
                        window.location = 'home.php';
                    } else {
                        window.location = 'bundle1.php';
                    }
                } else {
                    alert(data.error);
                }
            });
        }
    })

});