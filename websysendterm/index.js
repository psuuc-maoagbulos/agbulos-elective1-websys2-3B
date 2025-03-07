document.getElementById('customerSupportIcon').addEventListener('click', function () {
    document.getElementById('customerSupportFrame').classList.toggle('active');
  });
  
  function closeCustomerSupportFrame() {
    document.getElementById('customerSupportFrame').classList.remove('active');
  }
  