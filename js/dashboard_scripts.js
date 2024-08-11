
// Javascript for adding event modal
var modal = document.getElementById('addEventModal');

// Get the button that opens the modal
var btn = document.querySelector('.add_event_btn');

// Get the <span> element that closes the modal
var span = modal.querySelector('.close');

// When the user clicks the button, open the modal 
btn.addEventListener('click', function() {
    modal.style.display = 'block';
});

// When the user clicks on <span> (x), close the modal
span.addEventListener('click', function() {
    modal.style.display = 'none';
});

// When the user clicks anywhere outside of the modal, close it
window.addEventListener('click', function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
});


// Javascript for edit event modal
var editModal = document.getElementById('editEventModal');

var editBtn = document.querySelectorAll('.edit_event_btn');

var editSpan = editModal.querySelector('.close');

// When the user clicks the button, open the modal 
editBtn.forEach(function(btn) {
    btn.addEventListener('click', function() {
    const eventID = btn.getAttribute('data-event-id');
    const eventName = btn.getAttribute('data-event-name');
    const eventLocation = btn.getAttribute('data-event-location');
    const eventDate = btn.getAttribute('data-event-date');
    const startTime = btn.getAttribute('data-start-time');
    const finishTime = btn.getAttribute('data-finish-time');
    
    // Set the values in the modal fields
    document.getElementById('event_id').value = eventID;
    document.getElementById('editEventName').value = eventName;
    document.getElementById('editEventLocation').value = eventLocation;
    document.getElementById('editEventDate').value = eventDate;
    document.getElementById('editStartTime').value = startTime;
    document.getElementById('editFinishTime').value = finishTime;
    editModal.style.display = 'block';
    });
});

// When the user clicks on <span> (x), close the modal
editSpan.addEventListener('click', function() {
    editModal.style.display = 'none';
});

// When the user clicks anywhere outside of the modal, close it
window.addEventListener('click', function(event) {
    if (event.target == editModal) {
        editModal.style.display = 'none';
    }
});


// Get the modal
var deleteModal = document.getElementById("deleteModal");

// Get the <span> element that closes the modal
var delete_span = document.getElementById('delete_close');
var cancel_btn = document.getElementById('cancel_btn');

// When the user clicks on an edit link, open the modal
document.addEventListener('DOMContentLoaded', function() {
    // Attach click event listeners to all elements with the class 'edit_link'
    document.querySelectorAll('.delete_event_btn').forEach(function(deleteBtn) {
        deleteBtn.addEventListener('click', function(event) {
          const delete_event_id = deleteBtn.getAttribute('data-event-id');
          const delete_event_name = deleteBtn.getAttribute('data-event-name');
          
          document.querySelector('#deleteModal .delete_event_name span').innerText = delete_event_name;
          document.getElementById('delete_event_id').value = delete_event_id;

          event.preventDefault();
          deleteModal.style.display = "block";
          
        });
    });

    // When the user clicks on <span> (x), close the modal
    delete_span.addEventListener('click', function() {
      deleteModal.style.display = "none";
    });

    cancel_btn.addEventListener('click', function() {
      deleteModal.style.display = "none";
    });

    // When the user clicks anywhere outside of the modal, close it
    window.addEventListener('click', function(event) {
        if (event.target == deleteModal) {
          deleteModal.style.display = "none";
        }
    });
});







