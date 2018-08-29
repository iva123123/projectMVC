

// <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
//   crossorigin="anonymous"></script>
//   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
//   crossorigin="anonymous"></script>
//   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
//   crossorigin="anonymous"></script>
//   <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
//   <script type="text/javascript">

// getBody
// append html script


document.onReload = funtion () {
//onDocumentReady or onReload
            //carousel
            $(".hbox").mouseover(function(){
              $(this).css("background", "rgba(0, 0, 0, 0.3)");
            }); 
            $(".hbox").mouseout(function(){
              $(this).css("background", "rgba(0, 0, 0, 0.7)");
            });



            $('#des1').mouseover(function () {
              $('#des1').css("font-size", "60px");
            });
            $('#des1').mouseout(function () {
              $('#des1').css("font-size", "40px");
            });
            

            $('.carousel').carousel({
              pause: 'hover'
            });

        //vidio
          // Video Play
          $(function () {
              // Auto play modal video
              $(".video").click(function () {
                var theModal = $(this).data("target"),
                videoSRC = $(this).attr("data-video"),
                videoSRCauto = videoSRC + "?modestbranding=1&rel=0&controls=0&showinfo=0&html5=1&autoplay=1";
                $(theModal + ' iframe').attr('src', videoSRCauto);
                $(theModal + ' button.close').click(function () {
                  $(theModal + ' iframe').attr('src', videoSRC);
                });
              });
            });
            //lightbox
            $(document).on('click', '[data-toggle="lightbox"]', function (event) {
              event.preventDefault();
              $(this).ekkoLightbox();
            });
            $('#year').text(new Date().getFullYear());

}
          // </script>