document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault();
  
    // Ambil data form
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var message = document.getElementById('message').value;
  
    // Kirim email menggunakan EmailJS
    emailjs.send('YOUR_SERVICE_ID', 'YOUR_TEMPLATE_ID', {
      name: name,
      email: email,
      phone: phone,
      message: message
    })
    .then(function(response) {
      document.getElementById('result').innerHTML = 'Email sent successfully!';
    }, function(error) {
      document.getElementById('result').innerHTML = 'Failed to send email. Please try again later.';
    });
  });
  