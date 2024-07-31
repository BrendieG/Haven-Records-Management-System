function toggleMenuDropdown(event) {
    event.stopPropagation();
    const dropdownContent = event.target.closest('.doc_dropdown').querySelector('.doc_dropdown_content');
    dropdownContent.classList.toggle('show');
  }
  
  document.addEventListener('DOMContentLoaded', function() {
    const dropdownButtons = document.querySelectorAll('.doc_dropbtn');
    dropdownButtons.forEach(button => {
      button.addEventListener('click', toggleMenuDropdown);
    });
  
    // Close the dropdown if the user clicks outside of it
    window.addEventListener('click', function(event) {
      if (!event.target.matches('.doc_dropbtn') && !event.target.matches('.doc_dropbtn *')) {
        const dropdowns = document.querySelectorAll('.doc_dropdown_content');
        dropdowns.forEach(dropdown => {
          if (dropdown.classList.contains('show')) {
            dropdown.classList.remove('show');
          }
        });
      }
    });
  });
  

// Get the modal
var editModal = document.getElementById("editModal");

// Get the <span> element that closes the modal
var span = document.getElementById('edit_close');

// When the user clicks on an edit link, open the modal
document.addEventListener('DOMContentLoaded', function() {
    // Attach click event listeners to all elements with the class 'edit_link'
    document.querySelectorAll('.edit_link').forEach(function(editLink) {
        editLink.addEventListener('click', function(event) {
          const document_id = editLink.getAttribute('data-document-id');
          const document_name = editLink.getAttribute('data-document-name');
          
          document.getElementById('document_id').value = document_id;
          document.getElementById('edit_document_name').value = document_name;

            event.preventDefault(); // Prevent default link behavior
            editModal.style.display = "block";
        });
    });

    // When the user clicks on <span> (x), close the modal
    span.addEventListener('click', function() {
        editModal.style.display = "none";
    });

    // When the user clicks anywhere outside of the modal, close it
    window.addEventListener('click', function(event) {
        if (event.target == editModal) {
            editModal.style.display = "none";
        }
    });
});



// Javascript for edit staff modal
var editStaffModal = document.getElementById('editStaffModal');

var editStaffBtn = document.querySelector('.edit_staff_btn');

var staffSpan = document.getElementById('staff_close');

// When the user clicks the button, open the modal 
editStaffBtn.addEventListener('click', function() {
  const firstName = editStaffBtn.getAttribute('data-first-name');
  const middleName = editStaffBtn.getAttribute('data-middle-name');
  const lastName = editStaffBtn.getAttribute('data-last-name');
  const gender = editStaffBtn.getAttribute('data-gender');
  const dob = editStaffBtn.getAttribute('data-dob');
  const employmentDate = editStaffBtn.getAttribute('data-employment-date');
  const primary_contact = editStaffBtn.getAttribute('data-primary-contact');
  const secondary_contact = editStaffBtn.getAttribute('data-secondary-contact');
  const email = editStaffBtn.getAttribute('data-email');
  const address = editStaffBtn.getAttribute('data-address');
  const work_role = editStaffBtn.getAttribute('data-work-role');
  // Set the values in the modal fields
  document.getElementById('firstName').value = firstName;
  document.getElementById('middleName').value = middleName;
  document.getElementById('lastName').value = lastName;
  document.getElementById('gender').value = gender;
  document.getElementById('dob').value = dob;
  document.getElementById('employmentStartDate').value = employmentDate;
  document.getElementById('primaryContact').value = primary_contact;
  document.getElementById('secondaryContact').value = secondary_contact;
  document.getElementById('address').value = address;
  document.getElementById('email').value = email;
  document.getElementById('work_role').value = work_role;

  editStaffModal.style.display = 'block';
});

// When the user clicks on <span> (x), close the modal
staffSpan.addEventListener('click', function() {
  editStaffModal.style.display = 'none';
});

// When the user clicks anywhere outside of the modal, close it
window.addEventListener('click', function(event) {
    if (event.target == editStaffModal) {
      editStaffModal.style.display = 'none';
    }
});

// Get the modal
var upload_modal = document.getElementById("uploadModal");

// Get the button that opens the modal
var upload_btn = document.getElementById("openModalBtn");

// Get the <span> element that closes the modal
var upload_span = document.getElementById('add_close');

// When the user clicks the button, open the modal 
upload_btn.addEventListener('click', function() {

  upload_modal.style.display = "block";
});

// When the user clicks on <span> (x), close the modal
upload_span.addEventListener('click', function() {
  upload_modal.style.display = "none";
});

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == upload_modal) {
      upload_modal.style.display = "none";
    }
}







