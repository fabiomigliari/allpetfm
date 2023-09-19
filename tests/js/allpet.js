function getWindowWidth() {
    return document.body.clientWidth;
  }
          // Function to handle width change
  function handleWidthChange(entries) {
    for (let entry of entries) 
    {
      var containerWidth = entry.contentRect.width;
      console.log(containerWidth);
      if(containerWidth <= 104)
      {
          var margin = document.querySelectorAll('.margin-l');
          console.log(margin);
  
          if(margin.length > 0)
          {
            margin.forEach(function(margin) 
            {
              margin.classList.replace('margin-l', 'margin-low');
            });
          }
          
          
      // Trigger your custom event or perform actions here
      }
      else if(containerWidth <= 224)
      {
          console.log(containerWidth);
        var margin = document.querySelectorAll('.margin-low');
          console.log(margin);
  
          if(margin.length > 0)
          {
            margin.forEach(function(margin) 
            {
              margin.classList.replace('margin-low', 'margin-l');
            });
          }
          
      }
      var previousWidth = getWindowWidth();
      var card = document.querySelector('#card');
      var cardRect = card.getBoundingClientRect();
      var cardWidth = cardRect.width;
  
      console.log(cardWidth, previousWidth, containerWidth);
      
      card.style.marginRight = (previousWidth - cardWidth - containerWidth)/2 + 'px';
        console.log(((previousWidth - cardWidth) - containerWidth) / 2);
    }
  }
  
  // Select the container element
  const container = document.querySelector('.sidebar');
  
  // Create a new ResizeObserver instance
  var resizeObserver = new ResizeObserver(handleWidthChange);
  
  // Start observing the container for width changes
  resizeObserver.observe(container);

  
    
// Close the popup when the user clicks outside of it

window.addEventListener("click", function(event) {
  console.log(event.target);
  var popup = document.querySelector('.popup');
  var cadastro;
  document.querySelectorAll('button').forEach(function (cadd){
    
    if(cadd.value === 'cadastro')
    {
      console.log(cadd);
     cadastro = cadd;
     console.log(cadastro);
    
    }
    // else{
    //   cadastro = 'not';
    // }
    
  });
  console.log(cadastro, 'test');
    console.log(popup);
  if (!event.target.closest('.popup') && event.target != cadastro) {
       popup.style.display = "none";
       console.log('closing');
   }
  
  
});


  // Performando a ação do botão submit
     const parentElements = Array.from(document.getElementsByTagName('form'));
    parentElements.forEach(function(parentElement) {

      console.log(parentElement);
      
      // Select all <input> elements inside the current parent element
      Array.from(parentElement.getElementsByTagName('button')).forEach( function(inputElements) {
        
        // Do something when an input has a value
        inputElements.addEventListener("click", function () {
          // Get the value of the input field
   var inputValue = inputElements.value;
   console.log(inputValue);
  
   // Check if the input element has a value
   switch (inputElements.value.trim()) {
    case 'Excluir':
    console.log(inputElements);
    var specificInput = inputElements.parentElement.parentElement.querySelector('input');
    console.log(specificInput);

     // Create a FormData object to send the data to the PHP script
   var formData = new FormData();
   console.log(formData.append("idTutor", specificInput.value));
   console.log(formData);
  
   fetch('droptutor.php', {
  method: 'POST',
  body: formData
})
.then(response => {
  if (response.ok) {
    return response.text();
  } else {
    throw new Error('Network response was not ok');
  }
})
.then(data => {
  console.log(updateElement(inputElements));
})
.catch(error => {
  console.error('Fetch error:', error);
});


    console.log(`Input value: ${inputElements.value}`);
  case 'Editar':

    console.log(inputElements);
    var specificInput = inputElements.parentElement.parentElement.querySelector('input');
    console.log(specificInput);
    // Create a FormData object to send the data to the PHP script
   var formData = new FormData();
   console.log(formData.append("idTutor", specificInput.value));
   console.log(formData);

    fetch('updatetutor.php', {
  method: 'POST',
  body: formData
})
.then(response => {
  if (response.ok) {
    return response.text();
  } else {
    throw new Error('Network response was not ok');
  }
})
.then(data => {
  console.log(data);
})
.catch(error => {
  console.error('Fetch error:', error);
});

case 'cadastro':
  var popup = document.querySelector('.popup');
  console.log(popup);

  popup.style.display = "block";

  centerPopup();
// // Close the popup when the user clicks outside of it
// window.addEventListener("click", function(event) {
//   console.log(event.target);
//   if (event.target != popup) {
//        popup.style.display = "none";
//    }
// });
   

  break;

case 'closePopupButton':
  var popup = document.querySelector('.popup');
  popup.style.display = "none";
  console.log('closing');

  break;
   
  default:
    // Do something when an input doesn't have a value
    console.log('Input is empty.');
  
}
  
  console.log(inputElements);
  
  
  
      });
      
  
      // for (let j = 0; j < inputElements.length; j++) {
      //     const inputElement = inputElements[j];
          // console.log(inputElement);
  
          
        });
      });

      function updateElement(targetElement)
      {
        if (targetElement) {
          // Get the parent element (father/mother)
          var parentElement = targetElement.parentElement;
        
          if (parentElement) {
            // Get the grandfather element
            var grandfatherElement = parentElement.parentElement;
        
            if (grandfatherElement) {
              // Now, you have the grandfather element
              grandfatherElement.remove();
            } else {
              console.log("There is no grandfather element.");
            }
          } else {
            console.log("There is no parent element.");
          }
        } else {
          console.log("Element with id 'targetElement' not found.");
        }
        // Make sure to replace "targetElement" with the actual ID or reference to the element you want to work with. This code will check at each step if the parent or grandfather elements exist to avoid errors when they are not present.
                
      }









      // Centralizing

      // Get references to the sidebar and popup elements
const sidebar = document.querySelector('.sidebar');
const popup = document.querySelector('.popup');

// Function to centralize the popup
function centerPopup() {
  // Get dimensions of the viewport
  const viewportWidth = window.innerWidth;
 // const viewportHeight = window.innerHeight;

  // Get dimensions of the sidebar
  const sidebarWidth = sidebar.offsetWidth;

  // Get dimensions of the popup
  const popupWidth = popup.offsetWidth;
  //const popupHeight = popup.offsetHeight;

  // Calculate the position for the popup, considering the sidebar width
  const popupLeft = (viewportWidth - popupWidth) / 2 + sidebarWidth / 2;
  //const popupTop = (viewportHeight - popupHeight) / 2;

  // Set the position of the popup using CSS
  popup.style.left = popupLeft + 'px';
  //popup.style.top = popupTop + 'px';
}

// Call the centerPopup function initially and whenever the window is resized
centerPopup();
window.addEventListener('resize', centerPopup);
