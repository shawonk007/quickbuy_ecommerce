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

// Display Input Image
// var imgInp = document.getElementById("imageInput");
// var dummy = document.getElementById("dummy");
// imgInp.onchange = evt => {
//   const [file] = imgInp.files
//   if (file) {
//     dummy.src = URL.createObjectURL(file)
//   }
// }

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

function formatPhoneNumber(input) {
  let phoneNumber = input.value;
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
  input.value = phoneNumber;
}

$(document).ready(function() {
  // When the value of the input field changes
  $('#promoInput').on('input', function() {
    // Get the current input value
    let promoValue = $(this).val();

    // Limit the input value to a maximum of 14 characters
    promoValue = promoValue.slice(0, 14);

    // Format the promo value
    const formattedPromoValue = formatPromoValue(promoValue);

    // Set the formatted value back to the input field
    $(this).val(formattedPromoValue);
  });
});

function formatPromoValue(promo) {
  // Remove any non-alphanumeric characters from the promo value
  const cleanedPromo = promo.replace(/\W/g, '');

  // Split the cleaned promo value into groups of four characters
  const groups = cleanedPromo.match(/.{1,4}/g);

  // Join the groups with dashes to form the formatted promo value
  const formattedPromo = groups ? groups.join('-') : '';

  return formattedPromo;
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

$(document).ready(function() {
  $(".data-table").DataTable({
    paging: true,
    pageLength: 10,
    lengthMenu: [10, 25, 50, 75, 100],
    pagingType: "full_numbers",
    searching: true,
    search: 'Search records:',
    searchDelay: 500,
    searchPlaceholder: 'Search...',
    ordering: true,
    responsive: true,
    autoWidth : false,
    info : true,
    // dom: 'Bfrtip',
    // dom: 'Bfrtlip',
    // dom: 'lBfrtip', // Include 'l' for page length and 'B' for buttons
    // dom: 'Bfrtip<"bottom"l>tip',
    // dom: '<"bottom-pagination"l><"bottom-pagination"f>rtip',
    // dom: '<"row"<"col-md-6"B><"col-md-6"f>>rtlip',
    dom: '<"row"<"col-md-6"B><"col-md-6"f>>' + '<"row"<"col-md-12"rt>>' + '<"row align-items-center"<"col-md-6 pb-0 mb-0"l><"col-md-6 text-end pt-0 mt-0"i>>' + '<"row"<"col-md-12 mt-4"p>>',
    buttons: [
      {
        extend: 'copy',
        text: 'Copy',
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'csv',
        text: 'CSV',
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'excel',
        text: 'Excel',
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'pdf',
        text: 'PDF',
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'print',
        text: 'Print',
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'colvis',
        text: 'Columns'
      }
    ],
    columnDefs: [
      { targets: 'no-sort', orderable: false }
    ],
    drawCallback: function(settings) {
      if (settings.json) {
        var pagination = $(this).closest('.dataTables_wrapper').find('.bottom-pagination');
        pagination.html(settings._iDisplayStart + 1 + ' to ' + settings._iDisplayEnd + ' of ' + settings.fnRecordsTotal());
      }
    },
    language: {
      paginate: {
        first: '<i class="fas fa-angle-double-left"></i>',
        previous: '<i class="fas fa-angle-left"></i>',
        next: '<i class="fas fa-angle-right"></i>',
        last: '<i class="fas fa-angle-double-right"></i>'
      }
    }
  });
});

$(document).ready(function() {
  $('.home-data-table').DataTable({
    paging: true,
    // pageLength: 10,
    lengthMenu: [[10, 15, 20, 25], [10, 15, 20, 25]],
    pagingType: "full_numbers",
    searching: true,
    search: 'Search records:',
    searchDelay: 500,
    searchPlaceholder: 'Search...',
    ordering: true,
    responsive: true,
    autoWidth : false,
    info : true,
    dom: '<"row"<"col-6 d-flex justify-content-start"f><"col-6 d-flex justify-content-end"l>>' + '<"row"<"col-md-12"rt>>' + '<"row"<"col-md-12 d-flex justify-content-center"p>>',
    language: {
      paginate: {
        first: '<i class="fas fa-angle-double-left"></i>',
        previous: '<i class="fas fa-angle-left"></i>',
        next: '<i class="fas fa-angle-right"></i>',
        last: '<i class="fas fa-angle-double-right"></i>'
      },
      lengthMenu: "_MENU_",
      search: "Search:",
      info: "Showing _START_ to _END_ of _TOTAL_ entries"
    }
  });
});