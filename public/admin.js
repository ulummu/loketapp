function cek() {
    console.log("masuk");
}
function tombolDaftar() {
    const form = document.getElementById("form");
    const namaReg = document.getElementById("namaReg");
    const regNik = document.getElementById("regNik");
    const email = document.getElementById("email");
    const password = document.getElementById("password");

    form.addEventListener("submit", (e) => {
        e.preventDefault();
        e.stopImmediatePropagation();

        checkInputs();
        daftar();
    });

    function checkInputs() {
        // trim to remove the whitespaces
        const namaValue = namaReg.value.trim();
        const emailValue = email.value.trim();
        const passwordValue = password.value.trim();
        const nikValue = regNik.value.trim();

        if (namaValue === "") {
            setErrorFor(namaReg, "Nama tidak boleh kosong");
        } else if (!isNaN(namaReg.value)) {
            setErrorFor(namaReg, "Nama tidak valid");
        } else {
            setSuccessFor(namaReg);
        }
        if (nikValue === "") {
            setErrorFor(regNik, "NIK tidak boleh kosong");
        } else if (regNik.value.length != 16 && !isNaN(regNik.value)) {
            setErrorFor(regNik, "NIK tidak sesuai");
        } else if (isNaN(regNik.value)) {
            setErrorFor(regNik, "NIK yang diinputkan bukan angka");
        } else {
            setSuccessFor(regNik);
        }

        if (emailValue === "") {
            setErrorFor(email, "Email tidak boleh kosong");
        } else if (!isEmail(emailValue)) {
            setErrorFor(email, "Email tidak valid");
        } else {
            setSuccessFor(email);
        }

        if (passwordValue === "") {
            setErrorFor(password, "Password tidak boleh kosong");
        } else {
            setSuccessFor(password);
        }

        // if (
        //     namaValue == true &&
        //     nikValue == true &&
        //     emailValue == true &&
        //     passwordValue == true
        // ) {
        //     daftar();
        // }

        // if (password2Value === "") {
        //     setErrorFor(password2, "Password2 cannot be blank");
        // } else if (passwordValue !== password2Value) {
        //     setErrorFor(password2, "Passwords does not match");
        // } else {
        //     setSuccessFor(password2);
        // }
    }

    function setErrorFor(input, message) {
        const formControl = input.parentElement;
        const small = formControl.querySelector("small");
        formControl.className = "form-floating error";
        small.innerText = message;
    }

    function setSuccessFor(input) {
        const formControl = input.parentElement;
        formControl.className = "form-floating success";
    }

    function isEmail(email) {
        return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
            email
        );
    }

    function daftar() {
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            method: "POST",
            url: "./register/daftar/",
            dataType: "json",
            data: {
                nama: $("#namaReg").val(),
                nik: $("#regNik").val(),
                email: $("#email").val(),
                password: $("#password").val(),
            },
            success: function (data) {
                window.location.href = "/dashboard";
            },
            error: function (data) {},
        });
    }
}

function tombolLogin() {
    const form = document.getElementById("form");
    const loginNik = document.getElementById("loginNik");
    const password = document.getElementById("loginPassword");

    form.addEventListener("submit", (e) => {
        e.preventDefault();
        e.stopImmediatePropagation();

        checkInputs();
    });

    function checkInputs() {
        // trim to remove the whitespaces
        const passwordValue = password.value.trim();
        const nikValue = loginNik.value.trim();

        if (nikValue === "") {
            setErrorFor(loginNik, "NIK tidak boleh kosong");
        } else if (loginNik.value.length != 16 && !isNaN(loginNik.value)) {
            setErrorFor(loginNik, "NIK tidak sesuai");
        } else if (isNaN(loginNik.value)) {
            setErrorFor(loginNik, "NIK yang diinputkan bukan angka");
        } 
        // else {
        //     setSuccessFor(loginNik);
        // }

        if (passwordValue === "") {
            setErrorFor(password, "Password tidak boleh kosong");
        } 
        // else {
        //     setSuccessFor(password);
        // }

        if (loginNik.value.length === 16 && passwordValue != "") {
            login();
        }
    }

    function setErrorFor(input, message) {
        const formControl = input.parentElement;
        const small = formControl.querySelector("small");
        formControl.className = "form-floating error";
        small.innerText = message;
    }

    function setSuccessFor(input) {
        const formControl = input.parentElement;
        formControl.className = "form-floating success";
    }
}
function login() {
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        method: "GET",
        url: "./admin/login/",
        dataType: "json",
        data: {
            nik: $("#loginNik").val(),
            password: $("#loginPassword").val(),
        },
        success: function (data) {
            window.location.href = "/dashboard";
        },
        error: function (data) {
            if (data == 1) {
                $("#alertNik").show();
            } else if (data == 2) {
                $("#alertPass").show();
            }
        },
    });
}
