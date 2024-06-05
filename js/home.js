function resizeDescriptionText() {
    const containers = document.querySelectorAll('.postcard-description');

    containers.forEach(container => {
        const text = container.querySelector('.description-text');
        const containerWidth = container.offsetWidth;
        const containerHeight = container.offsetHeight;
        const newSize = Math.min(containerWidth, containerHeight) / 15;

        text.style.fontSize = `${newSize}px`;
    });
}

function resizeInfoText() {
    const containers = document.querySelectorAll('.postcard-info');

    containers.forEach(container => {
        const infoText = container.querySelectorAll('.info-text');
        const infoSymbol = container.querySelectorAll('.info-symbol');

        const containerWidth = container.offsetWidth;
        const containerHeight = container.offsetHeight;

        const newSize = Math.min(containerWidth, containerHeight) / 12;
        const newSymbolSize = Math.min(containerWidth, containerHeight) / 8;

        infoText.forEach(text => {
            text.style.fontSize = `${newSize}px`;
        });

        infoSymbol.forEach(symbol => {
            symbol.style.fontSize = `${newSymbolSize}px`;
        });
    });
}

window.onload = function () {
    resizeDescriptionText();
    resizeInfoText();
};

window.onresize = function () {
    resizeDescriptionText();
    resizeInfoText();
};
