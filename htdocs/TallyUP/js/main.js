document.getElementById('ins-btn-company').addEventListener('click',
	function() {
		document.querySelector('.bg-modal').style.display = 'flex';
	}
);

document.getElementById('ins-btn-personal').addEventListener('click',
	function() {
		document.querySelector('.bg-modal').style.display = 'flex';
	}
);


/*
https://www.youtube.com/watch?v=C6227evfBig&t=825s&ab_channel=Bedimcode
10:50


const showNavbar = (toggleId, navId) =>{
	const toggle = document.getElementById(toggleId),
	nav = document.getElementById(navId)
	
	if(toggle && nav){
		toggle.addEventListener('click', ()=>{
			nav.classList.toggle('show')
		})
	}
}

*/