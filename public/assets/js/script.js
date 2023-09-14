if ($("html").attr("lang") != 'en') {
  document.getElementById("titleLang").innerHTML = 'ភាសាខ្មែរ' + `<img src="/assets/images/victor/cambodia.png" alt="icon-lang" />`;
}else{
  document.getElementById("titleLang").innerHTML = 'English' + `<img src="/assets/images/victor/english.png" alt="icon-lang" />`;
}

// accordion 
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
      panel.style.marginBottom = 0;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
      panel.style.marginBottom = "20px";
    } 
  });
}
// end accordion 

function displayLang(name) {
  
  var titleLang = document.getElementById("titleLang");
  if (name == 'English') {
      titleLang.innerHTML = name + `<img src="/assets/images/victor/english.png" alt="icon-lang" />`;
  } else {
      titleLang.innerHTML = name + `<img src="/assets/images/victor/cambodia.png" alt="icon-lang" />`;
  }
}

// rendom image what esim ====================
var swiper = new Swiper(".mySwiper2", {
  spaceBetween: 30,
  centeredSlides: true,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
// rendom image what esim ==================== end

var swiper = new Swiper(".mySwiper", {
  slidesPerView: 2,
  spaceBetween: 20,
  loop: true,
  centeredSlides: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    375: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    425: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 40,
    },
    1024: {
      slidesPerView: "auto",
      spaceBetween: 20,
    },
  },
});

var swiper = new Swiper(".slideRelate", {
  slidesPerView: 4,
  spaceBetween: 30,
  loop: true,
  centeredSlides: false,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  // autoplay: {
  //   delay: 3000,
  //   disableOnInteraction: true,
  // },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    320: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    375: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    425: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    640: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
    1024: {
      slidesPerView: 4,
      spaceBetween: 40,
    },
    1440: {
      slidesPerView: 4,
      spaceBetween: 40,
    },
  },
});

var swiper = new Swiper(".bestPlansSlider", {
  slidesPerView: 3,
  spaceBetween: 30,
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  autoplay: {
    delay: 3000,
    disableOnInteraction: true,
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    375: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    425: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
  },
});

var swiper = new Swiper(".sliderEmployee", {
  slidesPerView: 3,
  spaceBetween: 30,
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  // autoplay: {
  //   delay: 3000,
  //   disableOnInteraction: true,
  // },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    375: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    425: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
  },
});

// swiper slide detail product 
var swiper = new Swiper(".mySwiperDetail", {
  spaceBetween: 10,
  slidesPerView: 4,
  freeMode: true,
  watchSlidesProgress: true,
});

var swiper2 = new Swiper(".mySwiperDetail2", {
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: swiper,
  },
});

// vertical tab account
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
// document.getElementById("defaultOpen").click();
//end vertical

// Dropdown click java
function onClickDrop() {
  document.getElementById("eSimPlans").classList.toggle("show");
  document.getElementById("iconUp").classList.toggle("up");
  document.getElementById("iconDown").classList.toggle("down");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
// Dropdown click java end

// onchange country code 
function onChangeCountryCode(country_code) {
  const selectedIcon = $('.select-country ' + '#' + country_code + " img").attr('src')
  $('#icon').attr('src', selectedIcon);
  const selectedCode = $('.select-country ' + '#' + country_code + " a").text();
  $('#btn-country').text(selectedCode);
}

// tab content set up esim 
function ontabSetup(name) {
  var andriod = document.getElementById('android');
  var ios = document.getElementById('ios');
  var btnandriod = document.getElementById('btn-andriod');
  var btnios = document.getElementById('btn-ios');

  if (name != 'ios') {
    andriod.style.display = 'block';
    ios.style.display = 'none';
    btnandriod.classList.add("active-button");
    btnios.classList.remove("active-button");
  } else{
    btnandriod.classList.remove("active-button");
    btnios.classList.add("active-button");
    andriod.style.display = 'none';
    ios.style.display = 'block';
  }
}
// tab content set up esim end





// window.onhashchange = function() {
//   //blah blah blah
//  }