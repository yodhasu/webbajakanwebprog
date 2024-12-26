function scrollLeft(containerId) {
    const container = document.getElementById(containerId);
    container.scroll({
        left: container.scrollLeft - 300,
        behavior: 'smooth'
    });
}

function scrollRight(containerId) {
    const container = document.getElementById(containerId);
    container.scroll({
        left: container.scrollLeft + 300,
        behavior: 'smooth'
    });
}
