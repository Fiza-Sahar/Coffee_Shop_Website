document.addEventListener('DOMContentLoaded', function() {
  const toggleButton = document.querySelector('.toggle-button');
  const navLinks = document.querySelector('.nav-links');

  toggleButton.addEventListener('click', function() {
    navLinks.classList.toggle('active');
    toggleButton.classList.toggle('active');
  });

  document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    const emailInput = document.getElementById('email');
    const emailValue = emailInput.value;
    const messageContainer = document.getElementById('message');

    // Validate the email address
    if (!emailValue.endsWith('@gmail.com')) {
      messageContainer.innerHTML = '<p>Please enter a valid Gmail address.</p>';
      messageContainer.style.display = 'block';
      messageContainer.style.color = 'red'; // Optional: color the error message red
      return; // Stop form submission if email is invalid
    }

    // Display the success message
    messageContainer.innerHTML = '<p>Thank you for your booking request! We will get back to you soon.</p>';
    messageContainer.style.display = 'block';
    messageContainer.style.color = 'green'; // Optional: color the success message green

    // Show an alert box
    alert('Thank you for your booking request! We will get back to you soon.');

    // Optionally, clear the form fields
    this.reset();
  });
});
