<!DOCTYPE html>
<html lang="en-US">

<head>
	<title>Home Page</title>
  <link rel="stylesheet" href="styles/styles.css">
  <link rel="stylesheet" href="styles/home.css">
</head>


	<?php
		include_once 'header.php';
	?>

	<div class="carousel">
			<div class="carousel-slide">
			  <img src="images/slide1.png" alt="Image 1">
			</div>
			<div class="carousel-slide">
			  <img src="images/slide2.png" alt="Image 2">
			</div>
			<div class="carousel-slide">
			  <img src="images/slide3.png" alt="Image 3">
			</div>
			<a class="carousel-prev" onclick="prevSlide()">&#10094;</a>
			<a class="carousel-next" onclick="nextSlide()">&#10095;</a>
		  </div>
		
		  <h2>FEATURED CATEGORIES</h2>

		  <div class="category-container">
			<div class="category">
			<img class="image_size" src="images/home1.jpeg" alt="Category 1">
			<h3>Men</h3>
			</div>
			<div class="category">
			<img class="image_size" src="images/home2.jpeg" alt="Category 2">
			<h3>Women</h3>
			</div>
			<div class="category">
			<img class="image_size" src="images/home3.jpeg" alt="Category 3">
			<h3>Kids</h3>
			</div>
		</div>
		<div class="category-container">
			<div class="category">
			<img class="image_size" src="images/home4.jpeg" alt="Category 5">
			<h3>Unisex</h3>
			</div>
			<div class="category">
			<img class="image_size" src="images/home5.jpeg" alt="Category 6">
			<h3>Accessories</h3>
			</div>
	  </div>
	  
	  <script>
	  displayAlert();
			function displayAlert() {
				var currentUrl = window.location.href;
					
				if (currentUrl.includes("http://localhost/Online%20fashion%20store/home.php?message=accountdeleted")) {
				  alert("Account deleted succussfully!");
				}
				else if (currentUrl.includes("http://localhost/Online%20fashion%20store/home.php?message=userlogout")) {
				  alert("Logout succussfully!");
				}
			}

	  //home page carousel js
	const carousel = document.querySelector('.carousel');
		const slides = Array.from(carousel.querySelectorAll('.carousel-slide'));

		let currentSlide = 0;

		function showSlide(slideIndex) {
		  slides[currentSlide].classList.remove('active');
		  slides[slideIndex].classList.add('active');
		  currentSlide = slideIndex;
		}

		function nextSlide() {
		  const nextSlideIndex = (currentSlide + 1) % slides.length;
		  showSlide(nextSlideIndex);
		}

		function prevSlide() {
		  const prevSlideIndex = (currentSlide - 1 + slides.length) % slides.length;
		  showSlide(prevSlideIndex);
		}

		setInterval(nextSlide, 3000);
	  </script>

	  
	  
	<?php
		include_once 'footer.php';
	?>