$(document).ready(function() {
   "use strict";
   /*
    * DataTables - Tables
    */
   var calcDataTableHeight = function() {
      return $(window).height() - 425 + "px";
   };

   var table = $("#data-table-contact").DataTable({
      sScrollY: calcDataTableHeight(),
      scrollCollapse: true,
      paging: true,
      responsive: true,
      lengthMenu: [15],
      aoColumns: [
         {
            bSortable: false
         },
         {
            bSortable: false
         },
         null,
         null,
         null,
         {
            bSortable: false
         },
         {
            bSortable: false
         }
      ]
   });

   // Custom search
   function filterGlobal() {
      table.search($("#global_filter").val(), $("#global_regex").prop("checked"), $("#global_smart").prop("checked")).draw();
   }

   function filterColumn(i) {
      table
         .column(i)
         .search(
            $("#col" + i + "_filter").val(),
            $("#col" + i + "_regex").prop("checked"),
            $("#col" + i + "_smart").prop("checked")
         )
         .draw();
   }

   $("input#global_filter").on("keyup click", function() {
      filterGlobal();
   });

   $("input.column_filter").on("keyup click", function() {
      filterColumn(
         $(this)
            .parents("tr")
            .attr("data-column")
      );
   });

   //  Notifications & messages scrollable
   if ($("#sidebar-list").length > 0) {
      var ps_sidebar_list = new PerfectScrollbar("#sidebar-list", {
         theme: "dark"
      });
   }
   if ($(".app-page .dataTables_scrollBody").length > 0) {
      var ps_datatable_body = new PerfectScrollbar(".app-page .dataTables_scrollBody", {
         theme: "dark"
      });
   }

   // Favorite star click
   $(".app-page .favorite i").on("click", function(e) {
      e.preventDefault();
      $(this).toggleClass("amber-text");
   });

   // Toggle class of sidenav
   $("#contact-sidenav").sidenav({
      onOpenStart: function() {
         $("#sidebar-list").addClass("sidebar-show");
      },
      onCloseEnd: function() {
         $("#sidebar-list").removeClass("sidebar-show");
      }
   });

   // Remove Row for datatable in responsive
   $(document).on("click", ".app-page i.delete", function() {
      var $tr = $(this).closest("tr");
      if ($tr.prev().hasClass("parent")) {
         $tr.prev().remove();
      }
      $tr.remove();
   });

   $(".contact-sidenav li").on("click", function() {
      $("li").removeClass("active");
      $(this).addClass("active");
   });

   // Modals Popup
   $(".modal").modal();

   // Close other sidenav on click of any sidenav
   if ($(window).width() > 900) {
      $("#contact-sidenav").removeClass("sidenav");
   }
});

// Sidenav
$(".sidenav-trigger").on("click", function() {
   if ($(window).width() < 960) {
      $(".sidenav").sidenav("close");
      $(".app-sidebar").sidenav("close");
   }
});

// Select all checkbox on click of header checkbox
function toggle(source) {
   checkboxes = document.getElementsByName("foo");
   for (var i = 0, n = checkboxes.length; i < n; i++) {
      checkboxes[i].checked = source.checked;
   }
}

$(window).on("resize", function() {
   resizetable();
   // Draw table with height
   // table.scrollY = calcDataTableHeight();
   // table.draw();

   if ($(window).width() > 899) {
      $("#contact-sidenav").removeClass("sidenav");
   }

   if ($(window).width() < 900) {
      $("#contact-sidenav").addClass("sidenav");
   }
});

function resizetable() {
   $(".app-page .dataTables_scrollBody").css({
      // maxHeight: ($(window).height() - 400) + 'px'
      maxHeight: $(window).height() - 420 + "px"
   });
}
resizetable();

// For contact sidebar on small screen
if ($(window).width() < 900) {
   $(".sidebar-left.sidebar-fixed").removeClass("animate fadeUp animation-fast");
   $(".sidebar-left.sidebar-fixed .sidebar").removeClass("animate fadeUp");
}
