function searchCustomer() {
    var customerName = $("#customerName").val();

    $.ajax({
        url: 'search_customer.php',
        type: 'POST',
        data: { customerName: customerName },
        success: function(response) {
            $("#customerInfo").html(response);
        }
    });
}

function loadRoomNames() {
    $.ajax({
        url: 'get_room_names.php',
        type: 'GET',
        success: function(response) {
            $("#roomName").html(response);
        }
    });
}

function addReservation() {
    var reserve_no = $("#reserve_no").val();
    var reservationDate = $("#reserveDate").val(); // Change to reservationDate
    var roomName = $("#roomName").val();

    $.ajax({
        url: 'add_reservation.php',
        type: 'POST',
        data: { reserve_no: reserve_no, reserveDate: reservationDate, roomName: roomName },
        dataType: 'json',  // Specify JSON data type for the response
        success: function(response) {
            if (response.success) {
                // Reload the reservation table
                loadReservationTable();
                console.log(response.message);
            } 
        },
        error: function(_xhr, status, error) {
            console.error('AJAX error: ' + status + ' - ' + error);
        }
    });
}



function loadReservationTable() {
    $.ajax({
        url: 'get_reservations.php',
        type: 'GET',
        success: function(response) {
            $("#reservationTableBody").html(response);
        },
        error: function(_xhr, status, error) {
            console.error('AJAX error: ' + status + ' - ' + error);
        }
    });
}


function logout() {
    // Send a request to the server to destroy the session
    $.ajax({
        url: 'logout.php',
        type: 'POST',
        success: function() {
            // Redirect the user to the login page
            window.location = 'login.php';
        },
    });
}

$(document).ready(function() {
    loadRoomNames();
    loadReservationTable();
    
    $("#addReservationButton").click(function() {
      addReservation();
    });
  
    $("#logoutButton").click(function() {
      logout();
    });
  });


