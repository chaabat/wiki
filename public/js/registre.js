let loginform = document.getElementById('loginform');
let signform = document.getElementById('signform');
let toggle = false;


/***************************************************** */
const surname = document.getElementById('surname');
const regsurname = document.getElementById('regsurname');
const username = document.getElementById('username');
const regusername = document.getElementById('regusername');
const tel = document.getElementById('tel');
const regtel = document.getElementById('regtel');
const email = document.getElementById('email');
const regemail = document.getElementById('regemail');
const password = document.getElementById('pass');
const rpassword = document.getElementById('rpassword');
const validsurname = /^[a-zA-Z]{3,}$/;
const validusername = /^[a-zA-Z]{3,}$/;
const validemail = /^(([a-zA-Z]{1,})\d{1,}@[a-z]{1,}\.[a-z]{1,3}|[a-z]+@[a-z]+\.[a-z]{1,3})$/;
const validtel = /^\d{10}$/; 
const validpass = /^.{8,}$/;


surname.addEventListener('input', e => {
    const inputValue = surname.value;
    if (validsurname.test(inputValue)) {
        regsurname.innerText = 'Surname is Valid';
        regsurname.style.color = 'green';
        regsurname.style.display = 'block';
    } else {
        regsurname.innerText = 'at least 3 characters';
        regsurname.style.color = 'red';
        regsurname.style.display = 'block';
        e.preventDefault(e);
    }
});
username.addEventListener('input', e => {
    const inputValue = username.value;
    if (validusername.test(inputValue)) {
        regusername.innerText = 'Username is Valid';
        regusername.style.color = 'green';
        regusername.style.display = 'block';
    } else {
        regusername.innerText = 'at least 3 characters';
        regusername.style.color = 'red';
        regusername.style.display = 'block';
        e.preventDefault(e);
    }
});

email.addEventListener('input', e => {
    const emailValue = email.value;
    if (validemail.test(emailValue)) {
        regemail.innerText = 'email is Valid';
        regemail.style.color = 'green';
        regemail.style.display = 'block';
    } else {
        regemail.innerText = 'email is Invalid';
        regemail.style.color = 'red';
        regemail.style.display = 'block';
        e.preventDefault(e);
    }
});

tel.addEventListener('input', e => {
    const telValue = tel.value;
    if (validtel.test(telValue)) {
        regtel.innerText = 'tel is Valid';
        regtel.style.color = 'green';
        regtel.style.display = 'block';
    } else {
        regtel.innerText = 'enter 10 digits';
        regtel.style.color = 'red';
        regtel.style.display = 'block';
        e.preventDefault(e);
    }
});

password.addEventListener('input', e => {
    const passValue = password.value;
    if (validpass.test(passValue)) {
        rpassword.innerText = 'Password is Valid';
        rpassword.style.color = 'green';
        rpassword.style.display = 'block';
    } else {
        rpassword.innerText = 'at least 8 caracters';
        rpassword.style.color = 'red';
        rpassword.style.display = 'block';
        e.preventDefault(e);
    }
});


$(document).ready(function(){

    function validateFields(input) {

        const field = document.querySelector(`#${input}`);
        let errorCheck = false;

        if (field.value.trim() == "") {

            setStatus(field, `${field.previousElementSibling.innerText} cannot be blank`, "error");
            errorCheck = true;

        } else {

            setStatus(field, null, "success");

        }

        if (field.type === "email") {

        const regex = /^\S+@\S+\.\S+$/;

            if(regex.test(field.value)) {
                setStatus(field, null, "success");
            } else {
                setStatus(field, 'Please enter a valid email address', "error");
                errorCheck = true;
            }
        }

        if (field.type === "password") {

            const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

            if(regex.test(field.value)) {
                setStatus(field, null, "success");
            } else {
                setStatus(field, 'Please enter a valid password', "error");
                errorCheck = true;
            }

        }

        if (field.id === "fullname") {

            const regex = /^[a-z ]+$/;

            if(regex.test(field.value)) {
                setStatus(field, null, "success");
            } else {
                setStatus(field, 'Please enter a valid name', "error");
                errorCheck = true;
            }

        }

        if (field.id === "confirm-password") {

            const confirmField = document.querySelector(`#password`);
            
            if(field.value != confirmField.value) {
                setStatus(field, "Password does not match", "error");
                errorCheck = true;
            } else {
                setStatus(field, null, "success");
            }
        }

        return errorCheck;

    }

    function setStatus(field, message, status) {
        const errorMessage = field.parentElement.querySelector(".error-message");

        if (status === "success") {

            if (errorMessage) {
                errorMessage.innerText = "";
            }

            field.classList.remove("border-2");
            field.classList.remove("border-red-500");
            field.classList.remove("border-solid");

        }

        if (status === "error") {

            field.parentElement.querySelector(".error-message").innerText = message;
            field.classList.add("border-2");
            field.classList.add("border-red-500");
            field.classList.add("border-solid");

        }

    }
      

    $('form input:file').change(function () {
        $('form p').text(this.files.length + " file selected");
    });

    $(document).on('input', 'input', function(event){
        validateFields(event.target.id)
    });


    $(document).on('submit', 'form', function(event){

        event.preventDefault();
        let formData = new FormData(this);

        let errorCheck = false;
        for(const[key, value] of formData) {
            if(key != "picture"){
                if(validateFields(key)){
                    errorCheck = true;
                }
            }
        }

        if(!errorCheck){
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(response){
                    let data = JSON.parse(response);
                }
    
            })
        }

    });

});