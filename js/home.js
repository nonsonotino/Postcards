function resizeDescriptionText() {
    const containers = document.querySelectorAll('.postcard-description');

    containers.forEach(container => {
        const text = container.querySelector('.description-text');

        // Calculate new font size based on container's width and height
        const containerWidth = container.offsetWidth;
        const containerHeight = container.offsetHeight;
        const newSize = Math.min(containerWidth, containerHeight) / 15; // Adjust the divisor for your needs

        text.style.fontSize = `${newSize}px`;
    });
}

function resizeInfoText() {
    const containers = document.querySelectorAll('.postcard-info'); 

    containers.forEach(container=> {
        const infoText = container.querySelectorAll('.info-text');
        const infoSymbol = container.querySelectorAll('.info-symbol');

        const containerWidth = container.offsetWidth;
        const containerHeight = container.offsetHeight;

        const newSize = Math.min(containerWidth, containerHeight) / 12; // Adjust the divisor for your needs
        const newSymbolSize = Math.min(containerWidth, containerHeight) / 8

        infoText.forEach(text=> {
            text.style.fontSize = `${newSize}px`;
        });

        infoSymbol.forEach(symbol=> {
            symbol.style.fontSize = `${newSymbolSize}px`;
        });
    });
}

// Resize text when the window is resized
window.addEventListener('resize', resizeDescriptionText);
window.addEventListener('resize', resizeInfoText);

// Initial call to set the size based on initial container size
resizeDescriptionText();
resizeInfoText();
