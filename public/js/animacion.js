window.addEventListener('load', () => {
    const contenedor_loader = document.querySelector('.contenedor_loader');
    

    setTimeout(() => {
      contenedor_loader.style.opacity = 0;
      contenedor_loader.style.visibility = 'hidden';
    }, 100); 
  });
  