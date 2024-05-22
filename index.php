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
  }

  body {
    font-weight: 500;
    font-size: 1rem;
    background: #00000006;
  }

  main {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 50px 20px;
  }

  .card {
    padding: 25px;
    box-shadow: 0 2px 35px #00000015;
    max-width: 650px;
    width: 100%;
    background: white;
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
    margin-top: 25px;
    box-shadow: 0 2px 35px #00000015;
  }

  table td,
  th {
    padding: 15px 25px;
    border: 1px solid #00000025;
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
    animation: spin 2s linear infinite;
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
    <div class="card">
      <div class="card-header"></div>
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
            // Hide loader immediately
            loader.style.display = 'none';

            resultsDiv.innerHTML = '<h2>Results</h2>';

            if (data.error) {
              resultsDiv.innerHTML += `<p>Error: ${data.error}</p>`;
              return;
            }

            if (data.length > 0) {
              // Sort data by created_time in descending order
              data.sort((a, b) => new Date(b.created_time) - new Date(a.created_time));

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

              // Loop through the sorted data to create rows
              data.forEach(rowData => {
                const row = tbody.insertRow(); // Insert row
                for (const key in rowData) {
                  const cell = row.insertCell();
                  cell.textContent = rowData[key];
                }
              });

              table.appendChild(tbody); // Append tbody to table

              resultsDiv.appendChild(table);
            } else {
              resultsDiv.innerHTML += '<p>No data found for the selected date range.</p>';
            }
          }, 1000);
        })

        .catch(error => {
          loader.style.display = 'none';
          resultsDiv.innerHTML = `<p>Error: ${error.message}</p>`;
          console.error('Error:', error);
        });
    });
  </script>
</body>

</html>