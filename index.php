<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="./assets/date.css" />
</head>

<style>
  @import url("https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap");

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
    padding: 25px;
    padding-bottom: 0;
  }

  .card-body {
    padding: 30px;
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
    border-radius: 8px;
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
  }

  .winner-card h3 {
    text-align: center;
    margin-bottom: 15px;
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
    display: none;
    /* Hidden by default */
    position: fixed;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    border: 16px solid #f1f1f1;
    border-radius: 50%;
    border-top: 16px solid #000;
    width: 120px;
    height: 120px;
    animation: spin 1.5s linear infinite;
    z-index: 11111;
  }

  @keyframes spin {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }
</style>

<body>
  <main>
    <img src="./assets/shape-left.png" alt="shape" class="shape left">
    <img src="./assets/shape-right.png" alt="shape" class="shape right">
    <div class="card">
      <div class="card-header">
        <h1 class="title">Let's get a winner from:</h1>
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
    <div id="loader"></div>
    <div class="winner-card">
      <img src="./assets/frame.png" alt="frame" class="frame">
      <div class="inner-content">
        <h3>Our Today's Lucky Winner</h3>
        <div id="userName">Name: Serena Silva</div>
        <div id="ytUsername">Youtube Usrename: Serena Silva</div>
      </div>
    </div>
    <div id="results">
      <table>
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Age</th>
          <th>YouTube Username</th>
          <th>Created Time</th>
        </tr>
        <tr>
          <td>16</td>
          <td>Ruby</td>
          <td>Duke</td>
          <td>faqor@mailinator.com</td>
          <td>+1 (249) 117-5918</td>
          <td>0</td>
          <td>dityheroxu</td>
          <td>2024-05-28 07:21:03</td>
        </tr>
        <tr>
          <td>18</td>
          <td>Hilary</td>
          <td>Benjamin</td>
          <td>rumocobip@mailinator.com</td>
          <td>+1 (989) 617-2731</td>
          <td>0</td>
          <td>zyfef</td>
          <td>2024-05-30 07:21:13</td>
        </tr>
        <tr>
          <td>21</td>
          <td>Haviva</td>
          <td>Knight</td>
          <td>luxocyd@mailinator.com</td>
          <td>+1 (269) 747-4311</td>
          <td>76</td>
          <td>bihafol</td>
          <td>2024-05-31 07:38:38</td>
        </tr>
        <tr>
          <td>25</td>
          <td>Allen</td>
          <td>Anderson</td>
          <td>cehy@mailinator.com</td>
          <td>+1 (954) 808-6364</td>
          <td>44</td>
          <td>xedehehik</td>
          <td>2024-05-23 09:51:01</td>
        </tr>
        <tr>
          <td>26</td>
          <td>Chiquita</td>
          <td>Fuller</td>
          <td>gydywecuf@mailinator.com</td>
          <td>+1 (277) 144-1774</td>
          <td>72</td>
          <td>gylijeqap</td>
          <td>2024-05-25 10:13:34</td>
        </tr>
      </table>
    </div>
  </main>

  <script src="./assets/jquery.js"></script>
  <script src="./assets/date.js"></script>
  <script src="./assets/en.js"></script>
  <script>
    $(".datepicker-here").datepicker();
  </script>

  <script>
    document.getElementById('dateRangeForm').addEventListener('submit', function(event) {
      event.preventDefault();
      const startDate = document.getElementById('startDate').value;
      const endDate = document.getElementById('endDate').value;

      const loader = document.getElementById('loader');
      const resultsDiv = document.getElementById('results');
      const userNameDiv = document.getElementById('userName');
      const userAgeDiv = document.getElementById('ytUsername');

      // Show loader
      loader.style.display = 'block';

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
            loader.style.display = 'none';

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
              userNameDiv.textContent = `Name: ${randomUser.firstName} ${randomUser.lastName}`;
              userAgeDiv.textContent = `Youtube Username: ${randomUser.ytUsername}`;

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
            } else {
              resultsDiv.innerHTML += '<p>No data found for the selected date range.</p>';
            }
          }, 1000); // Delay of 3 seconds
        })
        .catch(error => {
          // Hide loader
          loader.style.display = 'none';

          resultsDiv.innerHTML = `<p>Error: ${error.message}</p>`;
          console.error('Error:', error);
        });
    });
  </script>
</body>

</html>