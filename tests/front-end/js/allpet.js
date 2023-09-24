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

  tables();
    
// Close the popup when the user clicks outside of it
const popup = document.querySelector('.popup');

// window.addEventListener("click", function(event1) {
//   console.log(event1.target);
  
//     console.log(popup.style.display);
//     if(popup.style.display === 'block'){ 
      
//       window.addEventListener('click', event => {
//         if (!event.target.closest('.popup')) {
//           popup.style.display = "none";
//           console.log('closing');
//           window.removeEventListener('click', event);
          
//       }
//       });
  
//     }
  
  
// });

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
  
setTimeout(() => {
  window.addEventListener('click', clickHandler);
}, 200);

 


//    // Close the modal when clicking outside of it
//  window.addEventListener("click", (event) => {

//   if (event.target.closest('.popup')) {
//       closeModal();
//   }
//   if (popup.style.display === 'none') {
//     window.removeEventListener('click', event);
//     console.log('Click event listener removed.');
//   }
//   console.log(event.target);
// }, false);
  //    if (event.target != popup) {
  //         popup.style.display = "none";
  //     }
  // console.log("testandoooo");
  // });
  // }, 1000);

   

  break;

case 'closePopupButton':
  var popup = document.querySelector('.popup');
  popup.style.display = "none";
  console.log('closing');

  break;
case 'adicionarTutor':
  postData();
  
    break;
   
  default:
   
    // Do something when an input doesn't have a value
    console.log('Input is empty.');
  
}function closeModal() {
  popup.style.display = "none";
}


// // Prevent the click event inside the modal from closing it
// popup.addEventListener("click", (event) => {
//   event.stopPropagation();
// });
  
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


async function tables(){      // Get a reference to the tbody element where you want to display the JSON data.
const tbody = document.getElementById("table");

// URL of the JSON data source
const apiUrl = "http://localhost:8000//index.php?setup=true"; // Replace with your JSON data source URL

// Fetch JSON data from the URL
await fetch(apiUrl)
  .then((response) => {
    // Check if the response status is OK (status code 200)
    if (!response.ok) {
      throw new Error("Network response was not ok");
    }
    // Parse the JSON response
    return response.json();
  })
  .then((data) => {
    // Process the JSON data and populate the tbody with rows and cells
    data.forEach((item) => {
      // Create a new table row (<tr>)
      const row = document.createElement("tr");

      // Create table cells (<td>) for each property you want to display
      const cell1 = document.createElement("td");
      cell1.textContent = item.cpf; // Replace with the actual property name from your JSON data
      // console.log(item);
      const cell2 = document.createElement("td");
      // console.log(item.nome);
      cell2.textContent = item.nome; // Replace with the actual property name from your JSON data

      const cell3 = document.createElement("td");
      cell3.textContent = item.rua + ',' + item.num_da_casa + '.' + item.bairro + '-' + item.cidade + '/' + item.estado ;

      const cell6 = document.createElement("td");
      // console.log(item.nome);
      cell6.textContent = item.telefone; 


      // Excluir Button
      const cell4 = document.createElement("td");
      const buttonExc = document.createElement("button");
      buttonExc.type = "button";
      buttonExc.classList.add("btn", "btn-danger", "btn-sm");
      buttonExc.value = "Excluir";
      buttonExc.textContent = "Excluir";
      cell4.appendChild(buttonExc);

      // Editar Button
      const cell5 = document.createElement("td");
      const buttonEdt = document.createElement("button");
      buttonEdt.type = "button";
      buttonEdt.classList.add("btn", "btn-warning", "btn-sm");
      buttonEdt.value = "Editar";
      buttonEdt.textContent = "Editar";
      cell5.appendChild(buttonEdt);


      // Append cells to the row
      row.appendChild(cell1);
      row.appendChild(cell2);
      row.appendChild(cell3);
      row.appendChild(cell6);
      row.appendChild(cell5);
      row.appendChild(cell4);

      // Append the row to the tbody
      tbody.appendChild(row);

      buttonEdt.addEventListener('click', function(){
        alert('Button clicked');

      })
      buttonExc.addEventListener('click', function(){
        alert('Button clicked');
      })

    });
  })
  .catch((error) => {
    console.error("Fetch error:", error);
  });





}




      // Centralizing

      // Get references to the sidebar and popup elements
const sidebar = document.querySelector('.sidebar');


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
// function popupclose(){
  
  
  // }

  // Define the event listener function
function clickHandler(event) {
  console.log('Click event occurred.');
  if (!event.target.closest('.popup')) {
    popup.style.display = 'none';
    console.log(popup.style.display);
  }
  // Add your logic here for stopping the event listener when a certain condition is met.
  if (popup.style.display === 'none') {
    window.removeEventListener('click', clickHandler);
    console.log('Click event listener removed.');
  }
}



async function postData() {
  try {
      // Get form data as a FormData object
      const formData = new FormData(this);

      // Convert FormData to JSON
      const formDataJson = {};
      formData.forEach((value, key) => {
          formDataJson[key] = value;
      });

      // Send the data using Fetch API with await
      const response = await fetch("http://localhost:8000//index.php?cad", {
          method: "POST",
          headers: {
              "Content-Type": "application/json",
          },
          body: JSON.stringify(formDataJson),
      });

      if (!response.ok) {
          throw new Error('Network response was not ok');
      }

      // Parse the JSON response with await
      const data = await response.json();

      // Handle the response from the server
      console.log(data);
  } catch (error) {
      // Handle errors here
      console.error("Error:", error);
  }
}

// Call the async function when needed
 // Replace 'yourFormElement' with the actual form element
