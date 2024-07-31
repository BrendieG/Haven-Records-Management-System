// Javascript for adding child modal
var childModal = document.getElementById('addChildModal');

// Get the button that opens the modal
var childBtn = document.querySelector('.add_child_btn');

// Get the <span> element that closes the modal
var childSpan = childModal.querySelector('.close');

// When the user clicks the button, open the modal 
childBtn.addEventListener('click', function() {
    childModal.style.display = 'block';
});

// When the user clicks on <span> (x), close the modal
childSpan.addEventListener('click', function() {
    childModal.style.display = 'none';
});

// When the user clicks anywhere outside of the modal, close it
window.addEventListener('click', function(event) {
    if (event.target == childmodal) {
        childModal.style.display = 'none';
    }
});