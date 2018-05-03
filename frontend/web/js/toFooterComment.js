// When the user scrolls down 20px from the top of the document, show the button
//Кнопка "Оставить Отзыв"
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 1 || document.documentElement.scrollTop > 1) {
        document.getElementById("myBtnComment").style.display = "block";
    } else {
        document.getElementById("myBtnComment").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 100; // For Safari
    document.documentElement.scrollTop = 10000; // For Chrome, Firefox, IE and Opera
}
