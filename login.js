function authenticateUser(email, password) {
  // Check if the email and password combination is correct
  if (email === '123' && password === '123') {
    // Redirect the user to the next page
    window.location.href = 'http://www.google.com';
  } else {
    // Display an error message indicating that the password is incorrect
    alert('Incorrect password. Please try again.');
  }
}
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');

// Get the user's inputted email and password
const email = emailInput.value;
const password = passwordInput.value;

// Call the authenticateUser function with the inputted email and password
authenticateUser(email, password);
