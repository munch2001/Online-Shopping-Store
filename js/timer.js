// Set the date you want to count down to (replace with your own date)
    var countDownDate = new Date("June 30, 2023 00:00:00").getTime();

    // Update the countdown every 1 second
    var countdownTimer = setInterval(function() {
      // Get today's date and time
      var now = new Date().getTime();

      // Find the distance between now and the countdown date
      var distance = countDownDate - now;

      // Calculate days, hours, minutes, and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the countdown timer with days in the top right corner
      document.getElementById("timer").innerHTML = days + "d " + hours + "h "
        + minutes + "m " + seconds + "s ";

      // If the countdown is finished, display a message
      if (distance < 0) {
        clearInterval(countdownTimer);
        document.getElementById("timer").innerHTML = "EXPIRED";
      }
    }, 1000);