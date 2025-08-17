// Get the container element
const container = document.getElementById('container');

// Loop from 1 to 100 to create boxes
for (let i = 1; i <= 100; i++) {
  const box = document.createElement('div');   // Create a new div
  box.classList.add('box');                    // Add 'box' class
  box.innerText = 'Box' + i;                   // Set box text

  if (i % 2 === 0) {
    // Even box styling
    box.style.backgroundColor = 'green';
    box.style.color = 'white';
  } else {
    // Odd box styling
    box.style.backgroundColor = 'orange';
    box.style.fontFamily = 'Arial';
  }

  container.appendChild(box);  // Add the box to the container
}
