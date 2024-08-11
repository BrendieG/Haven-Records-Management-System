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

// Get the modal
var deleteModal = document.getElementById("deleteModal");

// Get the <span> element that closes the modal
var delete_span = document.getElementById('delete_close');
var cancel_btn = document.getElementById('cancel_btn');
// When the user clicks on an edit link, open the modal
document.addEventListener('DOMContentLoaded', function() {
    // Attach click event listeners to all elements with the class 'edit_link'
    document.querySelectorAll('.delete_link').forEach(function(deleteLink) {
      deleteLink.addEventListener('click', function(event) {
          const delete_document_id = deleteLink.getAttribute('data-document-id');
          const delete_document_name = deleteLink.getAttribute('data-document-name');
          
          document.querySelector('#deleteModal .delete_doc_name span').innerText = delete_document_name;
          document.getElementById('delete_document_id').value = delete_document_id;

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










