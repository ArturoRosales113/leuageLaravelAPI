var isopen = true

function Functiondos() {
    var elements = document.getElementsByClassName("itemHide"),
        n = elements.length;
    for (var i = 0; i < n; i++) {
      var e = elements[i];
 
      if(e.style.display == 'none') {
        e.style.display = 'block';
      } else {
        e.style.display = 'none';
      }
   }
   
   var elements = document.getElementsByClassName("logoHide"),
        n = elements.length;
    for (var i = 0; i < n; i++) {
      var e = elements[i];
 
      if(e.style.display == 'none') {
        e.style.display = 'block';
      } else {
        e.style.display = 'none';
      }
   }

   var elements = document.getElementsByClassName("logoShow"),
        n = elements.length;
    for (var i = 0; i < n; i++) {
      var e = elements[i];
 
      if(e.style.display == 'block') {
        e.style.display = 'none';
      } else {
        e.style.display = 'block';
      }
   }

   var elements = document.getElementsByClassName("navbar-vertical"),
        n = elements.length;
    for (var i = 0; i < n; i++) {
      var e = elements[i];
 
      if(e.style.width == 'auto') {
        e.style.width = '100%';
      } else {
        e.style.width = 'auto';
      }
   }
   
   var margen = document.getElementById("panelcontent")
      if(isopen) {
        margen.style.marginLeft = '90px';
        isopen = false
      } else {
        margen.style.marginLeft = '250px';
        isopen = true
      }

   var dropdown = document.querySelector(".collapse .show")
    if (dropdown){
      dropdown.classList.remove("show")
  } 
}

 function Functionuno() {
    var elements = document.getElementsByClassName("itemHide"),
        n = elements.length;
    for (var i = 0; i < n; i++) {
      var e = elements[i];
 
      if(e.style.display == 'block') {
        e.style.display = 'block';
      } else {
        e.style.display = 'block';
      }
   }

   var elements = document.getElementsByClassName("navbar-vertical"),
        n = elements.length;
    for (var i = 0; i < n; i++) {
      var e = elements[i];
 
      if(e.style.width == '295px') {
        e.style.width = '295px';
      } else {
        e.style.width = '295px';
      }
   }
   var elements = document.getElementsByClassName("logoShow"),
        n = elements.length;
    for (var i = 0; i < n; i++) {
      var e = elements[i];
 
      if(e.style.display == 'none') {
        e.style.display = 'none';
      } else {
        e.style.display = 'none';
      }
   }
   var elements = document.getElementsByClassName("logoHide"),
        n = elements.length;
    for (var i = 0; i < n; i++) {
      var e = elements[i];
 
      if(e.style.display == 'block') {
        e.style.display = 'block';
      } else {
        e.style.display = 'block';
      }
   }   
   var main = document.querySelector(".margen")
   if (main){
     main.classList.remove("margen")
  }
}


