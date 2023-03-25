<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--link css and js-->
<style>
* {box-sizing: border-box}

/* Set height of body and the document to 100% */
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial;
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

#drivers {background-color: red;}
#teams {background-color: green;}
</style>
<title>MRL Standings</title>
</head>
<body>
  <div id="header">
      <div>
        <div id="logo"><a href="/">MOOSE RACING LEAGUE</a></div>
<button class="tablinks" onclick="openPage('drivers',this, 'red')">Drivers Standing</button>
<button class="tablinks" onclick="openPage('teams',this, 'green')">Team Standing</button>  
          
        
        <!-- Tab content -->
          <div id="drivers" class="tabcontent">
            <!----Driver Content--->
            <div id="Driver-standings">
             <h1>Driver Standings</h1>
             <div class="container-c-d" >
             <div id="drivers">
              <form id="form-c-d">
                <div class="track">
                  <h3>Track</h2>
                  <div class="points">
                    <input type="text" class="track form-control tracks" autocomplete="off" autofocus required/>
                  </div>
                </div>

                <div class="year">
                  <h3>Year</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="1000"
                      max="9999"
                      class="year form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">YEAR</span>
                  </div>
                </div>

                <div class="season">
                  <h3>Season</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="1"
                      max="99"
                      class="season form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">SEASON</span>
                  </div>
                </div>

                <div class="logo">
                  <h3>League Logo</h3>
                  <div class="points">
                    <input 
                    type="file" 
                    id="file-c-d" 
                    name="file" 
                    autocomplete="off"
                    class="logo"
                    autofocus
                    accept="image/png, image/jpeg"
                  />
                  </div>
                </div>

                <div class="Driver Mercedes 1">
                  <h3>Patherock</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="mercedes-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="20"
                      class="mercedes-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="Driver Mercedes 2">
                  <h3>Homer6370</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="mercedes-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="20"
                      class="mercedes-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="Driver redbull 1">
                  <h3>WoozEmu</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="redbull-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="20"
                      class="redbull-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="Driver redbull 2">
                  <h3>Eckoalex</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="redbull-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="20"
                      class="redbull-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="Driver ferrari 1">
                  <h3>Mrkamou</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="ferrari-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="20"
                      class="ferrari-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="Driver ferrari 2">
                  <h3>Tameable Grain</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="ferrari-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="20"
                      class="ferrari-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="Driver mclaren 1">
                  <h3>TerpCharles</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="mclaren-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="20"
                      class="mclaren-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="Driver mclaren 2">
                  <h3>Gwenfro</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="mclaren-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="20"
                      class="mclaren-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="Driver alpine 1">
                  <h3>Stricker</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="alpine-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="20"
                      class="alpine-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="Driver alpine 2">
                  <h3>michiganfan</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="alpine-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="20"
                      class="alpine-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="Driver alpha-tauri 1">
                  <h3>Jmorseon</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="alpha-tauri-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="20"
                      class="alpha-tauri-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="Driver alpha-tauri 2">
                  <h3>BajaBlastBen</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="alpha-tauri-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="20"
                      class="alpha-tauri-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="Driver aston-martin 1">
                  <h3>Midnitekillr</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="aston-martin-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="20"
                      class="aston-martin-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="Driver aston-martin 2">
                  <h3>NSG Welshy</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="aston-martin-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="20"
                      class="aston-martin-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="Driver williams 1">
                  <h3>Matt</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="williams-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="20"
                      class="williams-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="Driver williams 2">
                  <h3>Jtbedrippen</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="williams-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="20"
                      class="williams-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="Driver alfa-romeo 1">
                  <h3>Olipapa</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="alfa-romeo-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="20"
                      class="alfa-romeo-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="Driver alfa-romeo 2">
                  <h3>Diegolego</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="alfa-romeo-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="20"
                      class="alfa-romeo-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="Driver haas 1">
                  <h3>Bugota</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="haas-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="20"
                      class="haas-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="Driver haas 1">
                  <h3>Deathman</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="haas-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="20"
                      class="haas-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="error" id="error-msg-c-d"></div>

                <div class="buttons-c-d">
                  <button
                    type="submit"
                    id="previewbtn"
                    title="Calculate"
                    class="btn-success"
                  >
                    Preview
                  </button>
                  <button
                    type="reset"
                    id="resetbtn-c-d"
                    title="Reset"
                    class="btn-reset btn-reset-c-d"
                  >
                    <span>×</span> Reset
                  </button>
                </div>
              </form>
            </div>

            <div id="preview-c-d">
              <img id="preview-img-c-d" width="540" height="675" />
              <a id="download-c-d">Download</a>
            </div>
          </div>
        </div>

          <!--Team Content-->
          <div id="teams", class="tabcontent">
           <div id="teams-standings">
            <h1>Teams Standings</h1>
             <div class="container-c-d" >
             <div id="constructors">
              <form id="form-c-d">
                <div class="track">
                  <h3>Track</h3>
                  <div class="points">
                    <input type="text" class="track form-control tracks" autocomplete="off" autofocus required/>
                  </div>
                </div>

                <div class="year">
                  <h3>Year</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="1000"
                      max="9999"
                      class="year form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">YEAR</span>
                  </div>
                </div>

                <div class="season">
                  <h3>Season</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="1"
                      max="99"
                      class="season form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">SEASON</span>
                  </div>
                </div>

                <div class="logo">
                  <h3>League Logo</h3>
                  <div class="points">
                    <input 
                    type="file" 
                    id="file-c-d" 
                    name="file" 
                    autocomplete="off"
                    class="logo"
                    autofocus
                    accept="image/png, image/jpeg"
                  />
                  </div>
                </div>

                <div class="mercedes team">
                  <h3>Mercedes</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="mercedes-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="mercedes-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="redbull team">
                  <h3>Red Bull</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="redbull-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="redbull-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="ferrari team">
                  <h3>Ferrari</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="ferrari-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="ferrari-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="mclaren team">
                  <h3>McLaren</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="mclaren-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="mclaren-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="alpine team">
                  <h3>Alpine</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="alpine-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="alpine-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="alpha-tauri team">
                  <h3>Alpha Tauri</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="alpha-tauri-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="alpha-tauri-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="aston-martin team">
                  <h3>Aston Martin</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="aston-martin-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="aston-martin-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="williams team">
                  <h3>Williams</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="williams-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="williams-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="alfa-romeo team">
                  <h3>Alfa Romeo</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="alfa-romeo-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="alfa-romeo-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="haas team">
                  <h3>Haas</h3>
                  <div class="points">
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="haas-old form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <input
                      type="number"
                      min="0"
                      max="999"
                      class="haas-new form-control"
                      autocomplete="off"
                      autofocus
                      required
                    />
                    <span class="input-group-text">PTS</span>
                  </div>
                </div>

                <div class="error" id="error-msg-c-d"></div>

                <div class="buttons-c-d">
                  <button
                    type="submit"
                    id="previewbtn"
                    title="Calculate"
                    class="btn-success"
                  >
                    Preview
                  </button>
                  <button
                    type="reset"
                    id="resetbtn-c-d"
                    title="Reset"
                    class="btn-reset btn-reset-c-d"
                  >
                    <span>×</span> Reset
                  </button>
                </div>
              </form>
            </div>
          </div>

            <div id="preview-c-d">
              <img id="preview-img-c-d" width="540" height="675" />
              <a id="download-c-d">Download</a>
            </div>
          </div>
        </div>
      </div>
<script>
  function openPage(pageName, elmnt, color) {
  // Hide all elements with class="tabcontent" by default */
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Remove the background color of all tablinks/buttons
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }

  // Show the specific tab content
  document.getElementById(pageName).style.display = "block";

  // Add the specific color to the button used to open the tab content
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();



</script>     
      
  </body>
</html>
