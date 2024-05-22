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
  }

  main {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  .card {
    padding: 40px;
    box-shadow: 0 2px 35px #00000015;
    max-width: 650px;
    width: 100%;
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
    width: 20px;
    height: 20px;
    border-width: thin;
  }
</style>

<body>
  <main>
    <div class="card">


      <div class="card-header"></div>
      <div class="card-body">
        <form id="dateRangeForm">
          <label for="startDate">Start Date:</label>
          <input type="date" id="startDate" name="startDate" required />
          <label for="endDate">End Date:</label>
          <input type="date" id="endDate" name="endDate" required />
          <button type="submit">Submit</button>
        </form>
      </div>
      <div class="card-footer"></div>
    </div>
    <div id="results"></div>
  </main>

  <script src="./assets/jquery.js"></script>
  <script src="./assets/date.js"></script>
  <script src="./assets/en.js"></script>
  <script>
    $(".datepicker-here").datepicker();
  </script>
  <script>
    document.getElementById("dateRangeForm").addEventListener("submit", function(event) {
      event.preventDefault();
      const startDate = document.getElementById("startDate").value;
      const endDate = document.getElementById("endDate").value;

      fetch("fetch.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            startDate,
            endDate
          }),
        })
        .then((response) => {
          if (!response.ok) {
            throw new Error("Network response was not ok " + response.statusText);
          }
          return response.json();
        })
        .then((data) => {
          const resultsDiv = document.getElementById("results");
          resultsDiv.innerHTML = "<h2>Results</h2>";

          if (data.error) {
            resultsDiv.innerHTML += `<p>Error: ${data.error}</p>`;
            return;
          }

          if (data.length > 0) {
            const table = document.createElement("table");
            const headerRow = document.createElement("tr");
            const headers = ["ID", "First Name", "Last Name", "Email", "Phone", "Age", "YouTube Username", "Created Time"];
            headers.forEach((headerText) => {
              const header = document.createElement("th");
              header.textContent = headerText;
              headerRow.appendChild(header);
            });
            table.appendChild(headerRow);

            data.forEach((row) => {
              const rowElement = document.createElement("tr");
              for (const key in row) {
                const cell = document.createElement("td");
                cell.textContent = row[key];
                rowElement.appendChild(cell);
              }
              table.appendChild(rowElement);
            });

            resultsDiv.appendChild(table);
          } else {
            resultsDiv.innerHTML += "<p>No data found for the selected date range.</p>";
          }
        })
        .catch((error) => {
          const resultsDiv = document.getElementById("results");
          resultsDiv.innerHTML = `<p>Error: ${error.message}</p>`;
          console.error("Error:", error);
        });
    });
  </script>
</body>

</html>