function displaySelectedSize() {
    var sizeDropdown = document.getElementById("size");
    var selectedSize = sizeDropdown.options[sizeDropdown.selectedIndex].text;
    var selectedSizeElement = document.getElementById("selectedsize");

    if (selectedSize === "Select a size") {
        selectedSizeElement.style.display = "none";
    } else {
        selectedSizeElement.style.display = "block";
        selectedSizeElement.innerText = "Selected size: " + selectedSize;
    }
}

function validateForm() {
    var quantityInput = document.getElementsByName("quantity")[0].value;
    var colorInput = document.getElementById("color").value;
    var sizeInput = document.getElementById("size").value;

    if (quantityInput <= 0 || colorInput === "" || sizeInput === "") {
        alert("Please fill in all the details.");
        return false;
    }
    return true;
}




    function displaySelectedColor() {
        var colorDropdown = document.getElementById("color");
        var selectedColor = colorDropdown.options[colorDropdown.selectedIndex].text;
        var selectedColorElement = document.getElementById("selectedColor");

        if (selectedColor === "Select a color") {
            selectedColorElement.style.display = "none";
        } else {
            selectedColorElement.style.display = "block";
            selectedColorElement.innerText = "Selected color: " + selectedColor;
        }
    }

    function displaySelectedSize() {
        var sizeDropdown = document.getElementById("size");
        var selectedSize = sizeDropdown.options[sizeDropdown.selectedIndex].text;
        var selectedSizeElement = document.getElementById("selectedsize");

        if (selectedSize === "Select a size") {
            selectedSizeElement.style.display = "none";
        } else {
            selectedSizeElement.style.display = "block";
            selectedSizeElement.innerText = "Selected size: " + selectedSize;
        }
    }

    function validateForm() {
        var quantityInput = document.getElementsByName("quantity")[0].value;
        var colorInput = document.getElementById("color").value;
        var sizeInput = document.getElementById("size").value;

        if (colorInput === "" || sizeInput === "") {
            alert("Please fill in all the details.");
            return false;
        }
		else if (quantityInput <= 0) {
			alert("Invalid quantity. Please enter a positive number.");
			return false;
		}
		else {
			return true;
		}
    }
	





