function resizeText() {
    const containers = document.querySelectorAll('.postcard-description');
    
    containers.forEach(container => {
      const text = container.querySelector('.description-text');
      
      // Calculate new font size based on container's width and height
      const containerWidth = container.offsetWidth;
      const containerHeight = container.offsetHeight;
      const newSize = Math.min(containerWidth, containerHeight) / 10; // Adjust the divisor for your needs
      
      text.style.fontSize = `${newSize}px`;
    });
  }
  
  // Resize text when the window is resized
  window.addEventListener('resize', resizeText);
  
  // Initial call to set the size based on initial container size
  resizeText();
  