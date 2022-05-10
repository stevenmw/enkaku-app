function validation(){
  var form = document.getElementById("form");
  var email = document.getElementById("email").value;

  var form = document.getElementById("form");
  var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

// ====== Email validation =========
  if (email.match(pattern))
  {
    form.classList.add("valid");
    form.classList.remove("invalid");
    text.innerHTML = "Your Email Addres in Valid.";
    text.style.color = "#379683";
  }
  else
  {
    form.classList.remove("valid");
    form.classList.add("invalid");
    text.innerHTML = "Please Enter Valid Email Address!";
    text.style.color = "#ff0000";
  }

  if (email == "")
  {
    form.classList.remove("valid");
    form.classList.remove("invalid");
    text.innerHTML = "";
    text.style.color = "#379683";
  }
}

// Password Strength Checker
var password = document.getElementById('password').value;

password.onkeyup = function (event) {
  handleChange(password)
}

function handleChange(password) {
  var pwd = password.value

  var progresslabel = document.getElementById('#progresslabel').value
  var progress = 0;
  var strength = '0';

  switch (pwd.length) {
    case 1:
      strength = '12.5%';
      progress = 12;
      break;
    case 2:
      strength = '25%';
      progress = 25;
      break;
    case 3:
      strength = '37.5%';
      progress = 37.5;
      break;
    case 4:
      strength = '50%';
      progress = 50;
      break;
    case 5:
      strength = '62.5%';
      progress = 62.5;
      break;
    case 6:
      strength = '75%';
      progress = 75;
      break;
    case 7:
      strength = '87.5%';
      progress = 87.5;
      break;
    case 8:
      strength = '100% - Password strength is good';
      progress = 100;
      break;
  }

  // Number, a CAPS, lowercaps and special character.
  let regexp = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;
  if (regexp.test(pwd)) {
    // Display it
    progresslabel.innerHTML = strength;
    document.getElementById("progress").value = progress;
  } else {
    progresslabel.innerHTML = '1 Cap, 1 digit, 8 digits atleast.'
  }
}

// ====== Confirm Password matching validation =======
$('#password, #confirm_password').on('keyup', function () {
if ($('#password').val() == $('#confirm_password').val()) {
  $('#message').html('Confirm Password Matched').css('color', '#3AAFA9');
} else 
  $('#message').html('Confirm Password Not Match').css('color', 'red');
});