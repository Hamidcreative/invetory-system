$(document).ready(function() {
   "use strict";

   // For Modal
   $(".modal").modal();

   $(".email-sidenav li").click(function() {
      $("li").removeClass("active");
      $(this).addClass("active");
   });

   // Close other sidenav on click of any sidenav
   if ($(window).width() > 900) {
      $("#email-sidenav").removeClass("sidenav");
   }

   // TinyMCE Editor
   tinymce.init({
      selector: ".editor"
   });

   // Favorite star click
   $(".favorite i").on("click", function() {
      $(this).toggleClass("amber-text");
   });

   // Important label click
   $(".email-label i").on("click", function() {
      $(this).toggleClass("amber-text");
      if ($(this).text() == "label_outline") $(this).text("label");
      else $(this).text("label_outline");
   });

   // Sidenav
   $(".sidenav-trigger").on("click", function() {
      if ($(window).width() < 960) {
         $(".sidenav").sidenav("close");
         $(".app-sidebar").sidenav("close");
      }
   });

   // Toggle class of sidenav
   $("#email-sidenav").sidenav({
      onOpenStart: function() {
         $("#sidebar-list").addClass("sidebar-show");
      },
      onCloseEnd: function() {
         $("#sidebar-list").removeClass("sidebar-show");
      }
   });

   //  Notifications & messages scrollable
   if ($("#sidebar-list").length > 0) {
      var ps_sidebar_list = new PerfectScrollbar("#sidebar-list", {
         theme: "dark"
      });
   }

   // Reply button click
   $(".reply").on("click", function() {
      $(".reply-box").toggleClass("d-none");
      if (!$(".forward-box").hasClass("d-none")) {
         $(".forward-box").addClass("d-none");
      }
   });

   // Forward button click
   $(".forward").on("click", function() {
      var content = $(".email-desc").html();
      tinymce.get("forward-editor").setContent(content);
      $(".forward-box").toggleClass("d-none");
      if (!$(".reply-box").hasClass("d-none")) {
         $(".reply-box").addClass("d-none");
      }
   });
});

$(window).on("resize", function() {
   if ($(window).width() > 899) {
      $("#email-sidenav").removeClass("sidenav");
   }

   if ($(window).width() < 900) {
      $("#email-sidenav").addClass("sidenav");
   }
});
