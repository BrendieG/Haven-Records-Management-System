// Javascript for adding folder modal
var folderModal = document.getElementById('addFolderModal');

// Get the button that opens the modal
var folderBtn = document.querySelector('.add_folder_btn');

// Get the <span> element that closes the modal
var folderSpan = document.getElementById('add_close');

// When the user clicks the button, open the modal 
folderBtn.addEventListener('click', function() {
    folderModal.style.display = 'block';
});

// When the user clicks on <span> (x), close the modal
folderSpan.addEventListener('click', function() {
    folderModal.style.display = 'none';
});

// When the user clicks anywhere outside of the modal, close it
window.addEventListener('click', function(event) {
    if (event.target == folderModal) {
        folderModal.style.display = 'none';
    }
});


// Javascript for adding folder modal
var editModal = document.getElementById('editFolderModal');

// Get the button that opens the modal
var editBtn = document.querySelectorAll('.edit_folder_btn');

// Get the <span> element that closes the modal
var editSpan = document.getElementById('edit_close');

// When the user clicks the button, open the modal
editBtn.forEach(function(btn) {
    btn.addEventListener('click', function() {
          const folder_id = btn.getAttribute('data-folder-id');
          const folder_name = btn.getAttribute('data-folder-name');
          const folder_description = btn.getAttribute('data-folder-desc');
          
          document.getElementById('folderId').value = folder_id;
          document.getElementById('editFolderName').value = folder_name;
          document.getElementById('editFolderDesc').value = folder_description;
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















