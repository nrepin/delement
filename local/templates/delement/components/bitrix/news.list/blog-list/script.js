$(document).ready(function() {
  $("a.checkbox__emulator").on("click", function(e){
      url = $(this).attr("href");
      if($(this).hasClass("active")) {
          e.preventDefault();
          e.stopPropagation()
          url = url.split("?");
          document.location.href = url[0];
          return false;
      } else {
      }
  })
})