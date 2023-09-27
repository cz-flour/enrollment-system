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

  // HANDLE DOWNLOAD BTN
  const downloadBtn = document.getElementById("download-btn");

  const fetchEnrollData = () => {
    fetch("./view_admission_download.php", {
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
      .then(({ data }) => {
        const {
          lrn,
          fname,
          lname,
          mname,
          extension,
          birthdate,
          age,
          height,
          weight,
          cstatus,
          nationality,
          place_birth,
          sex,
          religion,
          contact,
          province,
          municipality,
          brgy,
          purok,
          grlevel,
          track,
          strand,
          psa,
          formcard,
          complform,
          pics,
          fullname,
          caddress,
          rel,
          cpnum,
          schname,
          schaddress,
          yrcomp,
          schnamej,
          schaddressj,
          yrcompj,
          date,
        } = data;

        const convertedHeight = `${(height / 12).toFixed(0)}"${height % 12}`;

        let doc = new jsPDF();

        doc.setFontSize(14);
        doc.setFontStyle("bold");
        doc.text(`ENROLLMENT FORM`, 83, 20);
        doc.setFontStyle("normal");
        doc.text(`Personal Information`, 85, 28);

        doc.setFontSize(12);
        // Set the font style to bold for labels
        doc.setFontStyle("bold");
        doc.text(`Learner Reference Number: `, 20, 36);
        doc.text(`Last Name:`, 20, 44);
        doc.text(`First Name:`, 20, 52);
        doc.text(`Middle Name:`, 20, 60);
        doc.text(`Extension Name:`, 20, 68);
        // Reset the font style to normal for variables
        doc.setFontStyle("normal");
        doc.text(lrn, 80, 36);
        doc.text(`${lname}`, 65, 44);
        doc.text(`${fname}`, 65, 52);
        doc.text(`${mname}`, 65, 60);
        doc.text(`${extension}`, 65, 68);

        // Set the font style to bold for labels
        doc.setFontStyle("bold");
        doc.text(`Birthdate:`, 130, 36);
        doc.text(`Age:`, 130, 44);
        doc.text(`Height:`, 130, 52);
        doc.text(`Weight:`, 130, 60);
        doc.text(`Religion:`, 130, 68);
        // Reset the font style to normal for variables
        doc.setFontStyle("normal");
        doc.text(`${birthdate}`, 155, 36);
        doc.text(`${age}`, 155, 44);
        doc.text(`${convertedHeight}`, 155, 52);
        doc.text(`${weight} kg`, 155, 60);
        doc.text(religion, 155, 68);

        // Set the font style to bold for labels
        doc.setFontStyle("bold");
        doc.text(`Civil Status:`, 20, 76);
        doc.text(`Nationality:`, 20, 84);
        doc.text(`Contact Number:`, 20, 92);
        doc.text(`Complete Address:`, 20, 100);
        doc.text(`Sex:`, 130, 76);
        doc.text(`Birthplace:`, 130, 84);

        // Reset the font style to normal for variables
        doc.setFontStyle("normal");
        doc.text(cstatus, 65, 76);
        doc.text(nationality, 65, 84);
        doc.text(contact, 65, 92);
        doc.text(
          `Purok ${purok}, ${brgy}, ${municipality}, ${province}`,
          65,
          100
        );
        doc.text(sex, 155, 76);
        doc.text(place_birth, 155, 84);

        // Set the font style to bold for labels
        doc.setFontStyle("bold");
        doc.text(`Grade Level:`, 20, 108);
        doc.text(`Track:`, 20, 116);
        doc.text(`Strand:`, 20, 124);
        // Reset the font style to normal for variables
        doc.setFontStyle("normal");
        doc.text(grlevel, 65, 108);
        doc.text(track, 65, 116);
        doc.text(strand, 65, 124);

        doc.setFontSize(14);
        doc.text(
          "Name and Address of Person to be contacted in case of Emergency",
          40,
          132
        );
        doc.setFontSize(12);
        // Set the font style to bold for labels
        doc.setFontStyle("bold");
        doc.text(`Full Name:`, 20, 140);
        doc.text(`Address:`, 20, 148);
        doc.text(`Relation:`, 20, 156);
        doc.text(`Contact Number:`, 20, 164);
        // Reset the font style to normal for variables
        doc.setFontStyle("normal");
        doc.text(fullname, 65, 140);
        doc.text(caddress, 65, 148);
        doc.text(rel, 65, 156);
        doc.text(cpnum, 65, 164);

        doc.setFontSize(14);
        doc.text("Learners Educational Background", 70, 172);
        doc.setFontSize(12);
        doc.text("Elementary School", 85, 180);
        // Set the font style to bold for labels
        doc.setFontStyle("bold");
        doc.text(`School Name:`, 20, 188);
        doc.text(`School Address:`, 20, 196);
        doc.text(`Year of Completion:`, 20, 204);
        doc.setFontStyle("normal");
        doc.text(schname, 65, 188);
        doc.text(schaddress, 65, 196);
        doc.text(yrcomp, 65, 204);

        doc.text("Junior High School", 85, 212);
        // Set the font style to bold for labels
        doc.setFontStyle("bold");
        doc.text(`School Name:`, 20, 220);
        doc.text(`School Address:`, 20, 228);
        doc.text(`Year of Completion:`, 20, 236);
        doc.setFontStyle("normal");
        doc.text(schname, 65, 220);
        doc.text(schaddress, 65, 228);
        doc.text(yrcomp, 65, 236);

        doc.text(`Date submitted: ${date}`, 20, 276);

        doc.save("enrollment.pdf");
      })
      .catch((error) => {
        // Handle any errors that occurred during the fetch
        console.error("Error fetching status:", error);
      });
  };

  downloadBtn.addEventListener("click", () => {
    fetchEnrollData();
  });
});

// doc.text(date, 40, 268);
// doc.text(`DATE`, 50, 276);
// doc.text(`SIGNATURE OVER PRINTER NAME`, 100, 276);
