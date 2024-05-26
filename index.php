<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<style>
  @import url("https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap");

  html {
    scroll-behavior: smooth;
  }

  * {
    box-sizing: border-box;
    font-family: "Raleway", sans-serif;
    margin: 0;
  }

  body {
    font-weight: 500;
    font-size: 1rem;
    background: #00000006;
    color: #354565;
  }

  main {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 50px 20px;
    position: relative;
    z-index: 1;
  }

  .card {
    box-shadow: 0 2px 35px #00000015;
    max-width: 1000px;
    width: 100%;
    background: white;
    overflow: hidden;
    border-radius: 12px;
  }

  .card-header {
    padding: 40px 40px 50px;
    padding-bottom: 0;
    text-align: center;
  }

  .logo-icon {
    width: 100px;
    margin-bottom: 10px;
  }

  .card-body {
    padding: 40px;
  }

  .shape {
    position: absolute;
    left: 0;
    top: 0;
    z-index: -1;
    opacity: .3;
  }

  .shape.right {
    left: auto;
    right: 0;
  }

  .title {
    margin: 0;
    font-size: 24px;
  }

  @media (max-width: 575px) {
    .card {
      padding: 20px;
    }
  }

  label {
    display: block;
    font-size: 15px;
    margin-bottom: 5px;
  }

  input {
    width: 100%;
    height: 42px;
    border-radius: 5px;
    border: 1px solid #00000045;
    outline: none !important;
    padding: 0 12px;
  }

  input[type="date"]::-webkit-calendar-picker-indicator {
    opacity: 1;
    display: block;
    background: url(./assets/icon.svg) no-repeat;
    width: 16px;
    height: 16px;
    border-width: thin;
  }

  .form-wrapper {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 10px;
  }

  button {
    height: 42px;
    margin-top: auto;
    border-radius: 5px;
    border: 1px solid #00000045;
    cursor: pointer;
    /* background-color: #f1f1f1; */
  }

  table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    margin-top: 20px;
    box-shadow: 0 2px 35px #00000015;
  }

  table td,
  th {
    padding: 15px 25px;
    border: 1px solid #00000025;
  }

  .winner-card {
    position: relative;
    padding: 30px;
    border-radius: 40px;
    max-width: 650px;
    width: 100%;
    box-shadow: 0 5px 45px #00000006;
    background-color: #fff;
    margin-top: 35px;
    z-index: 1;
    margin-bottom: 30px;
    text-align: center;
    display: flex;
    flex-direction: column;
    gap: 8px;
    z-index: 111;
    display: none;
  }

  .winner-card h3 {
    text-align: center;
    margin-bottom: 25px;
    font-size: 30px;
    font-weight: 400 !important;
  }

  .winner-card h2 {
    text-align: center;
    font-size: 32px;
    color: #DA9C3E;
    text-transform: uppercase;
    margin-bottom: 0;
  }

  .name {
    font-size: 30px;
    margin-bottom: 5px;
    color: #E50B5D !important;
    font-weight: 700 !important;
  }

  .ytname {
    font-size: 20px;
  }

  .winner-details {
    font-size: 20px;
  }

  #userName {
    color: #eaa400;
    font-weight: 600;
  }

  .winner-card .inner-content {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 8px;
    margin-bottom: 60px;
  }
</style>

<style>
  #loader {
    border: 12px solid #f1f1f1;
    border-radius: 50%;
    border-top: 12px solid #E50B5D;
    width: 120px;
    height: 120px;
    animation: spin 1.5s linear infinite;
    z-index: 11111;
    margin-inline: auto;
  }

  @keyframes spin {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }

  #results {
    display: none;
  }

  #results.active {
    display: block;
  }

  #loader-wrapper {
    position: fixed;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    backdrop-filter: blur(6px);
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #00000025;
    opacity: 0;
    visibility: hidden;
    transition: all .3s ease-in;
  }

  #loader-wrapper.active {
    opacity: 1;
    visibility: visible;
  }

  #loader-wrapper.active .loader-inner {
    transform: scale(1);
  }

  .loader-inner {
    max-width: 650px;
    width: 100%;
    min-height: 300px;
    background-color: white;
    box-shadow: 0 5px 45px #00000010;
    border-radius: 8px;
    padding: 30px;
    position: relative;
    transition: all .3s ease-in;
    transform: scale(.6);
  }

  .step {
    position: relative;
    opacity: 0;
    visibility: hidden;
    transition: all .3s linear;
  }

  .step.active {
    opacity: 1;
    visibility: visible;
  }

  .step.one {
    text-align: center;
  }

  .step.one h2 {
    margin-bottom: 10px;
  }

  .step.three {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 10px;
  }

  .step.two {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 15px;
  }

  #countDown {
    position: absolute;
    left: 50%;
    top: 40%;
    transform: translate(-50%, -50%);
    font-size: 36px;
    z-index: 999
  }

  #winVideo {
    position: fixed;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    display: none;
  }

  #overlay {
    display: none;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    color: white;
    font-size: 24px;
    z-index: 100;
  }
