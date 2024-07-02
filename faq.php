<!DOCTYPE html>
<html lang="en-US">

<head>
	<title>FAQ Page</title>
	<link rel="stylesheet" href="styles/stylesnimsi.css"></link>
	<link rel="stylesheet" href="styles/styles.css"></link>
    <script src="js/javascript.js"></script>

</head>

	<?php
    include_once 'header.php';
?>


	
	<div class="container-faq">
    <div class="faq-item">
      <div class="faq-question" onclick="toggleAnswer(1)">How can I place an order on your online fashion store?</div>
      <div class="faq-answer" id="answer1">
        To place an order, simply browse through our collection, select the items you wish to purchase, choose the appropriate size and color (if applicable), and click on the "Add to Cart" button. Once you've added all desired items, proceed to the checkout page to finalize your order..
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question" onclick="toggleAnswer(2)">What payment methods do you accept?</div>
      <div class="faq-answer" id="answer2">
        We accept various payment methods, including credit/debit cards, PayPal. At the checkout, you can choose the payment method that suits you best.
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question" onclick="toggleAnswer(3)">What if the item I received is damaged or incorrect?</div>
      <div class="faq-answer" id="answer3">
        If you receive a damaged item or an incorrect order, please contact our customer support immediately. We will assist you in resolving the issue by offering a replacement, refund, or exchange, depending on the circumstances
      </div>
    </div>
	
	
	<div class="faq-item">
      <div class="faq-question" onclick="toggleAnswer(4)">Are there any discounts or promotions available?</div>
      <div class="faq-answer" id="answer4">
        We frequently offer discounts and promotions on our online fashion store.
      </div>
    </div>
	
	
	<div class="faq-item">
      <div class="faq-question" onclick="toggleAnswer(5)">How accurate are the product images and descriptions on your website?</div>
      <div class="faq-answer" id="answer5">
        We strive to provide accurate and high-quality product images and descriptions on our website. However, please note that colors and appearances may vary slightly due to different monitor settings and lighting conditions. We recommend reading the product descriptions thoroughly, which include details about materials, sizing, and other important information.
      </div>
    </div>
	
	
	<div class="faq-item">
      <div class="faq-question" onclick="toggleAnswer(6)">Can I cancel or modify my order after it has been placed?</div>
      <div class="faq-answer" id="answer6">
        We understand that circumstances may change, and you may need to cancel or modify your order. Please contact our customer support as soon as possible, and we will do our best to accommodate your request. However, please note that once an order has been processed and shipped, it may not be possible to make changes.
      </div>
    </div>
	
	
	<div class="faq-item">
      <div class="faq-question" onclick="toggleAnswer(7)">Are there any discounts for first-time customers?</div>
      <div class="faq-answer" id="answer7">
        No.
      </div>
    </div>
	</div>
	
	<button id="expandallbtn">ExpandAll</button>
    <button id="collapseallbtn">CollapseAll</button> 
	
	<?php
		include_once 'footer.php';
	?>

	
	
	
	