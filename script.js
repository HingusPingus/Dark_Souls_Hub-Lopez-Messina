document.addEventListener('DOMContentLoaded', function() {
    const animationContainer = document.getElementById('animation-container');
    const body = document.body;
    window.onbeforeunload=function(){
      window.scrollTo(0,0);
    }
    
    // Añadir la clase 'no-scroll' al body para bloquear el scroll
    body.classList.add('no-scroll');
  
    animationContainer.addEventListener('animationend', function() {
      // Añadir la clase 'loaded' al body para hacer visible el contenido principal
      body.classList.add('loaded');
      // Eliminar la clase 'no-scroll' para permitir el scroll
      body.classList.remove('no-scroll');
      // Opcionalmente, puedes ocultar el contenedor de la animación
      animationContainer.style.display = 'none';
    });
  });
