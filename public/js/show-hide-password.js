function togglePassword(passwordFieldId, confirmPasswordFieldId) {

    var passwordField = document.getElementById(passwordFieldId);
    var confirmPasswordField = document.getElementById(confirmPasswordFieldId);
    var hasConfirmPassword = confirmPasswordField !== null;

    if (passwordField.type === "password") {
        passwordField.type = "text";

        if (hasConfirmPassword) {
            confirmPasswordField.type = "text";
        }

        document.querySelector('.toggle-password').innerText = hidePasswordMessage;
    } else {
        passwordField.type = "password";

        if (hasConfirmPassword) {
            confirmPasswordField.type = "password";
        }

        document.querySelector('.toggle-password').innerText = showPasswordMessage;
    }
}