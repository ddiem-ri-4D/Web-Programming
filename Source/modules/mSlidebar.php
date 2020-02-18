<div class="w3-content w3-section" style="margin-bottom: 100px">
      <img class="mySlides" src="img/a.jpg" style="width:100%;">
      <img class="mySlides" src="img/b.jpg" style="width:100%;">
      <img class="mySlides" src="img/c.jpg" style="width:100%;">
      <img class="mySlides" src="img/d.jpg" style="width:100%;">
      <img class="mySlides" src="img/e.jpg" style="width:100%;">
      <img class="mySlides" src="img/f.jpg" style="width:100%;">
</div>
<script>
      var myIndex = 0;
      carousel();
      function carousel() {
          var i;
          var x = document.getElementsByClassName("mySlides");
          for (i = 0; i < x.length; i++) {
              x[i].style.display = "none";  
      }
          myIndex++;
          if (myIndex > x.length) {myIndex = 1}    
          x[myIndex-1].style.display = "block";  
          setTimeout(carousel, 1000); // Change image every 1 seconds
      }
</script>