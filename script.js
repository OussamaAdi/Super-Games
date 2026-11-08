// Small page behaviours, loaded on every page by includes/footer.php.

document.addEventListener("DOMContentLoaded", function () {

    // Home page spotlight: clicking a thumbnail shows that game in the big panel.
    // Each thumbnail button carries its text in data-* attributes (see index.php).
    var thumbs = document.querySelectorAll(".spotlight-thumb");
    Array.prototype.forEach.call(thumbs, function (thumb) {
        thumb.addEventListener("click", function () {
            var d = thumb.dataset;
            document.getElementById("spotlight-image").src = d.image;
            document.getElementById("spotlight-link").href = d.link;
            var panel = document.getElementById("spotlight");
            panel.style.setProperty("--accent", d.color);
            panel.style.setProperty("--accent2", d.color2);
            ["title", "tagline", "text1", "text2", "headline"].forEach(function (field) {
                document.getElementById("spotlight-" + field).textContent = d[field];
            });
        });
    });

    // "Back" links go to the previous page
    Array.prototype.forEach.call(document.querySelectorAll(".js-back"), function (link) {
        link.addEventListener("click", function (event) {
            event.preventDefault();
            window.history.back();
        });
    });
});
