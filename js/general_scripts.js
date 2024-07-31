function dropdownToggle(menuID) {
  var dropdownContent = document.getElementById(menuID);
  dropdownContent.classList.toggle("show");
}


document.addEventListener('DOMContentLoaded', function() {
  document.querySelector('.dropbtn').addEventListener('click', dropdownToggle);

  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
      if (!event.target.matches('.dropbtn') && !event.target.matches('.dropbtn *')) {
          var dropdowns = document.getElementsByClassName("dropdown-content");
          for (var i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.classList.contains('show')) {
                  openDropdown.classList.remove('show');
              }
          }
      }
  }
});
