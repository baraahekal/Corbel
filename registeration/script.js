const form = document.getElementById('form');
const password = document.getElementById('password');
const password2 = document.getElementById('cpassword');


console.log("sadas");

form.addEventListener('submit', e => {
    e.preventDefault();

    validateInputs();
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const validateInputs = () => {
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();
    const ageValue = age.value.trim();

    if (passwordValue === '') {
        setError(password, 'Please type your password');
    } else if (passwordValue.length < 8) {
        setError(password, 'Password should be +8 characters');
    } else if (!passwordValue.match(/[A-Z]/)) {
        setError(password, 'Add upper case letters');
    } else if (!passwordValue.match(/[0-9]/)) {
        setError(password, 'Add numbers');
    } else if (!passwordValue.match(/[!\@\#\$\%\^\&\*\(\)\_\+\=\-\?\/\\\|\}\{\[\]\<\>\}]/)) {
        setError(password, 'Add special characters');
    } else {
        setSuccess(password); 
    }
   
    if(password2Value === '') {
        setError(password2, 'Please confirm your password');
    } else if (password2Value !== passwordValue) {
        setError(password2, "Passwords doesn't match");
    } else {
        setSuccess(password2); 
    }

    if (ageValue === '') {
        setError(age, 'Please type your age'); 
    } else if (ageValue < 15 || ageValue > 99) {
        setError(age, "You can't sign up");
    } else {
        setSuccess(age); 
    }

};
