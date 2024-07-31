// Javascript for adding donation modal
var addDonationModal = document.getElementById('addDonationModal');
var addBtn = document.querySelector('.add_donation_btn');
var addSpan =  document.getElementById('donation_close');

addBtn.addEventListener('click', function() {
    addDonationModal.style.display = 'block';
});

addSpan.addEventListener('click', function() {
    addDonationModal.style.display = 'none';
});

// When the user clicks anywhere outside of the modal, close it
window.addEventListener('click', function(event) {
    if (event.target == addDonationModal) {
        addDonationModal.style.display = 'none';
    }
});

// Javascript for viewing donation modal
var viewDonationModal = document.getElementById('viewDonationModal');

// Get the button that opens the modal
var viewBtns = document.querySelectorAll('.view_donation_btn');

// Get the <span> element that closes the modal
var viewSpan =  document.getElementById('view_donation_close');

// When the user clicks the button, open the modal 
viewBtns.forEach(function(btn) {
    btn.addEventListener('click', function() {

            // Get data attributes from the clicked button
            var donorName = btn.getAttribute('data-donor-name');
            var contact = btn.getAttribute('data-contact');
            var date = btn.getAttribute('data-date');
            var email = btn.getAttribute('data-email');
            var amount = btn.getAttribute('data-amount');
            var items = btn.getAttribute('data-items');
            var notes = btn.getAttribute('data-notes');
            
            // Populate the modal with the extracted data
            document.querySelector('#viewDonationModal .donor_name span').innerText = donorName;
            document.querySelector('#viewDonationModal .donation_date span').innerText = date;
            document.querySelector('#viewDonationModal .donor_contact span').innerText = contact;
            document.querySelector('#viewDonationModal .donation_amount span').innerText = amount;
            document.querySelector('#viewDonationModal .donation_items span').innerText = items;
            document.querySelector('#viewDonationModal .donation_notes span').innerText = notes;
            document.querySelector('#viewDonationModal .donor_email span').innerText = email;


        viewDonationModal.style.display = 'block';
    });
});

// When the user clicks on <span> (x), close the modal
viewSpan.addEventListener('click', function() {
    viewDonationModal.style.display = 'none';
});

// When the user clicks anywhere outside of the modal, close it
window.addEventListener('click', function(event) {
    if (event.target == viewDonationModal) {
        viewDonationModal.style.display = 'none';
    }
});