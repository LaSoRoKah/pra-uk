// like feature
let likeBtn = document.querySelector('.like-btn'); 

		function toggleLike() { 
			likeBtn.classList.toggle('active'); 

			// Toggle Font Awesome class for the 
			// thumbs-up and thumbs-down icons 
			if (likeBtn.classList.contains('active')) { 
				likeBtn.innerHTML = 
					'<i class="fa-solid fa-heart"></i>'; 
			} else { 
				likeBtn.innerHTML = 
					'<i class="fa-regular fa-heart"></i>'; 
			} 
		}
        