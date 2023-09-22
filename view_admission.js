document.addEventListener("DOMContentLoaded", () => {
  const approvalStatusElement = document.getElementById("approvalStatus");
  const assignedSection = document.getElementById("assignedSection");

  // Function to fetch and update the approval status
  function updateApprovalStatus() {
    fetch("./view_admission_status.php", {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.json(); // Parse the JSON response
      })
      .then((data) => {
        console.log("Data received:", data);
        // Handle the data and update the approval status element
        if (data.status === "Approved") {
          approvalStatusElement.classList.add("text-success");
          approvalStatusElement.textContent = "Approved";
        } else {
          approvalStatusElement.classList.add("text-danger");
          approvalStatusElement.textContent = "Pending";
        }
      })
      .catch((error) => {
        // Handle any errors that occurred during the fetch
        console.error("Error fetching status:", error);
      });
  }

  // Function to fetch and update the Section
  function updateSection() {
    fetch("./view_admission_section.php", {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.json(); // Parse the JSON response
      })
      .then((data) => {
        console.log(data);
        if (data.section !== "") {
          assignedSection.textContent = data.section;
          assignedSection.classList.remove("text-danger");
          assignedSection.classList.add("text-success");
        }
      })
      .catch((error) => {
        // Handle any errors that occurred during the fetch
        console.error("Error fetching status:", error);
      });
  }

  // Call the function to update the approval status initially and whenever needed
  updateApprovalStatus();
  updateSection();
});
