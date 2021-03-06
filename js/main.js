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

// Variables
let currentPage = 'yourtrips';
let currentTheme = 'light';

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
    var elements = document.querySelectorAll('.dashboard__menu-item');
    for (var i = 0; i < elements.length; i++) {
        elements[i].classList.remove('active');
    }
    // document.querySelectorAll('.dashboard__menu-item').forEach(elem => {
    //     elem.classList.remove('active');
    // });

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

            // Gör autocompleteflikarna mörka
            if (currentTheme === 'dark') {
                b.classList.add('autocomplete-dark');
            }
            
            // Gör autocompleteflikarna ljusa
            if (currentTheme === 'light') {
                b.classList.remove('autocomplete-dark');
            }
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

  if (document.querySelector('#from')) {
      autocomplete(document.getElementById("from"), destinations);
      autocomplete(document.getElementById("to"), destinations);
  }


  // Switcha mellan mörkt och ljust läge
  if (document.querySelector('.switchtheme')) {
    document.querySelector('.switchtheme').addEventListener('click', toggleTheme);

    function toggleTheme() {
        if (currentTheme === 'light') {
            // Switcha variabeln
            currentTheme = 'dark';

            // Ändra knappen
            document.querySelector('.switchtheme').textContent = 'Byt till ljust läge';
            document.querySelector('.switchtheme').classList.add('lighttheme');

            // Gör temat mörkt
            document.body.style.backgroundColor = '#1e272e';
            document.body.style.color = '#FEFEFE';
    
            // Gör titlarna orange
            document.querySelector('.booking__title').style.color = '#FF8200';
            document.querySelector('.booktrip__title').style.color = '#FF8200';
            document.querySelector('.trips__title').style.color = '#FF8200';

            // document.querySelectorAll('.title').forEach(elem => {elem.style.color = '#FFD100';});

            var titleElements = document.querySelectorAll('.title');
            for (var i = 0; i < titleElements.length; i++) {
                titleElements[i].style.color = '#FFD100';
            };

            // document.querySelectorAll('.usertitle').forEach(elem => {elem.style.color = '#FF8200';});

            var userTitleElements = document.querySelectorAll('.usertitle');
            for (var i = 0; i < userTitleElements.length; i++) {
                userTitleElements[i].style.color = '#FF8200';
            };

            // Gör prisboxen mörk
            document.querySelector('.pricebox').style.backgroundColor = '#444';
            document.querySelector('.total').style.color = '#FF8200';
            document.querySelector('.totalprice').style.color = '#FEFEFE';

            // Gör manualboxen mörk
            document.querySelector('.calendar__manual').style.backgroundColor = '#444';

            // Gör länken gul
            document.querySelector('.info-link').classList.add('darkyellow');

            // Gör tabellen mörk
            // document.querySelectorAll('th').forEach(elem => {
            //     elem.style.backgroundColor = '#555';
            // });

            var tableHeaders = document.querySelectorAll('th');
            for (var i = 0; i < tableHeaders.length; i++) {
                tableHeaders[i].style.backgroundColor = '#555';
            };

            // document.querySelectorAll('td').forEach(elem => {
            //     elem.style.backgroundColor = '#444';
            // });

            var tableDataElements = document.querySelectorAll('td');
            for (var i = 0; i < tableDataElements.length; i++) {
                tableDataElements[i].style.backgroundColor = '#444';
            }

        } else if (currentTheme === 'dark') {
            // Switcha variabeln
            currentTheme = 'light';

            // Ändra tillbaka knappen
            document.querySelector('.switchtheme').textContent = 'Byt till mörkt läge';
            document.querySelector('.switchtheme').classList.remove('lighttheme');

            // Gör temat ljust
            document.body.style.backgroundColor = '#FEFEFE';
            document.body.style.color = '#1e272e';

            // Gör titlarna svarta
            document.querySelector('.booking__title').style.color = '#1e272e';
            document.querySelector('.booktrip__title').style.color = '#1e272e';
            document.querySelector('.trips__title').style.color = '#1e272e';
            // document.querySelectorAll('.title').forEach(elem => {elem.style.color = '#3c40c6';});
            var titleElements = document.querySelectorAll('.title');
            for (var i = 0; i < titleElements.length; i++) {
                titleElements[i].style.color = '#3c40c6';
            }

            // document.querySelectorAll('.usertitle').forEach(elem => {elem.style.color = '#046A38';});
            var userTitleElements = document.querySelectorAll('.usertitle');
            for (var i = 0; i < userTitleElements.length; i++) {
                userTitleElements[i].style.color = '#046A38';
            };


            // Gör prisboxen mörk
            document.querySelector('.pricebox').style.backgroundColor = 'whitesmoke';
            document.querySelector('.total').style.color = '#1e272e';
            document.querySelector('.totalprice').style.color = '#3c40c6';

            // Gör manualboxen ljus
            document.querySelector('.calendar__manual').style.backgroundColor = '#FEFEFE';

            // Gör länken grön igen
            document.querySelector('.info-link').classList.remove('darkyellow');

            // Gör tabellen mörk
            // document.querySelectorAll('th').forEach(elem => {
            //     elem.style.backgroundColor = '#d2dae2';
            // });
            var tableHeaders = document.querySelectorAll('th');
            for (var i = 0; i < tableHeaders.length; i++) {
                tableHeaders[i].style.backgroundColor = '#d2dae2';
            };

            // document.querySelectorAll('td').forEach(elem => {
            //     elem.style.backgroundColor = 'whitesmoke';
            // });

            var tableDataElements = document.querySelectorAll('td');
            for (var i = 0; i < tableDataElements.length; i++) {
                tableDataElements[i].style.backgroundColor = 'whitesmoke';
            }
        }

        
    }

  }

