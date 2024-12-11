function scrollLeft(containerId) {
    const container = document.getElementById(containerId);
    container.scrollBy({ left: -300, behavior: 'smooth' }); // Scroll left by 300px
}

function scrollRight(containerId) {
    const container = document.getElementById(containerId);
    container.scrollBy({ left: 300, behavior: 'smooth' }); // Scroll right by 300px
}
