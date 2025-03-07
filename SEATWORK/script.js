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
    var reserveNo = $("#reserveNo").val();
    var reserveDate = $("#reserveDate").val();
    var roomName = $("#roomName").val();

    $.ajax({
        url: 'add_reservation.php',
        type: 'POST',
        data: { reserveNo: reserveNo, reserveDate: reserveDate, roomName: roomName },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                // Reload the reservation table
                alert(response.message);
                loadReservationTable();
                console.log(response.message);
            } else {
                console.error(response.message);
                alert(response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX error: ' + status + ' - ' + error);
            console.log(xhr.responseText); // Log the full response
        }
        
    });
}

function loadReservationTable() {
    $.ajax({
        url: 'get_reservations.php',
        type: 'GET',
        success: function(response) {
            $("#reservationTableBody").html(response);
        }
    });
}

function logout(){
    $.ajax({
        url:'logout.php',
        type:'POST',
        success:function(){
            window.location='login.php';
        }
    })
}

$(document).ready(function() {
    loadRoomNames();
    loadReservationTable();
});
