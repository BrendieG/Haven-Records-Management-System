document.getElementById("user_password1").addEventListener("keyup", validatePassword);
document.getElementById("confirm_password").addEventListener("keyup", confirmPass);

function validatePassword() {
    const pass_input = document.getElementById("user_password1").value;
    const passDiv = document.getElementById("password_field1");
    const errorSpan2 = document.getElementById("password_error1");
    
    // Regular expression for password that has to have a minimum of eight characters, at least one letter and one number
    const passRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    const passtest = passRegex.test(pass_input);
    
    if (passtest) {
        passDiv.style.borderColor = "green";
        errorSpan2.textContent = "";
        errorSpan2.style.display = "none"; // Hide the error message
    } else {
        passDiv.style.borderColor = "red";
        errorSpan2.style.display = "block"; // Show the error message
        errorSpan2.textContent = "Password must be at least 8 characters long and contain at least one letter and one number.";
    }
}

function confirmPass() {
    const pass_input = document.getElementById("user_password1").value;
    const confirmPass_input = document.getElementById("confirm_password").value;
    const confirmPassDiv = document.getElementById("confirm_password_field");
    const errorSpan3 = document.getElementById("confirm_password_error");

    if (pass_input === confirmPass_input) {
        confirmPassDiv.style.borderColor = "green";
        errorSpan3.textContent = "";
        errorSpan3.style.display = "none"; // Hide the error message
    } else {
        confirmPassDiv.style.borderColor = "red";
        errorSpan3.style.display = "block"; // Show the error message
        errorSpan3.textContent = "Password does not match.";
    }
}
