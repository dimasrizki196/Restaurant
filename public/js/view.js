document.addEventListener('DOMContentLoaded', function() {
    const categoryDropdown = document.getElementById('category_id');
    const jumbotrons = document.querySelectorAll('.jumbotron');
    const categoryHeadings = document.querySelectorAll('.category-heading');
    const slides = document.querySelectorAll('.slide[data-category]');

    jumbotrons.forEach(jumbotron => {
        jumbotron.style.display = 'none';
    });
    categoryHeadings.forEach(heading => {
        heading.style.display = 'none';
    });
    slides.forEach(slide => {
        slide.style.display = 'none';
    });

    categoryDropdown.addEventListener('change', function() {
        const selectedCategoryId = this.value;
        
        jumbotrons.forEach(jumbotron => {
            jumbotron.style.display = 'none';
        });
        categoryHeadings.forEach(heading => {
            heading.style.display = 'none';
        });
        slides.forEach(slide => {
            slide.style.display = 'none';
        });

        if (selectedCategoryId) {
            const selectedCategory = document.querySelector(`.jumbotron[data-category="${selectedCategoryId}"]`);
            const selectedCategoryHeading = document.querySelector(`.category-heading[data-category="${selectedCategoryId}"]`);
            const selectedSlide = document.querySelector(`.slide[data-category="${selectedCategoryId}"]`);
            if (selectedCategory && selectedCategoryHeading && selectedSlide) {
                selectedCategory.style.display = 'flex';
                selectedCategoryHeading.style.display = 'block';
                selectedSlide.style.display = 'block';
            }
        }
    });
});


function showDescription() {
    var descriptionDiv = document.getElementById('descriptionDiv');
    descriptionDiv.style.display = 'block';
}

function hideDescription() {
    var descriptionDiv = document.getElementById('descriptionDiv');
    descriptionDiv.style.display = 'none';
}

function confirmLogin(event) {
    event.preventDefault();
    const loginConfirmed = confirm("Login to set up !");
    if (loginConfirmed) {
        // Lakukan login
        const loginForm = document.getElementById('login-form');
        loginForm.submit();
    } else {
        // Batal login
        return false;
    }
}
