document.addEventListener("DOMContentLoaded", () => {
  const totalTitle = document.querySelector(".total");
  const individualInfoContainer = document.getElementById(
    "individual-info-container"
  );

  // Function to send a POST request to delete a user
  function deleteUser(userId) {
    fetch("./manage_acc_delete.php", {
      // Replace with the actual URL to delete user
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ userId }), // Send the user ID to be deleted
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.json();
      })
      .then((data) => {
        // Handle the response here, e.g., update the UI
        console.log("User deleted successfully", data);

        // Remove the deleted user's info from the UI
        const deletedUserElement = document.querySelector(
          `[data-user-id="${userId}"]`
        );
        if (deletedUserElement) {
          deletedUserElement.parentElement.parentElement.remove(); // Remove the user's row
        }

        // Update the total count of users
        const totalUsers = document.querySelectorAll(".delete-button").length;
        totalTitle.textContent = totalUsers;

        const userRows = document.querySelectorAll(".number");
        userRows.forEach((row, index) => {
          row.textContent = index + 1;
        });
      })
      .catch((error) => {
        console.error("Error deleting user:", error);
      });
  }

  // Function to fetch and update the approval status
  function fetchData() {
    fetch("./manage_acc_users.php", {
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
        console.log(data.users);
        totalTitle.textContent = data.users.length;

        data.users.forEach((user, index) => {
          const infoDiv = document.createElement("div");
          infoDiv.classList.add(
            "row",
            "border-bottom",
            "mb-2",
            "w-50",
            "p-2",
            "mx-auto"
          );

          infoDiv.innerHTML = `
                <div class="col-md-1 p-0 mb-1"><p class="m-0 number">${
                  index + 1
                }</p></div>
                <div class="col-md-5 p-0 mb-1"><p class="m-0">${
                  user.email
                }</p></div>
                <div class="col-md-5 p-0 mb-1"><p class="m-0">${
                  user.name
                }</p></div>
                <div class="col-md-1 p-0 mb-1"><button
            class="btn btn-danger mb-1 delete-button" data-user-name="${
              user.name
            }" 
            data-user-id="${user.user_id}"
          >
            Delete
          </button></div>
                `;

          individualInfoContainer.appendChild(infoDiv);
        });
        // Attach a click event listener to the parent container for event delegation
        individualInfoContainer.addEventListener("click", (event) => {
          if (event.target.classList.contains("delete-button")) {
            // A delete button was clicked
            const userId = event.target.getAttribute("data-user-id");
            const userName = event.target.getAttribute("data-user-name");
            // Handle the delete operation here, e.g., show the modal
            const modal = document.getElementById("deleteModal"); // Update to "deleteModal"
            const modalTitle = modal.querySelector(".modal-title");
            const modalContent = modal.querySelector(".modal-content");
            const modalBody = modal.querySelector(".modal-body");
            const modalFooter = modal.querySelector(".modal-footer");
            const modalConfirm = document.getElementById("modalConfirm");

            modalConfirm.addEventListener("click", () => {
              // Send a POST request to delete the user
              deleteUser(userId);
              $(modal).modal("hide");
            });

            modalTitle.textContent = userName;
            $(modal).modal("show");
          }
        });
      })
      .catch((error) => {
        // Handle any errors that occurred during the fetch
        console.error("Error fetching status:", error);
      });
  }

  window.addEventListener("load", fetchData);
  const modalClose = document.querySelector(".close-btn");
  const modal = document.getElementById("deleteModal"); // Update to "deleteModal"

  modalClose.addEventListener("click", () => {
    $(modal).modal("hide");
  });
});