</style>

<body>
  <main>
    <img src="./assets/shape-left.png" alt="shape" class="shape left">
    <img src="./assets/shape-right.png" alt="shape" class="shape right">
    <div class="card" id="formCard">
      <div class="card-header">
        <img src="./assets/logo-with-thicker-outline.png" alt="thinkandsay" class="logo-icon">
        <h1 class="title">Let's pick today's winner:</h1>
      </div>
      <div class="card-body">
        <form id="dateRangeForm">
          <div class="form-wrapper">
            <div class="form-group">
              <label for="startDate">Start Date:</label>
              <input type="date" id="startDate" name="startDate" required />
            </div>
            <div class="form-group">
              <label for="endDate">End Date:</label>
              <input type="date" id="endDate" name="endDate" required />
            </div>
            <button type="submit">Submit</button>
          </div>
        </form>
      </div>
      <div class="card-footer"></div>
    </div>
    <div id="loader-wrapper">
      <div class="loader-inner">
        <div class="step one">
          <h2>Hey! Our system is randomly select a winner</h2>
          <p>in the meantime let's introduce our Brand:</p>
          <img src="./assets/logo-with-thicker-outline.png" alt="icon" width="130" style="margin-top: 30px;">
          <h3 style="margin-top: 5px;">Think and Say</h3>
        </div>
        <div class="step two" id="counterWrapper">
          <div id="loader"></div>
          <h2 id="countDown"></h2>
          <p style="text-align: center">Hold Tight! <br> While the winner is being selected</p>
        </div>
        <div class="step three">
          <div id="loader"></div>
          <p>The Winner is Almost here!</p>
        </div>
      </div>
    </div>
    <div class="winner-card" id="winner-card">
      <img src="./assets/frame.png" alt="frame" class="frame">
      <div class="inner-content">
        <h2>Congratulations!!!</h2>
        <h3>Today's Lucky Winner is:</h3>
        <div class="name" id="userName">Munna Ahmed</div>
        <div class="ytname" id="ytUsername">Username: munns</div>
      </div>
    </div>
    <div id="results">
    </div>
    <video id="winVideo" width="100%" autoplay mute loop preload="auto" poster="">
      <source src="./assets/win.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
    <div id="overlay"></div>
  </main>

  <script>
    document.getElementById('dateRangeForm').addEventListener('submit', function(event) {
      event.preventDefault();
      const startDate = document.getElementById('startDate').value;
      const endDate = document.getElementById('endDate').value;

      const counterWrapper = document.getElementById('counterWrapper');
      const loaderWrapper = document.getElementById('loader-wrapper');
      const loader = document.getElementById('loader');
      const resultsDiv = document.getElementById('results');
      const winnerCard = document.getElementById('winner-card');
      const formCard = document.getElementById('formCard');
      const userNameDiv = document.getElementById('userName');
      const userAgeDiv = document.getElementById('ytUsername');
      const video = document.getElementById('winVideo');
      // Show loader
      // loader.style.display = 'block';
      // loaderWrapper.style.display = 'flex';
      loaderWrapper.classList.add('active')

      fetch('fetch.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            startDate,
            endDate
          })
        })
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
          }
          return response.json();
        })
        .then(data => {
          setTimeout(() => {
            // Hide loader
            loaderWrapper.style.display = 'none';
            video.style.display = 'block';
            video.play()

            resultsDiv.innerHTML = '<h2 class="winner-details">Winner Details</h2>';
            userNameDiv.textContent = '';
            userAgeDiv.textContent = '';

            if (data.error) {
              resultsDiv.innerHTML += `<p>Error: ${data.error}</p>`;
              return;
            }

            if (data.length > 0) {
              // Filter data based on selected date range
              const filteredData = data.filter(user => {
                const userDate = new Date(user.created_time);
                return userDate >= new Date(startDate) && userDate <= new Date(endDate);
              });

              if (filteredData.length === 0) {
                resultsDiv.innerHTML += '<p>No data found for the selected date range.</p>';
                return;
              }

              // Randomly select one user
              const randomIndex = Math.floor(Math.random() * filteredData.length);
              const randomUser = filteredData[randomIndex];

              // Display the randomly selected user's name and age
              userNameDiv.textContent = `${randomUser.firstName} ${randomUser.lastName}`;
              userAgeDiv.textContent = `Username: ${randomUser.ytUsername}`;

              // Display the randomly selected user in a table
              const table = document.createElement('table');
              const headerRow = document.createElement('tr');
              const headers = ['ID', 'First Name', 'Last Name', 'Email', 'Phone', 'Age', 'YouTube Username', 'Created Time'];
              headers.forEach(headerText => {
                const header = document.createElement('th');
                header.textContent = headerText;
                headerRow.appendChild(header);
              });
              table.appendChild(headerRow);

              const tbody = document.createElement('tbody'); // Create tbody element

              // Create row for the random user
              const row = tbody.insertRow(); // Insert row
              for (const key in randomUser) {
                const cell = row.insertCell();
                cell.textContent = randomUser[key];
              }

              table.appendChild(tbody); // Append tbody to table
              resultsDiv.appendChild(table);

              formCard.style.display = 'none'
              winnerCard.style.display = 'flex'
            } else {
              resultsDiv.innerHTML += '<p>No data found for the selected date range.</p>';
            }
          }, 17000);
        })
        .catch(error => {
          // Hide loader
          loader.style.display = 'none';

          resultsDiv.innerHTML = `<p>Error: ${error.message}</p>`;
          console.error('Error:', error);
        });
    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', (event) => {
      const parentElement = document.getElementById('counterWrapper');
      const countDownElement = document.getElementById('countDown');
      const countdownTime = 10; // Countdown start time
      const delay = 0; // Delay before starting countdown in milliseconds (e.g., 2000ms = 2s)

      function startCountdown(time) {
        let currentTime = time;
        countDownElement.textContent = currentTime;

        const interval = setInterval(() => {
          currentTime--;
          countDownElement.textContent = currentTime;

          if (currentTime <= 0) {
            clearInterval(interval);
          }
        }, 1000);
      }

      // Function to check if parent element has 'active' class and start countdown
      function checkActiveClass() {
        if (parentElement.classList.contains('active')) {
          setTimeout(() => {
            startCountdown(countdownTime);
          }, delay);
        }
      }

      // MutationObserver to detect class changes on the parent element
      const observer = new MutationObserver(() => {
        checkActiveClass();
      });

      // Observe class changes on the parent element
      observer.observe(parentElement, {
        attributes: true,
        attributeFilter: ['class']
      });

      // Initial check in case the class is added on page load
      checkActiveClass();
    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const steps = document.querySelectorAll('.step');
      const duration = [4000, 10000, 2000]; // Duration in milliseconds for each step (2s, 10s, 2s)
      const countdownTime = 10; // Countdown start time in seconds
      const counterWrapper = document.getElementById('loader-wrapper');
      const countDownElement = document.getElementById('countDown');
      let currentStep = 0;

      function showStep(index) {
        steps.forEach((step, i) => {
          step.classList.toggle('active', i === index);
        });

        if (index === 1) { // Start countdown in step two
          startCountdown(countdownTime);
        }
      }

      function nextStep() {
        showStep(currentStep);

        setTimeout(() => {
          currentStep++;
          if (currentStep < steps.length) {
            nextStep();
          }
        }, duration[currentStep]);
      }

      function startCountdown(time) {
        let currentTime = time;
        countDownElement.textContent = currentTime;

        const interval = setInterval(() => {
          currentTime--;
          countDownElement.textContent = currentTime;

          if (currentTime <= 0) {
            clearInterval(interval);
          }
        }, 1000);
      }

      // Function to start the process when counterWrapper gets 'active' class
      function checkActiveClass() {
        if (counterWrapper.classList.contains('active')) {
          nextStep();
        }
      }

      // MutationObserver to detect class changes on the counterWrapper
      const observer = new MutationObserver(() => {
        checkActiveClass();
      });

      // Observe class changes on the counterWrapper
      observer.observe(counterWrapper, {
        attributes: true,
        attributeFilter: ['class']
      });

      // Initial check in case the class is added on page load
      checkActiveClass();
    });
  </script>

  <script>
    document.getElementById('showDetails').addEventListener('click', function() {
      let results = document.getElementById('results')
      results.classList.toggle('active')
    })
  </script>
</body>

</html>