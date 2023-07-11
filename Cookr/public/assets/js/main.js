window.addEventListener('load', () => {

  /* ----- MOBILE MENU ----- */

  const hamburgerMenu = document.getElementById("hamburger-menu");
  const mobileNav = document.getElementById("mobile-nav");
  const closeIcon = document.getElementById("close-icon");
  const firstLink = document.querySelectorAll('#desktop-nav ul li')[0].getElementsByTagName('a')[0];
  const secondLink = document.querySelectorAll('#desktop-nav ul li')[1].getElementsByTagName('a')[0];
  const thirdLink = document.querySelectorAll('#desktop-nav ul li')[2].getElementsByTagName('a')[0];
  const fourthLink = document.querySelectorAll('#desktop-nav ul li')[3].getElementsByTagName('a')[0];
  const mobileFirstLink = document.querySelectorAll('#mobile-nav ul li')[0].getElementsByTagName('a')[0];
  const mobileSecondLink = document.querySelectorAll('#mobile-nav ul li')[1].getElementsByTagName('a')[0];
  const mobileThirdLink = document.querySelectorAll('#mobile-nav ul li')[2].getElementsByTagName('a')[0];
  const mobileFourthLink = document.querySelectorAll('#mobile-nav ul li')[3].getElementsByTagName('a')[0];

  hamburgerMenu.addEventListener('click', () => {
    mobileNav.style.transform = "translateX(100%)";
  });

  closeIcon.addEventListener('click', () => {
    mobileNav.style.transform = "translateX(0)";
  });

  switch (window.location.pathname) {
    case '/index.html':
      firstLink.classList.add('underline');
      mobileFirstLink.classList.add('underline');
      break;
    case '/recipes.html':
      secondLink.classList.add('underline');
      mobileSecondLink.classList.add('underline');
      break;
    case '/recipe.html':
      secondLink.classList.add('underline');
      mobileSecondLink.classList.add('underline');
      break;
    case '/articles.html':
      thirdLink.classList.add('underline');
      mobileThirdLink.classList.add('underline');
      break;
    case '/article.html':
      thirdLink.classList.add('underline');
      mobileThirdLink.classList.add('underline');
      break;
    case '/contact.html':
      fourthLink.classList.add('underline');
      mobileFourthLink.classList.add('underline');
      break;
    default:
      break;
  }

  /* ----- MOBILE MENU ----- */

  /* ----- SEARCH BAR ----- */

  const inputSearch = document.getElementsByClassName('input-search')[0];
  if(inputSearch) {
    inputSearch.addEventListener('keyup', () => {
      const myInput = document.getElementsByClassName('input-search')[0];
      const filter = myInput.value.toUpperCase();
      const results = document.getElementById('results');
      const li = results.getElementsByTagName('li');
      let i, txtValue;

      if (myInput.value === "") {
        results.style.display = "none";
      } else {
        results.style.display = "block";
      }

      for (i = 0; i < li.length; i++) {
        txtValue = li[i].textContent || li[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";
        } else {
          li[i].style.display = "none";
        }
      }
    });
  }

  /* ----- SEARCH BAR ----- */

  /* ----- FOOTER MENU ----- */

  const footerButton = document.getElementById("footer-button");
  const footerMenu = document.getElementById("footer-menu");

  footerButton.addEventListener('click', () => {
    footerMenu.style.height = (parseInt(footerMenu.offsetHeight) === 0) ? "80px" : "0";
  })
  
  /* ----- FOOTER MENU ----- */


  /* ----- TEXTAREA MAX LENGTH ----- */
  const textarea = document.getElementById("message");
  const textareaLengthContainer = document.getElementById("message-length");
  let currentLength;
  let maxLength;
  if(textarea && textareaLengthContainer){
    currentLength = textareaLengthContainer.firstElementChild;
    maxLength = textareaLengthContainer.lastElementChild;

    // Block paste if text becomes too long
    textarea.addEventListener("paste", function (e){
      const pasteContent = (e.clipboardData || window.clipboardData).getData("text");
      if((parseInt(currentLength.innerHTML) + pasteContent.length) > parseInt(maxLength.innerHTML)){
        e.preventDefault();
      }
    });

    // Block typing if text becomes too long
    textarea.addEventListener("keydown", function (e){
      if(textarea.value.length >= parseInt(maxLength.innerHTML) && e.key !== "Backspace") {
        e.preventDefault();
      }
    });

    // keyup event to update length of text
    textarea.addEventListener("keyup", function (){
      currentLength.innerHTML = textarea.value.length;
    });
  }


  /* ----- TEXTAREA MAX LENGTH ----- */

});