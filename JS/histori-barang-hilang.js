document.addEventListener('DOMContentLoaded', function() {
    const reactionImages = document.querySelectorAll('.reaction img');
    
    reactionImages.forEach((img, index) => {
        img.addEventListener('click', () => {
            const likeCounter = img.nextElementSibling;

            if (img.src.includes('love-white.png')) {
                img.src = 'icon/love-red.png';
                let currentLikes = parseInt(likeCounter.textContent.split(' ')[0]);
                currentLikes++;
                likeCounter.textContent = `${currentLikes} likes`;
            } else {
                img.src = 'icon/love-white.png';
                let currentLikes = parseInt(likeCounter.textContent.split(' ')[0]);
                currentLikes--;
                likeCounter.textContent = `${currentLikes} likes`;
            }
        });
    });

    
    var backToTopBtn = document.querySelector('.back-top');

    backToTopBtn.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});