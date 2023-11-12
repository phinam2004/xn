document.getElementById("registrationForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission
  
    // Get input values
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var position = document.getElementById("chucvu").value;
  
    // Perform form validation
    if (name === "" || email === "" || phone === "" || chucvu === "" ) {
      document.getElementById("message").innerHTML = "Vui lòng điền đầy đủ thông tin.";
    } else {
      document.getElementById("message").innerHTML = "Đăng ký thành công!";
      // You can perform further processing or submit the form data to a server here
    }
  });