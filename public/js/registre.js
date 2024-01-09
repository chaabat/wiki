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
