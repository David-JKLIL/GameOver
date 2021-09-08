<style>
  * {
    box-sizing: border-box
  }

  /* Style tab links */
  .tablink {
    background-color: #555;
    color: white;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    font-size: 17px;
    width: 25%;
  }

  .tablink:hover {
    background-color: #777;
  }

  /* Style the tab content (and add height:100% for full page content) */
  .tabcontent {
    color: white;
    display: none;
    padding: 100px 20px;
    height: 100%;
  }

  #text-debajo {
    margin: auto;
    padding-top: 300px;
  }

  #Home {
    background-image: url("img/sld5.jpg");
    background-size: cover;
    background-repeat: no-repeat;
  }

  #News {
    background-image: url("img/lps4.jpg");
    background-size: 100% 100%;
    background-attachment: fixed;
    background-repeat: no-repeat;
  }

  #Contact {
    background-image: url("img/sld1.png");
    background-size: cover;
    background-repeat: no-repeat;
  }

  #About {
    background-image: url("img/sld5.jpg");
    background-size: cover;
    background-repeat: no-repeat;
  }
</style>

<div style=" width: 85%;height: 520px; margin: auto;">
  <button class="tablink" onclick="openPage('Home', this, 'black')" id="defaultOpen">Videojuegos</button>
  <button class="tablink" onclick="openPage('News', this, 'black')">Consolas de videojuegos</button>
  <button class="tablink" onclick="openPage('Contact', this, 'black')">Accesorios</button>
  <button class="tablink" onclick="openPage('About', this, 'black')">Seguridad</button>

  <div id="Home" class="tabcontent">
    <div id="text-debajo">
      <h2 style="text-shadow: 2px 2px #000000;">Videojuegos</h2>
      <p style="text-shadow: 1.5px 1.5px #000000; font-size: large;">Los mejores videojuegos de accion, aventura, estrategia y mucho más...<br>
        Lo mejor y mas alta calidad...</p>
    </div>
  </div>

  <div id="News" class="tabcontent">
    <div id="text-debajo">
      <h3>Consolas de videojuegos</h3>
      <p>Consolas de videojuegos de todo los tipos!!!</p>
    </div>
  </div>

  <div id="Contact" class="tabcontent">
    <div id="text-debajo">
      <h3>Contact</h3>
      <p>Get in touch, or swing by for a cup of coffee.</p>
    </div>
  </div>

  <div id="About" class="tabcontent">
    <div id="text-debajo">
      <h3>About</h3>
      <p>Who we are and what we do.</p>
    </div>
  </div>
</div>
<script>
  function openPage(pageName, elmnt, color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;
  }

  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
</script>