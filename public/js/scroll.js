function scrollToLeft(containerId) {
    const container = document.getElementById(containerId);
    console.log('before scroll Left', container.scrollLeft);

    container.scrollBy({
        left: -50, // Fixed increment
        behavior: 'smooth',
    });

    setTimeout(() => {
        console.log('after scroll Left', container.scrollLeft); // Log after the animation
    }, 300); // Duration of smooth scrolling
}

function scrollToRight(containerId) {
    const container = document.getElementById(containerId);
    console.log('before scroll Right', container.scrollLeft);

    container.scrollBy({
        left: 50, // Fixed increment
        behavior: 'smooth',
    });

    setTimeout(() => {
        console.log('after scroll Right', container.scrollLeft); // Log after the animation
    }, 300); // Duration of smooth scrolling
}