// Möjliggör ändring av textstorlek
if (document.querySelector('.dashboard')) {
    document.querySelector('.switchfontsize').addEventListener('change', switchFontSize);

    function switchFontSize() {
        switch (document.querySelector('.switchfontsize').value) {
            case 'small':
                document.documentElement.classList.add('smallfontsize');
                document.querySelector('.booktrip').classList.remove('booktrip-space');
                break;
            case 'normal':
                document.documentElement.classList.remove('smallfontsize');
                document.documentElement.classList.remove('bigfontsize');
                document.querySelector('.booktrip').classList.remove('booktrip-space');
                break;
            case 'big':
                document.documentElement.classList.remove('smallfontsize');
                document.documentElement.classList.add('bigfontsize');
                document.querySelector('.booktrip').classList.add('booktrip-space');
                break;
            default:
                document.documentElement.classList.remove('smallfontsize');
                document.documentElement.classList.remove('bigfontsize');
                document.querySelector('.booktrip').classList.remove('booktrip-space');
                break;
        }
    }
}

if (document.querySelector('.questions')) {
    // Gör menyalternativen aktiva när användaren scrollar nerför hjälpsidan
    window.addEventListener('scroll', activateMenuItem);
    if (window.scrollY >= 0 && window.scrollY <= document.querySelector('.question2').offsetTop - 220) {
        document.querySelector('.menuitem1').classList.add('activeitem');
        document.querySelector('.menuitem2').classList.remove('activeitem');
        document.querySelector('.menuitem3').classList.remove('activeitem');
    }

    function activateMenuItem() {
        if (window.scrollY >= 0 && window.scrollY <= document.querySelector('.question2').offsetTop - 220) {
            document.querySelector('.menuitem1').classList.add('activeitem');
            document.querySelector('.menuitem2').classList.remove('activeitem');
            document.querySelector('.menuitem3').classList.remove('activeitem');
        }

        if (window.scrollY >= document.querySelector('.question2').offsetTop - 220 && window.scrollY <= (document.querySelector('.question3').offsetTop - 250)) {
            document.querySelector('.menuitem1').classList.remove('activeitem');
            document.querySelector('.menuitem2').classList.add('activeitem');
            document.querySelector('.menuitem3').classList.remove('activeitem');
        }
        if (window.scrollY >= (document.querySelector('.question3').offsetTop - 250)) {
            document.querySelector('.menuitem1').classList.remove('activeitem');
            document.querySelector('.menuitem2').classList.remove('activeitem');
            document.querySelector('.menuitem3').classList.add('activeitem');
        }
    }

}

// Formulärvalidering (med biblioteket just-validate)
// new window.JustValidate('.registerform', {
//     messages: {
//         firstname: 'Förnamnet är obligatoriskt.',
//         lastname: 'Efternamnet är obligatoriskt.',
//         phonenr: 'Du måste ange telefonnummer.',
//         personnr: {
//             minLength: 'Personnumret får inte vara kortare än 12 tecken.',
//             maxLength: 'Personnumret får inte vara längre än 12 tecken.',
//             required: 'Personnumret måste anges.'
//         },
//         required: 'Fältet är obligatoriskt.',
//         email: 'Vänligen ange en giltig e-postadress.',
//         maxLength: 'Fältet får max innehålla :value tecken.',
//         minLength: 'Fältet måste minst innehålla :value tecken.',
//         password: {
//             minLength: 'Lösenordet måste vara minst sju tecken långt.',
//             maxLength: 'Lösenordet får max vara 20 tecken långt.',
//             required: 'Du måste ange ett lösenord.'
//         },
//         checkbox: 'Du måste bocka i knappen.'
//     },
//     rules: {
//       email: {
//           required: true,
//           email: true
//       },
//       checkbox: {
//           required: true
//       },
//       firstname: {
//           required: true,
//           minLength: 3,
//           maxLength: 15
//       },
//       lastname: {
//           required: true,
//           minLength: 3,
//           maxLength: 15
//       },
//       password: {
//           required: true,
//           password: true,
//           minLength: 7,
//           maxLength: 20
//       },
//       zip: {
//           required: true,
//           zip: true
//       },
//       phonenr: {
//           required: true
//       },
//       personnr: {
//           required: true,
//           minLength: 12,
//           maxLength: 12
//       }
//   }, 
//   colorWrong: '#C8102E'
// });

$().ready(function() {
    // validerar registreringsformuläret

    $('.registerform').validate({
        rules: {
            firstname: 'required',
            lastname: 'required',
            email: {
                required: true,
                email: true
            }, 
            phonenr: 'required',
            personnr: {
                required: true,
                minlength: 12,
                maxlength: 12,
                number: true
            },
            password: {
                required: true,
                minlength: 7,
                maxlength: 20
            },
            gdpr: 'required'
        },
        messages: {
            firstname: 'Ange ditt förnamn.',
            lastname: 'Ange ditt efternamn.',
            email: 'Ange din e-postadress.',
            phonenr: 'Ange ditt telefonnummer.',
            personnr: {
                required: 'Ange ditt personnummer.',
                minlength: 'Personnumret måste vara tolv tecken långt.',
                maxlength: 'Personnumret måste vara tolv tecken långt.'
            },
            password: {
                required: 'Ange ditt önskade lösenord.',
                minlength: 'Lösenordet måste vara minst sju tecken långt.',
                maxlength: 'Lösenordet får max vara 20 tecken långt.'
            },
            confirm: 'Du måste bocka i knappen och godkänna policyn.'
        }
    })
})