
$(window).on("load", function(){
  // preloader
  $(".preloader").fadeOut("slow");
});


$(document).ready(function(){
  $(".news").slice(0, 4).show();
  $("#loadMore").on("click", function(e){
    e.preventDefault();
    $(".news:hidden").slice(0, 4).slideDown();
    if($(".news:hidden").length == 0) {
      $("#loadMore").text("No Content").addClass("noContent");
    }
  });
  
  
})


$(document).ready(function(){
  // navbar shrink
      $(window).on("scroll", function(){
          if($(this).scrollTop() > 90){
              $(".navbar").addClass("navbar-shrink");
          }
          else{
              $(".navbar").removeClass("navbar-shrink");
          }
      });

    });
      

      // var textWrapper = document.querySelector('.ml2');
      // textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
      
      // anime.timeline({loop: true})
      //   .add({
      //     targets: '.ml2 .letter',
      //     scale: [4,1],
      //     opacity: [0,1],
      //     translateZ: 0,
      //     easing: "easeOutExpo",
      //     duration: 950,
      //     delay: (el, i) => 70*i
      //   }).add({
      //     targets: '.ml2',
      //     opacity: 0,
      //     duration: 1000,
      //     easing: "easeOutExpo",
      //     delay: 1000
      //   });
  


      
    






 
      