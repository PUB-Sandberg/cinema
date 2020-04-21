$( document ).ready(function() {

    $(".timeline").click(function(){
          $(this).toggleClass("active");

      });

      $(".popcorn").click(function(){
        $("#particles-js").toggleClass("active");
        particlesJS.load('particles-js', 'assets/js/particles.json', function() {
            console.log('callback - particles.js config loaded');
          });

    });

    $(".curtain").click(function(){
        $(".curtain-left, .curtain-right").toggleClass("active");
    });
});