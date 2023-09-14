window.onscroll = function() {onFixMenu()};
    const onFixMenu = () => {
        const mainHeaderMenu = document.getElementById("fixScrollMenu");
        const menuMobile = document.getElementById("menuMobile");
        let mybutton = document.getElementById("myBtn");
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mainHeaderMenu.style.position = "fixed";
            mainHeaderMenu.style.zIndex = 999;
            mainHeaderMenu.style.background = "#fff";
            mainHeaderMenu.style.width = "100%";
            mainHeaderMenu.style.top = 0;
            mainHeaderMenu.style.boxShadow= "0px 4px 30px rgba(0, 0, 0, 0.1)";
            // mainHeaderMenu.classList.add("fadeInDown");
            // scroll top 
            mybutton.style.display = "block";
            // menu mobile 
            menuMobile.style.position = "fixed";
            menuMobile.style.zIndex = 999;
            menuMobile.style.background = "#fff";
            menuMobile.style.top = 0;
            menuMobile.style.left = 0;
            menuMobile.style.width = "100%";
            menuMobile.style.boxShadow= "0px 4px 30px rgba(0, 0, 0, 0.1)";
            menuMobile.style.padding= "12px 20px";
            // menuMobile.classList.add("fadeInDown");
        } else {
            mainHeaderMenu.style.position = "relative";
            mainHeaderMenu.classList.remove("fadeInDown");
            mainHeaderMenu.style.boxShadow= "none";
            // scroll top 
            mybutton.style.display = "none";
            // menu mobile 
            menuMobile.classList.remove("fadeInDown");
            menuMobile.style.position = "relative";
            menuMobile.style.boxShadow= "none";
            menuMobile.style.padding= "12px 0";
        }

    }

// back to top 
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
// back to top end