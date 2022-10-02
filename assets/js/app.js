/* проверка поддержки webp, добавление класса webp или no-webp для HTML */
(() => {
  function isWebp() {
    //проверка поддержки webp
    function testWebP(callback) {
      let webP = new Image();
      webP.onload = webP.onerror = function() {
        callback(webP.height == 2);
      }
      webP.src = "data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA";
    }
    //добавление класса _webp или _no-webp для HTML
    testWebP(function(support) {
      let className=support === true ? 'webp' : 'no-webp';
      document.documentElement.classList.add(className);
    });
  }
  isWebp();
})();

//hamburger menu
(() => {
  const hamburger = document.querySelector(".hamburger");
  const navMenu = document.querySelector(".hamburger-menu");

  hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
    document.body.classList.toggle('locked');
  });
  
//если телефон повернут вертикально и экран расширится, чтобы сбросить все блокировки
  window.addEventListener('resize', () => {
    if(window.innerWidth > 768) {
      hamburger.classList.remove("active");
      navMenu.classList.remove("active"); 
      document.body.classList.remove("locked");
    }
  })
})();

//modal
(() => {
  function bindModal(triggerSelector, modalSelector, closeSelector, closeClickOverlay = true) {
    const trigger = document.querySelectorAll(triggerSelector),
          modal = document.querySelector(modalSelector),
          close = document.querySelector(closeSelector),
          windows = document.querySelectorAll('[data-modal]');

    trigger.forEach(item => {
      item.addEventListener('click', (e) => {
        if(e.target) {
          e.preventDefault();
        }
        windows.forEach(item => {
          item.style.display = 'none';
        });

        modal.style.display = "block";
        document.body.style.overflow = "hidden"; 
      });
    });

    close.addEventListener('click', () => {
      windows.forEach(item => {
        item.style.display = 'none';
      });

      modal.style.display = "none";
      document.body.style.overflow = ""; 
    });

    modal.addEventListener('click', (e) => {
      if(e.target === modal && closeClickOverlay) {
        windows.forEach(item => {
          item.style.display = 'none';
        });

        modal.style.display = "none";
        document.body.style.overflow = "";     
      }
    });
  }
  
  bindModal('.js_popup_consultation_btn', '.popup', '.popup .popup__close');
})();

//form
(() => { 
  const forms = document.querySelectorAll('form');
  
  const checkNumInputs = (selector) => {
    const numInputs = document.querySelectorAll(selector);
    numInputs.forEach(item => {
      item.addEventListener('input', () => {
        item.value = item.value.replace(/\D/, '');
      });
    });
  };      
  checkNumInputs('input[name="phone"]');
        
  forms.forEach(item => {
    item.addEventListener('submit', (e) => {
      e.preventDefault();
      let error = formValidate(item);
      
      const formData = new FormData(item);
      
      if(error === 0) {
        item.classList.add('js_sending');
        
        const postData = async (url, data) => {
          let res = await fetch(url, {
            method: "POST",
            body: data
          });
          // return await res.text();
          return res;
        }
        
        const url = WPJS.ajaxUrl + '?action=send_email';
        
        // postData("sendmail.php", formData)
        postData(url, formData)
        .then(res => {
          if(res.ok) {
            item.reset();
            item.classList.remove('js_sending');
            item.classList.add('js_success');
            setTimeout(() => {
              item.classList.remove('js_success');
              if (item.closest(".form").closest(".popup")) {
                item.closest(".form").closest("[data-modal]").style.display = "none";
                document.body.style.overflow = "";
              }
            }, 3000);
          }else {
            item.classList.remove('js_sending');
            item.classList.add('js_error');
            setTimeout(() => {
              item.classList.remove('js_error');
            }, 3000);
          }
        })
        .catch(() => {
          item.classList.remove('js_sending');
          item.classList.add('js_error');
          setTimeout(() => {
            item.classList.remove('js_error');
          }, 3000);
        });
      } 
    });
  });
  
  const formValidate = (form) => {
    let error = 0;
    let formReq = form.querySelectorAll('.js_req');
    
    for(let i = 0; i < formReq.length; i++) {
      const input = formReq[i];
      formRemoveError(input);
          
      if(input.classList.contains('_email')) {
        if(emailTest(input)) {
          formAddError(input);
          error++;
        }
      }else if(input.getAttribute("type") === "checkbox" && input.checked === false) {
        formAddError(input);
        error++;
      }else {
        if(input.value === "") {
          formAddError(input);
          error++;
        }
      }
    }
    
    return error;
  }
  const formAddError = (input) => {
    // input.parentElement.classList.add('_error');
    input.classList.add('js_error');
  }
  const formRemoveError = (input) => {
    // input.parentElement.classList.remove('_error');
    input.classList.remove('js_error');
  }
  const emailTest = (input) => {
    return !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(input.value);
  }
})();