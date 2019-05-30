if(document.querySelector('.closealert')) {
    document.querySelector('.closealert').addEventListener('click', function() {
        document.querySelector('.alertbox').remove();
    });
}

window.addEventListener('scroll', function() {
    if (window.scrollY === 0) {
        document.querySelector('.navbar').classList.remove('shrinknavbar');
        document.querySelector('.logoimg').classList.remove('shrinkimg');
    } else {
        document.querySelector('.navbar').classList.add('shrinknavbar');
        document.querySelector('.logoimg').classList.add('shrinkimg');
    }
});

// Sparar veckodag
if (document.querySelector('.calendar__month-name')) {
    let weekdays = ['Söndag', 'Måndag', 'Tisdag', 'Onsdag', 'Torsdag', 'Fredag', 'Lördag'];
    let date = new Date();
    let today = weekdays[date.getDay()];
}

// Skriver nuvarande månad
if (document.querySelector('.calendar__month-name')) {
    let months = ['Januari', 'Februari', 'Mars', 'April', 'Maj', 'Juni', 'Juli', 'Augusti', 'September', 'Oktober', 'November', 'December'];

    let currentMonth = months[new Date().getMonth()];
    
    document.querySelector('.calendar__month-name').textContent = currentMonth + ' ' + new Date().getFullYear();
}

// Rendering different pages
let currentPage = 'booktrip';

if (document.querySelector('.dashboard')) {
    switch (currentPage) {
        case 'calendar':
            showCalendar();
            break;
        case 'booktrip':
            showBooking();
            break;
        case 'yourtrips':
            showTrips();
            break;
        default:
            showCalendar();
    }

    // Adding event listeners
    document.querySelector('.calendar-link').addEventListener('click', showCalendar);
    document.querySelector('.booking-link').addEventListener('click', showBooking);
    document.querySelector('.yourtrips-link').addEventListener('click', showTrips);

}

function showCalendar() {
    activateOneLink('.calendar-link');

    // Showing calendar
    showOneSection('.booking');
}

function showBooking() {
    let currentPage = 'booktrip';
    // Disactivating all links and activating one
    activateOneLink('.booking-link');

    // Showing calendar
    showOneSection('.booktrip');
}

function showTrips() {
    let currentPage = 'yourtrips';
    // Disactivating all links and activating one
    activateOneLink('.yourtrips-link');

    // Showing calendar
    showOneSection('.trips');
}

function activateOneLink(linkClass) {
    // Disactivating all dashboard links
    document.querySelectorAll('.dashboard__menu-item').forEach(elem => {
        elem.classList.remove('active');
    });

    // Activating calendar link
    document.querySelector(linkClass).classList.add('active');
}

function showOneSection(sectionClass) {
    // Hiding calendar
    document.querySelector('.booking').style.display = 'none';

    // Hiding booking
    document.querySelector('.booktrip').style.display = 'none';

    // Hiding trips
    document.querySelector('.trips').style.display = 'none';

    // Showing the selected section
    document.querySelector(sectionClass).style.display = 'block';
}

// Skapar autocomplete för fälten
let destinations = ['Gustav Adolfs torg', 'Malmö central', 'Bulltofta', 'Caroli city', 'Celsiusgatan', 'Dammfri', 'Söderkulla', 'Rosengård centrum', 'Triangeln', 'Värnhem', 'Almtorget', 'Annelund', 'Barkgatan', 'Bellevueparken', 'Bellevuegården', 'Bennets väg', 'Cypressvägen', 'Dalaplan', 'Davidshall', 'Djäknegatan', 'Emilstorp', 'Eriksfält', 'Erikslust', 'Falsterboplan', 'Fosie kyrka', 'Gullvik', 'Hammargatan', 'Hermodsdal', 'Holma', 'Husiegård', 'Hyllie station', 'Industrigatan', 'Jägersro', 'Kastanjegården', 'Kirsebergs torg', 'Kroksbäck', 'Lindängen', 'Lindeborgsgatan', 'Folkets park', 'Mobilia', 'Möllevångstorget', 'Nydala', 'Norra Vallgatan', 'Persborgstorget', 'Per Albins hem', 'Professorsgatan', 'Ramels väg', 'Ribersborg', 'Segevång', 'S:t Pauli kyrka', 'Sevedsgården', 'Sofielund', 'Snödroppsgatan', 'Sibbarp', 'Terminalgatan', 'Tekniska museet', 'Turning Torso', 'Ulricedal', 'Ubåtshallen', 'Vandrarhemmet', 'Vattenverket', 'Videdal', 'Ystadsgatan', 'Ärtholmsvägen', 'Åkvagnsgatan', 'Ögårdsparken', 'Öresundsparken', 'Östervärn', 'Södervärn'];

function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
          /*check if the item starts with the same letters as the text field value:*/
          if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            /*create a DIV element for each matching element:*/
            b = document.createElement("DIV");
            /*make the matching letters bold:*/
            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(val.length);
            /*insert a input field that will hold the current array item's value:*/
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
            /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function(e) {
                /*insert the value for the autocomplete text field:*/
                inp.value = this.getElementsByTagName("input")[0].value;
                /*close the list of autocompleted values,
                (or any other open lists of autocompleted values:*/
                closeAllLists();
            });
            a.appendChild(b);
          }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
          /*If the arrow DOWN key is pressed,
          increase the currentFocus variable:*/
          currentFocus++;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 38) { //up
          /*If the arrow UP key is pressed,
          decrease the currentFocus variable:*/
          currentFocus--;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 13) {
          /*If the ENTER key is pressed, prevent the form from being submitted,*/
          e.preventDefault();
          if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (x) x[currentFocus].click();
          }
        }
    });
    function addActive(x) {
      /*a function to classify an item as "active":*/
      if (!x) return false;
      /*start by removing the "active" class on all items:*/
      removeActive(x);
      if (currentFocus >= x.length) currentFocus = 0;
      if (currentFocus < 0) currentFocus = (x.length - 1);
      /*add class "autocomplete-active":*/
      x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
      /*a function to remove the "active" class from all autocomplete items:*/
      for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
      }
    }
    function closeAllLists(elmnt) {
      /*close all autocomplete lists in the document,
      except the one passed as an argument:*/
      var x = document.getElementsByClassName("autocomplete-items");
      for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
  }

  autocomplete(document.getElementById("from"), destinations);
  autocomplete(document.getElementById("to"), destinations);