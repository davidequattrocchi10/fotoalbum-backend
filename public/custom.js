
document.addEventListener('DOMContentLoaded', function () {
    let header = document.getElementById('jumbotron');
    let carousel = document.getElementById('carouselExampleInterval');
    let activeItem = carousel.querySelector('.carousel-item.active img');
    console.log(header.style);
    console.log(carousel);
    console.log(activeItem.currentSrc);

    // immagine di sfondo iniziale
    if (activeItem) {
        header.style.backgroundImage = 'url(' + activeItem.currentSrc + ')';
    }

    // Listener per l'evento 'slide.bs.carousel' per aggiornare l'immagine di sfondo
    carousel.addEventListener('slide.bs.carousel', function (e) {
        console.log(e.relatedTarget.childNodes[1].currentSrc);
        let nextImage = e.relatedTarget.childNodes[1].currentSrc;
        header.style.backgroundImage = 'url(' + nextImage + ')';
    });
});
