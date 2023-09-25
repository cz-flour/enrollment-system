document.addEventListener("DOMContentLoaded", () => {
  // FILTER BUTTONS

  const filterGradeBtns = document.querySelectorAll(".filter-grade-btn");
  const filterStrandBtns = document.querySelectorAll(".filter-strand-btn");
  const filterClassBtns = document.querySelectorAll(".class");
  const individualInfoContainer = document.getElementById(
    "individual-info-container"
  );
  const mainContent = document.getElementById("main");
  const mainParent = document.getElementById("mainParent");
  let isClassList = false;

  // Function to set the initial filters
  const setInitialFilters = () => {
    const grade11Button = document.querySelector(
      ".filter-grade-btn[data-filter='Grade 11']"
    );
    const gasButton = document.querySelector(
      ".filter-strand-btn[data-filter='General Academic Strand (GAS)']"
    );

    const title = document.querySelector(".current-filter");
    const manageBtn = document.querySelector(".manage");

    // Programmatically click the Grade 11 and GAS buttons
    grade11Button.click();
    gasButton.click();
    // Add the "active" class to the Grade 11 and GAS buttons
    manageBtn.classList.add("active");
    grade11Button.classList.add("active");
    gasButton.classList.add("active");

    title.textContent = `${grade11Button.textContent} - ${gasButton.textContent}`;
  };

  // Call the function when the page loads
  window.addEventListener("load", setInitialFilters);

  const filters = {
    gradeLevel: null,
    strand: null,
    class: null,
  };

  // function generatePDFFromHTML(htmlElement) {
  //   // Create a new jsPDF instance
  //   const doc = new jsPDF({ unit: "pt" });

  //   // Use html2canvas to capture the HTML element as an image
  //   html2canvas(htmlElement, {
  //     // Exclude the margin by setting useCORS to true and ignoring margins
  //     useCORS: true,
  //     ignoreElements: (element) => {
  //       // Check if the element is a margin element (you can adjust this condition as needed)
  //       return element.style.margin !== "0px";
  //     },
  //   }).then((canvas) => {
  //     // Convert the canvas to an image data URL
  //     const imageData = canvas.toDataURL("image/png");

  //     // Get the actual width and height of the image
  //     const image = new Image();
  //     image.src = imageData;
  //     const imgWidth = image.width;
  //     const imgHeight = image.height;

  //     // Add the image to the PDF document with its actual size
  //     doc.addImage(
  //       imageData,
  //       "PNG",
  //       0,
  //       0,
  //       doc.internal.pageSize.width,
  //       imgHeight
  //     );

  //     // Save or display the PDF
  //     doc.save("MyPdfFile.pdf");
  //   });
  // }

  function generatePDFFromHTML(htmlElement) {
    // Create a new jsPDF instance
    const doc = new jsPDF({ unit: "pt" });

    // Use html2canvas to capture the HTML element as an image
    html2canvas(htmlElement).then((canvas) => {
      // Convert the canvas to an image data URL
      const imageData = canvas.toDataURL("image/png");

      // Get the actual width and height of the image
      const image = new Image();
      image.src = imageData;
      const imgWidth = image.width;
      const imgHeight = image.height;

      // Add the image to the PDF document with its actual size
      doc.addImage(
        imageData,
        "PNG",
        30,
        50,
        doc.internal.pageSize.width - 50,
        imgHeight
      );

      // Add a title text at the top
      doc.setFontSize(12);
      doc.text(
        `${filters.gradeLevel} - ${filters.strand} - Section ${filters.class}`,
        30,
        30
      ); // Adjust the position as needed

      // Save or display the PDF
      doc.save(
        `${filters.gradeLevel}-${filters.strand}-Section${filters.class}.pdf`
      );
    });
  }

  // Reusable function for handling filter buttons
  function handleFilterButtons(btns, filterType) {
    btns.forEach((btn) => {
      btn.addEventListener("click", () => {
        const filterValue = btn.getAttribute("data-filter");
        const title = document.querySelector(".current-filter");

        // Set the appropriate filter in the filters object
        filters[filterType] = filterValue;

        // Remove the "active" class from all filter buttons of the same type
        btns.forEach((filterBtn) => {
          filterBtn.classList.remove("active");
        });

        // Add the "active" class to the clicked filter button
        btn.classList.add("active");
        if (isClassList) {
          title.textContent = `${filters.gradeLevel} - ${filters.strand} - Section ${filters.class}`;
        } else {
          title.textContent = `${filters.gradeLevel} - ${filters.strand}`;
        }

        // Update the SQL query based on the selected filters
        const sqlQuery = buildSQLQuery(filters);

        // Make an AJAX request to the server with the updated SQL query
        fetch("./allstudents_filter.php", {
          method: "POST",
          body: JSON.stringify({ query: sqlQuery }),
          headers: {
            "Content-Type": "application/json",
          },
        })
          .then((response) => response.json())
          .then((data) => {
            if (isClassList) {
              //! Handle class list display
              // Check if infoParentDiv already exists in the DOM
              const existingInfoParentDiv =
                document.getElementById("infoParentDiv");

              if (existingInfoParentDiv) {
                const pdfBtn = mainParent.querySelector(".pdf-btn-container");
                pdfBtn.remove();
                // If it exists, remove it from the DOM
                existingInfoParentDiv.innerHTML = "";
                const infoDiv = document.createElement("div");
                infoDiv.classList.add(
                  "row",
                  "border-bottom",
                  "mb-2",
                  "bg-dark-subtle",
                  "px-2",
                  // "w-75",
                  "mx-auto"
                );
                // LABEL/TITLE
                infoDiv.innerHTML = `
                          <div class="col-md-1 p-0">
                              <p class="m-0">${data.length}</p>
                          </div>
                          <div class="col-md-4 p-0">
                              <p class="m-0">Name</p>
                          </div>
                          <div class="col-md-4 p-0">
                              <p class="m-0">Address</p>
                          </div>
                          <div class="col-md-3 p-0">
                              <p class="m-0">Sex</p>
                          </div>
                `;
                existingInfoParentDiv.appendChild(infoDiv);
                data.forEach((student, index) => {
                  const singleStudent = document.createElement("div");
                  singleStudent.classList.add(
                    "row",
                    "border-bottom",
                    "mb-1",
                    "px-2",
                    // "w-75",
                    "mx-auto"
                  );

                  singleStudent.innerHTML = `
                          <div class="col-md-1 p-0">
                          <p class="m-0">${index + 1}</p>
                          </div>
                          <div class="col-md-4 p-0">
                              <p class="m-0">${student.lname}, ${
                    student.fname
                  } ${student.mname}</p>
                          </div>
                          <div class="col-md-4 p-0">
                              <p class="m-0">Purok ${student.purok}, ${
                    student.brgy
                  }, ${student.municipality}, ${student.province}</p>
                          </div>
                          <div class="col-md-3 p-0">
                              <p class="m-0">${student.sex}</p>
                          </div>
                    `;
                  existingInfoParentDiv.appendChild(singleStudent);
                });

                const downloadContainer = document.createElement("div");
                downloadContainer.classList.add(
                  "row",
                  "mt-5",
                  "pdf-btn-container"
                );
                const downloadColumn = document.createElement("div");
                downloadColumn.classList.add(
                  "col-md-12",
                  "d-flex",
                  "justify-content-center"
                );
                downloadContainer.appendChild(downloadColumn);

                // Create a button to download the PDF
                const downloadPDFButton = document.createElement("button");
                downloadPDFButton.textContent = "Download as PDF";
                downloadPDFButton.classList.add(
                  "btn",
                  "btn-primary",
                  "mb-2",
                  "pdf-btn"
                );
                downloadPDFButton.addEventListener("click", () => {
                  // Call the function to generate and download the PDF
                  generatePDFFromHTML(existingInfoParentDiv);
                });
                downloadColumn.appendChild(downloadPDFButton);

                // Append the individual info to the container
                mainParent.appendChild(existingInfoParentDiv);

                // Append the download button to the mainParent
                mainParent.appendChild(downloadContainer);
              } else {
                const pdfBtn = mainParent.querySelector(".pdf-btn-container");
                if (pdfBtn) {
                  pdfBtn.remove();
                }
                const infoParentDiv = document.createElement("div");
                infoParentDiv.id = "infoParentDiv"; // Set an ID for easy reference
                infoParentDiv.classList.add("container", "w-75");
                const infoDiv = document.createElement("div");
                infoDiv.classList.add(
                  "row",
                  "border-bottom",
                  "mb-2",
                  "bg-dark-subtle",
                  "px-2",
                  // "w-75",
                  "mx-auto"
                );
                // LABEL/TITLE
                infoDiv.innerHTML = `
                          <div class="col-md-1 p-0">
                              <p class="m-0">${data.length}</p>
                          </div>
                          <div class="col-md-4 p-0">
                              <p class="m-0">Name</p>
                          </div>
                          <div class="col-md-4 p-0">
                              <p class="m-0">Address</p>
                          </div>
                          <div class="col-md-3 p-0">
                              <p class="m-0">Sex</p>
                          </div>
                `;
                infoParentDiv.appendChild(infoDiv);
                data.forEach((student, index) => {
                  const singleStudent = document.createElement("div");
                  singleStudent.classList.add(
                    "row",
                    "border-bottom",
                    "mb-1",
                    "px-2",
                    // "w-75",
                    "mx-auto"
                  );

                  singleStudent.innerHTML = `
                          <div class="col-md-1 p-0">
                          <p class="m-0">${index + 1}</p>
                          </div>
                          <div class="col-md-4 p-0">
                              <p class="m-0">${student.lname}, ${
                    student.fname
                  } ${student.mname}</p>
                          </div>
                          <div class="col-md-4 p-0">
                              <p class="m-0">Purok ${student.purok}, ${
                    student.brgy
                  }, ${student.municipality}, ${student.province}</p>
                          </div>
                          <div class="col-md-3 p-0">
                              <p class="m-0">${student.sex}</p>
                          </div>
                    `;
                  infoParentDiv.appendChild(singleStudent);
                });

                const downloadContainer = document.createElement("div");
                downloadContainer.classList.add(
                  "row",
                  "mt-5",
                  "pdf-btn-container"
                );
                const downloadColumn = document.createElement("div");
                downloadColumn.classList.add(
                  "col-md-12",
                  "d-flex",
                  "justify-content-center"
                );
                downloadContainer.appendChild(downloadColumn);

                // Create a button to download the PDF
                const downloadPDFButton = document.createElement("button");
                downloadPDFButton.textContent = "Download as PDF";
                downloadPDFButton.classList.add(
                  "btn",
                  "btn-primary",
                  "mb-2",
                  "pdf-btn"
                );
                downloadPDFButton.addEventListener("click", () => {
                  // Call the function to generate and download the PDF
                  generatePDFFromHTML(infoParentDiv);
                });
                downloadColumn.appendChild(downloadPDFButton);

                // Append the individual info to the container
                mainParent.appendChild(infoParentDiv);

                // Append the download button to the mainParent
                mainParent.appendChild(downloadContainer);
              }
              console.log(data);
            } else {
              individualInfoContainer.innerHTML = "";

              // Handle the response data (e.g., update the UI with the fetched data)
              console.log(data);
              data.forEach((student) => {
                const infoDiv = document.createElement("div");
                infoDiv.classList.add("row", "border-bottom", "mb-1", "px-2");

                // Populate the HTML elements with data from the server
                // Check if the status is 'Approved'
                const isApproved = student.status === "Approved";

                // Create the "Approve" button with or without the "hidden" class
                const approveButton = document.createElement("button");
                approveButton.classList.add(
                  "btn",
                  "btn-outline-success",
                  "mb-1",
                  "approve-button"
                );
                approveButton.setAttribute(
                  "data-student-id",
                  student.student_id
                );
                approveButton.textContent = "Approve";

                // ! ASSIGN BUTTON
                const isAssigned = student.section;

                const assignBtn = document.createElement("button");
                assignBtn.classList.add(
                  "btn",
                  "btn-outline-success",
                  "mb-1",
                  "assign-button",
                  "hidden"
                );
                assignBtn.setAttribute("data-student-id", student.student_id);
                assignBtn.textContent = "Assign Class";

                if (isApproved) {
                  approveButton.classList.add("hidden"); // Add the "hidden" class to hide the button
                  if (!isAssigned) {
                    assignBtn.classList.remove("hidden"); // Add the "hidden" class to hide the button
                  }
                }

                infoDiv.innerHTML = `
                                    <div class="col-md-2 p-0">
                                      <p class="mt-2 mb-2">${student.lrn}</p>
                                    </div>
                                    <div class="col-md-3 p-0">
                                      <p class="mt-2 mb-2">${student.lname}, ${
                  student.fname
                } ${student.mname}</p>
                                    </div>
                                    <div class="col-md-1 p-0">
                                      <p class="mt-2 mb-2">${
                                        student.grlevel
                                      }</p>
                                    </div>
                                    <div class="col-md-3 p-0">
                                      <p class="mt-2 mb-2">${student.strand}</p>
                                    </div>
                                    <div class="col-md-1 p-0">
                                      <p class="mt-2 mb-2 ${
                                        student.status == "Approved"
                                          ? "text-success"
                                          : "text-danger"
                                      }" id="status_${student.student_id}">${
                  student.status
                }</p>
                                    </div>
                                    <div class="col-md-2 p-0 d-flex justify-content-between align-items-center">
                                      <button class="btn btn-outline-secondary mb-1 view-details-button" data-student-info='${JSON.stringify(
                                        student
                                      )}'>View Details</button>
                                      ${approveButton.outerHTML}
                                      ${assignBtn.outerHTML}
                                    </div>
                                  `;

                // Append the individual info to the container
                individualInfoContainer.appendChild(infoDiv);
              });
            }
          })
          .catch((error) => {
            console.error("Error:", error);
          });
      });
    });
  }

  // Add event listeners for grade level buttons using the reusable function
  handleFilterButtons(filterGradeBtns, "gradeLevel");

  // Add event listeners for strand buttons using the reusable function
  handleFilterButtons(filterStrandBtns, "strand");
  handleFilterButtons(filterClassBtns, "class");

  // Function to build the SQL query based on selected filters
  function buildSQLQuery(filters) {
    let sqlQuery = "SELECT * FROM student_info WHERE 1";

    // Add grade level filter if selected
    if (filters.gradeLevel) {
      sqlQuery += ` AND grlevel='${filters.gradeLevel}'`;
    }

    // Add strand filter if selected
    if (filters.strand) {
      sqlQuery += ` AND strand='${filters.strand}'`;
    }

    if (isClassList) {
      if (filters.class) {
        sqlQuery += ` AND section='${filters.class}'`;
      }
    }

    return sqlQuery;
  }

  // APPROVE BTN
  const handleApproveButtonClick = (studentId) => {
    // Send an AJAX request to update the status in the database
    fetch("./allstudents_update_status.php", {
      method: "POST",
      body: JSON.stringify({ studentId: studentId, newStatus: "Approved" }),
      headers: {
        "Content-Type": "application/json",
      },
    })
      .then((response) => response.json())
      .then((data) => {
        // Check if the status was successfully updated in the database
        if (data.success) {
          // Update the status in the UI
          const statusElement = document.querySelector(`#status_${studentId}`);

          if (statusElement) {
            statusElement.classList.remove("text-danger");
            statusElement.classList.add("text-success");
            statusElement.textContent = "Approved";
          }
        } else {
          console.error("Failed to update status in the database.");
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  };

  // MODAL SECTION
  document.addEventListener("click", (event) => {
    if (event.target.classList.contains("view-details-button")) {
      const button = event.target;
      const studentInfo = JSON.parse(button.getAttribute("data-student-info"));
      // Get modal elements
      const modal = document.getElementById("studentDetailsModal");
      const modalContent = modal.querySelector(".modal-content");
      const modalBody = modal.querySelector(".modal-body");
      modalContent.classList.remove("w-50", "mx-auto");
      const modalFooter = modal.querySelector(".modal-footer");
      const modalAssign = modalFooter.querySelector(".assign");
      if (modalAssign && modalAssign.parentNode) {
        modalAssign.parentNode.removeChild(modalAssign);
      }

      // Populate the modal with student details
      modalBody.innerHTML = `
        <div>
        <p class="mb-1 fs-5 text-center fw-bold text-uppercase">Personal Information</p>
          <div class="d-flex justify-content-around mb-3">
            <div class="w-50">
              <p class="mb-1"><strong>Name:</strong> ${studentInfo.fname}, ${studentInfo.lname} ${studentInfo.mname}</p>
              <p class="mb-1"><strong>LRN:</strong> ${studentInfo.lrn}</p>
              <p class="mb-1"><strong>Year Level:</strong> ${studentInfo.grlevel}</p>
              <p class="mb-1"><strong>Track:</strong> ${studentInfo.track}</p>
              <p class="mb-1"><strong>Strand:</strong> ${studentInfo.strand}</p>
              <p class="mb-1"><strong>Civil Status:</strong> ${studentInfo.cstatus}</p>
              <p class="mb-1"><strong>Nationality:</strong> ${studentInfo.nationality}</p>
              <p class="mb-1"><strong>Contact Number:</strong> 0${studentInfo.contact}</p>
            
            </div>
            <div class="w-50">
              <p class="mb-1"><strong>Sex:</strong> ${studentInfo.sex}</p>
              <p class="mb-1"><strong>Age:</strong> ${studentInfo.age}</p>
              <p class="mb-1"><strong>Birth Date:</strong> ${studentInfo.birthdate}</p>
              <p class="mb-1"><strong>Address:</strong> Purok ${studentInfo.purok}, ${studentInfo.brgy}, ${studentInfo.municipality}, ${studentInfo.province}</p>
              <p class="mb-1"><strong>Place of Birth:</strong> ${studentInfo.place_birth}</p>
              <p class="mb-1"><strong>Religion:</strong> ${studentInfo.religion}</p>
              <p class="mb-1"><strong>Height:</strong> ${studentInfo.height}</p>
              <p class="mb-1"><strong>Weight:</strong> ${studentInfo.weight}</p>
            </div>
            
          </div>

          
          <p class="mb-1 fs-5 text-center fw-bold text-uppercase">Learners Education Background</p>
          <div class="d-flex justify-content-around mb-3">
            <div class="w-50">
              <p class="mb-1 fs-5 fw-medium">Elementary:</p>
              <p class="mb-1"><strong>School Name:</strong> ${studentInfo.scname}</p>
              <p class="mb-1"><strong>Address:</strong> ${studentInfo.scaddress}</p>
              <p class="mb-1"><strong>Year Graduated:</strong> ${studentInfo.yrcomp}</p>
            </div>
            <div class="w-50">
              <p class="mb-1 fs-5 fw-medium">Junior High:</p>
              <p class="mb-1"><strong>School Name:</strong> ${studentInfo.scnamej}</p>
              <p class="mb-1"><strong>Address:</strong> ${studentInfo.scaddressj}</p>
              <p class="mb-1"><strong>Year Graduated:</strong> ${studentInfo.yrcompj}</p>
            </div>
          </div>

          <p class="mb-1 fs-5 text-center fw-bold text-uppercase">Submitted Files</p>
          <div>
              <p class="mb-1"><strong>PSA Birth Certificate:</strong> ${studentInfo.psa}</p>
              <p class="mb-1"><strong>Card:</strong> ${studentInfo.formcard}</p>
              <p class="mb-1"><strong>Completion Form:</strong> ${studentInfo.complform}</p>
              <p class="mb-1"><strong>Picture:</strong> ${studentInfo.pics}</p>
          </div>
        
        
        </div>
      
     
      
    `;

      $(modal).modal("show");
    }

    // APPROVE BUTTON
    if (event.target.classList.contains("approve-button")) {
      // Handle the click event for the "Approve" button here
      const button = event.target;
      const studentId = button.getAttribute("data-student-id");
      const assignBtn = document.querySelector(
        `.assign-button[data-student-id='${studentId}']`
      );

      console.log(assignBtn);

      button.classList.add("hidden");
      assignBtn.classList.remove("hidden");
      // Call the function to handle the approval
      handleApproveButtonClick(studentId);
    }
    // ASSIGN BUTTON
    if (event.target.classList.contains("assign-button")) {
      // Handle the click event for the "Approve" button here
      const button = event.target;
      const studentId = button.getAttribute("data-student-id");

      console.log(studentId);

      // Get modal elements
      const modal = document.getElementById("studentDetailsModal");
      const modalLabel = document.getElementById("studentDetailsModalLabel");
      const modalBody = modal.querySelector(".modal-body");
      const modalContent = modal.querySelector(".modal-content");
      const modalFooter = modal.querySelector(".modal-footer");
      const modalAssign = modalFooter.querySelector(".assign");

      modalLabel.textContent = "Choose a section";
      modalContent.classList.add("w-50", "mx-auto");

      if (!modalAssign) {
        const assignBtn = document.createElement("button");
        assignBtn.classList.add("btn", "btn-success", "assign");
        assignBtn.textContent = "Assign";
        assignBtn.setAttribute("data-student-id", studentId);

        modalFooter.appendChild(assignBtn);
      } else {
        modalAssign.removeAttribute("data-student-id");
        modalAssign.setAttribute("data-student-id", studentId);
      }

      // Populate the modal with student details
      modalBody.innerHTML = `
        <form class="d-flex justify-content-center">
          <div class="form-check me-3">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="A">
            <label class="form-check-label" for="flexRadioDefault1">
              Class A
            </label>
          </div>
          <div class="form-check me-3">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="B">
            <label class="form-check-label" for="flexRadioDefault2">
              Class B
            </label>
          </div>
          <div class="form-check me-3">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" value="C">
            <label class="form-check-label" for="flexRadioDefault3">
              Class C
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4" value="D">
            <label class="form-check-label" for="flexRadioDefault4">
              Class D
            </label>
          </div>
          
        </form>
      
     
      
    `;

      $(modal).modal("show");
    }

    // ASSIGN IN MODAL
    if (event.target.classList.contains("assign")) {
      const selectedRadio = document.querySelector(
        'input[name="flexRadioDefault"]:checked'
      );
      const studentId = event.target.getAttribute("data-student-id");

      if (selectedRadio) {
        const selectedClass = selectedRadio.value;

        console.log(studentId, selectedClass);
        // Make a POST request with the selected class
        fetch("./allstudents_update_class.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            studentId: studentId,
            selectedClass: selectedClass,
          }),
        })
          .then((response) => response.json())
          .then((data) => {
            // Handle the response from the server
            console.log(`Assigned class successfully to ${studentId}`, data);
            const assignBtn = document.querySelectorAll(".assign-button");
            const closeBtn = document.querySelector(".close-btn");
            assignBtn.forEach((btn) => {
              const ID = btn.getAttribute("data-student-id");
              if (studentId == ID) {
                btn.classList.add("hide");
              }
            });

            closeBtn.click();
          })
          .catch((error) => {
            console.error("Error:", error);
          });
      } else {
        alert("Please select a class!");
      }
    }

    // VIEW CLASS LIST
    if (event.target.classList.contains("view")) {
      const button = event.target;

      const manageBtn = document.querySelector(".manage");
      const classFilterBtns = document.querySelector(".class-filter-btns");

      button.classList.add("active");
      manageBtn.classList.remove("active");
      mainContent.classList.add("hidden");
      classFilterBtns.classList.remove("hidden");

      isClassList = true;

      const classABtn = document.querySelector(".class[data-filter='A']");

      classABtn.click();

      console.log("executed");
    }

    // MANAGE STUDENTS BTN
    if (event.target.classList.contains("manage")) {
      const pdfBtn = mainParent.querySelector(".pdf-btn-container");
      if (pdfBtn) {
        pdfBtn.remove();
      }
      const title = document.querySelector(".current-filter");
      title.textContent = `${filters.gradeLevel} - ${filters.strand}`;
      const button = event.target;
      const viewButton = document.querySelector(".view");
      const classFilterBtns = document.querySelector(".class-filter-btns");
      const existingInfoParentDiv = document.getElementById("infoParentDiv");
      existingInfoParentDiv.remove();

      button.classList.add("active");
      viewButton.classList.remove("active");
      mainContent.classList.remove("hidden");
      classFilterBtns.classList.add("hidden");
      isClassList = false;
      console.log(isClassList);
    }
  });
});
