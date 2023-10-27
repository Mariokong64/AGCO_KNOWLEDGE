var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}


// FUNCIÓN PARA QUE EL DESPLAZAMIENTO DE LOS ANCOR SEA SUAVECITO

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
    e.preventDefault();

    const targetId = this.getAttribute('href').substring(1);
    const targetElement = document.getElementById(targetId);

    if (targetElement) {
      // Opciones para el desplazamiento suave
      const scrollOptions = {
        behavior: 'smooth', // Hace que el desplazamiento sea suave
        block: 'start',     // Desplaza hasta la parte superior del elemento
      };

      // Aplica el desplazamiento suave al elemento objetivo
      targetElement.scrollIntoView(scrollOptions);
    }
  });
});