
//Imagen left//
const imagen = document.getElementById('imagen');
        const texto = document.getElementById('texto');
        imagen.addEventListener('mouseover', () => {
            imagen.style.transform = 'translateX(-105px) scale(0.9)'; 
            texto.style.transform = 'translate(-50%, -50%) translateX(400px)'; 
            texto.style.opacity = 1; 
        });

        imagen.addEventListener('mouseout', () => {
            imagen.style.transform = 'translateX(0) scale(1)'; 
            texto.style.transform = 'translate(-5%, -50%) translateX(0)';
            texto.style.opacity = 0; 
        });

//Imagen Right//

const imagend = document.getElementById('imagend');
const textod = document.getElementById('textod');
imagend.addEventListener('mouseover', () => {
    imagend.style.transform = 'translateX(105px) scale(0.9)';
    textod.style.transform = 'translate(-50%, -50%) translateX(-100px)'; 
    textod.style.opacity = 1;
});

imagend.addEventListener('mouseout', () => {
    imagend.style.transform = 'translateX(0) scale(1)';
    textod.style.transform = 'translate(-5%, -50%) translateX(0)';
    textod.style.opacity = 0;
});


      

const imagends = document.getElementById('imagends');
const textods = document.getElementById('textods');
imagends.addEventListener('mouseover', () => {
    imagends.style.transform = 'translateX(105px) scale(0.9)'; 
    textods.style.transform = 'translate(-50%, -50%) translateX(-100px)'; 
    textods.style.opacity = 1;
});

imagends.addEventListener('mouseout', () => {
    imagends.style.transform = 'translateX(0) scale(1)';
    textods.style.transform = 'translate(-5%, -50%) translateX(0)';
    textods.style.opacity = 0;
});