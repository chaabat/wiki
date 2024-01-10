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
    const submitBtn = document.getElementById('submitBtn');

    const validsurname = /^[a-zA-Z]{3,}$/;
    const validusername = /^[a-zA-Z]{3,}$/;
    const validemail = /^(([a-zA-Z]{1,})\d{1,}@[a-z]{1,}\.[a-z]{1,3}|[a-z]+@[a-z]+\.[a-z]{1,3})$/;
    const validtel = /^\d{10}$/;
    const validpass = /^.{8,}$/;

    const isFormValid = () => validsurname.test(surname.value)
        && validusername.test(username.value)
        && validemail.test(email.value)
        && validtel.test(tel.value)
        && validpass.test(password.value);

    const updateButtonColor = () => {
        submitBtn.style.backgroundColor = isFormValid() ? 'green' : 'red';
    };

    submitBtn.disabled = !isFormValid();

    const updateValidity = (field, validation, errorElement, comment) => {
        const inputValue = field.value;
        if (validation.test(inputValue)) {
            errorElement.innerText = `${field.name} is Valid`;
            errorElement.style.color = 'green';
            errorElement.style.display = 'block';
        } else {
            errorElement.innerText = comment; 
            errorElement.style.color = 'red';
            errorElement.style.display = 'block';
        }
        submitBtn.disabled = !isFormValid(); 
        updateButtonColor();
    };

    surname.addEventListener('input', () => updateValidity(surname, validsurname, regsurname, 'at least 3 characters'));
    username.addEventListener('input', () => updateValidity(username, validusername, regusername, 'at least 3 characters'));
    email.addEventListener('input', () => updateValidity(email, validemail, regemail, 'Invalid email address'));
    tel.addEventListener('input', () => updateValidity(tel, validtel, regtel, 'Enter 10 digits'));
    password.addEventListener('input', () => updateValidity(password, validpass, rpassword, 'at least 8 characters'));