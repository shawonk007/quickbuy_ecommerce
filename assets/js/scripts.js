// Toggle Sidebar
$(document).ready(function() {
  var isMobile = false;
  var sidebar = $('#sidebar');
  var content = $('#content');
  var toggleSidebarButton = $('#toggleSidebar');
  function detectDevice() {
    var screenWidth = $(window).width();
    if (screenWidth < 992) {
      isMobile = true;
      sidebar.addClass('collapsed');
      content.addClass('expanded');
    } else if (screenWidth > 768) {
      isMobile = true;
      sidebar.removeClass('collapsed');
      content.removeClass('expanded');
    } 
    else {
      isMobile = false;
      sidebar.removeClass('collapsed');
      content.removeClass('expanded');
    }
  }
  toggleSidebarButton.click(function() {
    if (isMobile) {
      sidebar.toggleClass('collapsed');
      content.toggleClass('expanded');
    }
  });
  detectDevice();
  $(window).resize(function() {
    detectDevice();
  });
});

// Toggle sidebar sinks active


// $(document).ready(function() {
//   console.log("Document ready");
//   $('.nav-sidebar li a').on('click', function(e) {
//     e.preventDefault();
//     $('.nav-sidebar li a').removeClass('active');
//     $(this).addClass('active');
//   });
// });

// Division & Districts
// Function to populate the districts dropdown based on the selected division
function populateDistricts() {
  var divisionSelect = document.getElementById('division');
  var districtSelect = document.getElementById('district');
  var selectedDivision = divisionSelect.value;
  // Clear previous options
  districtSelect.innerHTML = '';
  // Find the selected division in the data
  for (var i = 0; i < divisions.length; i++) {
    if (divisions[i].name === selectedDivision) {
      var districts = divisions[i].districts;
      // Populate districts in the dropdown
      for (var j = 0; j < districts.length; j++) {
        var option = document.createElement('option');
        option.value = districts[j];
        option.text = districts[j];
        districtSelect.appendChild(option);
      }
      break;
    }
  }
}

// Input Mask : Phone Number
function formatPhoneNumber() {
  let phoneNumber = document.getElementById("phone").value;
  phoneNumber = phoneNumber.replace(/\D/g, ''); // remove all non-numeric characters
  phoneNumber = phoneNumber.substring(0, 13); // trim to max length of 11 digits
  const countryCode = phoneNumber.substring(0, 2);
  const operator = phoneNumber.substring(2, 5);
  const prefix = phoneNumber.substring(5, 7);
  const lineNumber = phoneNumber.substring(7);
  if (phoneNumber.length > 7) {
    phoneNumber = `+${countryCode} (${operator}) ${prefix}-${lineNumber}`;
  } else if (phoneNumber.length > 5) {
    phoneNumber = `+${countryCode} (${operator}) ${prefix}`;
  } else if (phoneNumber.length > 2) {
    phoneNumber = `+${countryCode} (${operator})`;
  } else {
    phoneNumber = `+${countryCode}`;
  }
  document.getElementById("phone").value = phoneNumber;
}

// Product Card Gallery
$(document).ready(function(){
  $(".card-gallery").owlCarousel({
    stagePadding: 10,
    items: 4,
    loop: true,
    margin: 11,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true
  });
});