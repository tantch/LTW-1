//TODO validar no caso de browsers antigos

document.addEventListener("DOMContentLoaded",function() {
	var firstNameInput = document.getElementById("firstname");
	firstNameInput.pattern = "^[a-zA-Z][a-zA-Z-_\.]{1,20}$";
	var lastNameInput = document.getElementById("lastname");
	lastNameInput.pattern = "^[a-zA-Z][a-zA-Z-_\.]{1,20}$";
	var usernameInput = document.getElementById("username");
	usernameInput.pattern = "^[A-Za-z0-9_]{2,15}$";
	var emailInput = document.getElementById("email");
	var pwInput = document.getElementById("password");
	pwInput.pattern = "(?=^.{8,}$)((?=.*[0-9])|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$";
	var pwCInput = document.getElementById("cpassword");

	firstNameInput.addEventListener("keyup",function() {
		firstNameInput.setCustomValidity(this.validity.patternMismatch ? "First Name must contain only letters and can't be bigger than 20 characters": "");
			}, false);
	lastNameInput.addEventListener("keyup",function() {
		lastNameInput.setCustomValidity(this.validity.patternMismatch ? "Last Name must contain only letters and can't be bigger than 20 characters": "");
	}, false);
	usernameInput.addEventListener("keyup",function() {
		lastNameInput.setCustomValidity(this.validity.patternMismatch ? "Username must contain only letters and numbers and can't be bigger than 15 characters": "");
	}, false);
	emailInput.addEventListener("keyup",function() {
		lastNameInput.setCustomValidity(this.validity.patternMismatch ? "Please enter a valid email": "");
	}, false);
	pwInput.addEventListener("keyup",function() {
				this.setCustomValidity(this.validity.patternMismatch ? "Password must contain capital letters,numbers and length bigger than 8": "");
				if (this.checkValidity()) {
					pwCInput.pattern = this.value;
					pwCInput
					.setCustomValidity("Password is not the same");
				} else {
					pwCInput.pattern = this.pattern;
					pwCInput.setCustomValidity("");
				}
			}, false);
	pwCInput.addEventListener("keyup",function() {
				this.setCustomValidity(this.validity.patternMismatch ? "Please input password": "");
			}, false);

}, false);