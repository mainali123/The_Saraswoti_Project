console.log("loaded successfully")

$(document).ready(function () {

    // Signup
    const signupButton = document.getElementById('signup-button');

    signupButton.addEventListener('click', (event) => {
        console.log("Clicked")
        let name = document.getElementById('register-name').value
        let email = document.getElementById('register-email').value
        let password = document.getElementById('register-password').value

        if (name.length < 3) {
            error('Name should have more than 3 characters', 'Name error');
            return;
        }
        if (password.length < 8) {
            error('Password should contain at least 8 characters', 'Password error')
            return;
        }

        let formData = new FormData();
        formData.append('name', name);
        formData.append('email', email);
        formData.append('password', password);
        formData.append('action', 'signup')

        console.log(formData)

        $.ajax({
            url: '../backend/postHandler.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: (response) => {
                console.log(response)
                if (response.success) {
                    success('You have successfully registered in our website. Please login','Registration Successful')
                } else {
                    error(response.message, 'Registration Failed')
                }
            },
            error: (response) => {
                console.log(response)
            }
        })
    })
})
