
window.onscroll = function () { scrollFunction() };
function scrollFunction() {
	// console.log(window)
	if (window.scrollY !== 0) {
		document.getElementById("navbar").style.background = "rgba(0, 0, 0,0.7)";
	} else {
		document.getElementById("navbar").style.background = "transparent";

	}
}

const navToggle = document.querySelector(".nav-toggle");
const navLinks = document.querySelectorAll(".nav__link");

navToggle.addEventListener("click", () => {
	document.body.classList.toggle("nav-open");
});

navLinks.forEach((link) => {
	link.addEventListener("click", () => {
		document.body.classList.remove("nav-open");
	});
});
