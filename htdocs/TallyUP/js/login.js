const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

function show_page(visibleId, hiddenId) {
	var e = document.getElementById(visibleId);
	var f = document.getElementById(hiddenId);
	f.style.visibility = 'hidden';
	if(e.style.opacity == '1') {
		e.style.opacity = '0';
	}
	else {
		e.style.opacity = '1';
	}
};