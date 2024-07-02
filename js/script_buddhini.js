function loadData(data){

    if(data == "btn1"){
        document.getElementById("pic").src = "images/btn1.png";
        document.getElementById("para").innerHTML = "Hello! Welcome to Vouge Haven, where you can experience a whole new world of fashion. Our fashion store provides a collection of stylish clothing and accessories that perfectly matches your preferences. Whether you're looking for ideal wear for a special occasion or a casual yet elegant combination for everyday wear, Vogue Haven has you covered. <br> We believe that shopping for fashion should be enjoyable and interesting. For that, we have created a user-friendly platform that allows you to search, browse, and purchase easily and to get your order delivered to your doorstep <br> We try our best to meet your expectations. We are always ready to assist you. So feel free to connect with us. <br><br> Start shopping with us and experience a whole new level of online shopping ! ";
    }

    else if (data == "btn2") {
        document.getElementById("pic").src = "images/btn2.png";   
        document.getElementById("para").innerHTML = "This website provides products to customers who are end users to purchase online. The customer is responsible to submit complete and correct information when registering to the site. The customer is also responsible to keep passwords confidential and protected from unauthorized third parties. <br><br> The customer should agree not to resell the items without permission. <br><br> The store has the right to limit the quantities, sales of our products and services provided. <br><br> Prices and product descriptions are bound to change without any prior notice.";
    }

    else{
        alert("Invalid! ");
    }
}
