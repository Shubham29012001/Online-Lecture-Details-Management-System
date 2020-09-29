var repeat = { department: "a", year: 0, sem: "qwer" };

function semtype() {
  var oddy = document.getElementById("Semtype").value;
  // console.log(oddy);
  //console.log(odd.checked);
  //console.log("even is", even.checked);
}

function getDepartmentName() {
  var dept = document.getElementById("Staff_Department").value;
  // console.log(dept);
}

function getYear() {
  var year = document.getElementById("Year");
  var yearopt = year.options[year.selectedIndex].value;
  // console.log(yearopt);
}

function getAcademicYear() {
  var acayear = document.getElementById("Academic_Year").value;
  // console.log(acayear);
}

function setSubjectName() {
  var select = document.getElementById("Subject_Name");
  var length = select.options.length;
  for (i = length - 1; i > 0; i--) {
    select.options[i] = null;
  }
  var dept = document.getElementById("Staff_Department").value;
  var year = document.getElementById("Year").value;
  var odd = document.getElementById("Semtype").value;

  semtype();
  if (
    repeat["department"] !== dept ||
    repeat["year"] !== year ||
    repeat["sem"] !== odd
  ) {
    repeat["department"] = dept;
    repeat["year"] = year;
    repeat["sem"] = odd;

    if (year == 1 && odd == "odd") {
      var name = [
        "Applied Mathematics - 1",
        "Applied Physics - 1",
        "Applied Chemistry - 1",
        "Engineering Mechanics",
        "Basic Electrical Engineering",
        "Environmental studies",
      ];

      var Subjectname = document.getElementById("Subject_Name");

      for (i = 0; i <= 5; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (year == 1 && odd == "even") {
      var name = [
        "Applied Mathematics - 2 ",
        "Applied Physics - 2",
        "Applied Chemistry - 2",
        "Engineering Drawing",
        "Structured Programming Approach",
        "Communication Skills",
      ];

      for (i = 0; i <= 5; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    }

    if (dept == "IT" && year == 2 && odd == "odd") {
      var name = [
        "Applied Mathematics - 3",
        "Logic Design",
        "Data Structures & Analysis",
        "Database Management System",
        "Principle of Communications",
      ];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "IT" && year == 2 && odd == "even") {
      var name = [
        "Applied Mathematics - 4",
        "Computer Networks",
        "Operating Systems",
        "Computer Organization and Architecture",
        "Automata Theory",
      ];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "IT" && year == 3 && odd == "odd") {
      var name = [
        "Internet Programming",
        "Cryptography and Network Security",
        "Advanced Data Management Tool",
        "Microcontroller",
        "Departmental Optional Course - I",
        "Internet of Things",
      ];

      for (i = 0; i <= 5; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "IT" && year == 3 && odd == "even") {
      var name = [
        "Software Engineering with Project Management ",
        "Data Mining and Business Intelligence",
        "Cloud Computing & Services ",
        "Wireless Networks",
        "Department Level Optional Course - II ",
      ];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "IT" && year == 4 && odd == "odd") {
      var name = [
        "Enterprise Network Design",
        "Infrastructure Security",
        "Artificial Intelligence",
        "Department Level Optional Course - III",
        "Institute Level Optional Course - I",
      ];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "IT" && year == 4 && odd == "even") {
      var name = [
        "Big Data Analytics",
        "Internet of Everything",
        "Department Level Optional Course - IV",
        "Institute Level Optional Course - II",
      ];

      for (i = 0; i <= 3; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "CS" && year == 2 && odd == "odd") {
      var name = [
        "Applied Mathematics - 3",
        "DLDA",
        "ECCF",
        "Discrete Mathematics",
        "Data Structures",
        "OOPM",
      ];

      for (i = 0; i <= 5; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "CS" && year == 2 && odd == "even") {
      var name = [
        "Applied Mathematics - 4",
        "Analysis Of Algorithms",
        "Computer Organization and Architecture",
        "Computer Graphics",
        "Operating System",
      ];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "CS" && year == 3 && odd == "odd") {
      var name = [
        "Computer Networking",
        "Database Management System",
        "Microprocessor",
        "Theory of Computer Science",
        "Analysis of Algorithm",
        "Multimedia System",
      ];

      for (i = 0; i <= 5; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "CS" && year == 3 && odd == "even") {
      var name = [
        "Software Engineering",
        "SPCC",
        "DWM",
        "CSS",
        "Machine Learning",
        "Advance Database System",
      ];

      for (i = 0; i <= 5; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "CS" && year == 4 && odd == "odd") {
      var name = ["", "", "", "", ""];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "CS" && year == 4 && odd == "even") {
      var name = ["", "", "", "", ""];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "Civil" && year == 2 && odd == "odd") {
      var name = [
        "Strength of Material",
        "Fluid Mechanics - 1",
        "Applied Mathematics - 3",
        "Engineering Geology",
        "Surveying - 1",
      ];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "Civil" && year == 2 && odd == "even") {
      var name = [
        "Applied Mathematics - 4",
        "Surveying - 2",
        "Structural Analysis - 1",
        "Building Design & Drawing",
        "Building Material & Construction",
        "Fluid Mechanics - 2",
      ];

      for (i = 0; i <= 5; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "Civil" && year == 3 && odd == "odd") {
      var name = [
        "Structural Analysis - 1",
        "Geotechnical Engineering - 1",
        "Applied Hydraulics",
        "Environmental Engineering -1",
        "Transportation Engineering -1",
        "Department Level Optional Course -1",
        "Business and Communication Ethics",
      ];

      for (i = 0; i <= 6; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "Civil" && year == 3 && odd == "even") {
      var name = [
        "Geotechnical Engineering - 2",
        "Design & Drawring of Steel Structure",
        "Transportation Engineering - 2",
        "Environment Engineering - 2",
        "Water Rsources Engineernig - 1",
        "Department level optical Course - 1",
        "Software Application In Civil Engineering",
      ];

      for (i = 0; i <= 6; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "Civil" && year == 4 && odd == "odd") {
      var name = [
        "Desiging Drawing of Reinforced Concrete Strutures",
        "Construction Management",
        "Department Level Optional Course - 2",
        "Institute Level Optional Courses - 2",
        "Project - 2",
      ];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "Civil" && year == 4 && odd == "even") {
      var name = [
        "Quantity Survey Estimation And Valuation",
        "Theory Of Reinforce Concrete Strutures",
        "Water Resources Engineering - 2",
        "Institute Level Optional Courses - 1",
        "Department Level Optional Course - 1",
        "Project - 1",
      ];

      for (i = 0; i <= 5; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "EXTC" && year == 2 && odd == "odd") {
      var name = [
        "Applied Mathematics - 3",
        "Digital System Design",
        "Circuit Theory And Networks",
        "Electronic Instrumentation and Circuit - 1",
        "Digital System Design",
        "OOP using Java Laboratory",
      ];

      for (i = 0; i <= 5; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "EXTC" && year == 2 && odd == "even") {
      var name = [
        "Applied Mathematics - 4",
        "Electronic Devices and Circuit - 2",
        "Linear Integrated Circuits",
        "Signal and System",
        "Principal of Communication Engineering",
      ];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "EXTC" && year == 3 && odd == "odd") {
      var name = [
        "Microprocessor & Peripheral Interfacing",
        "Digital Communication",
        "Electromagnetic Engineering",
        "Discrete Time Signal Processing",
        "Department Level Optional Course - 1",
      ];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "EXTC" && year == 3 && odd == "even") {
      var name = [
        "Microcontroller & Application",
        "Computer Communication Networks",
        "Antenna & Radio Wave Propogation",
        "Image Processing And Machine Vision",
        "Department Level Optional Courses - 2",
      ];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "EXTC" && year == 4 && odd == "odd") {
      var name = [
        "Microwave Engineering",
        "Moblie Communication System",
        "Optical Communication",
        "Department Level Optional Courses - 3",
        "Institute Level Optional Courses - 1",
        "Project - 1",
      ];

      for (i = 0; i <= 5; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "EXTC" && year == 4 && odd == "even") {
      var name = [
        "RF Design",
        "Wireless Networks",
        "Department Level Optional Courses - 3",
        "Institute Level Optional Courses - 2",
        "Project - 2",
      ];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "Mech" && year == 2 && odd == "odd") {
      var name = [
        "Applied Mathematics - 3",
        "Thermodyanmics",
        "Strength Of Materials",
        "Production Process - 1",
        "Material Technology",
        "Computer Aided Machine Drawing",
        "Machine Shop Practice - 1",
      ];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "Mech" && year == 2 && odd == "even") {
      var name = [
        "Applied Mathematics - 4",
        "Fluid Mechanics",
        "Industrial Electronics",
        "Production Process - 2",
        "Kinematics Of Machinery",
        "Database and Information Retrieval",
      ];

      for (i = 0; i <= 5; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "Mech" && year == 3 && odd == "odd") {
      var name = [
        "Internal Combustion Engines",
        "Mechanics Measurement And Control",
        "Heal Transfer",
        "Dynamics Of Machinery",
        "Deparment Level Optional Course - 1",
        "Business Communication and Ethics",
      ];

      for (i = 0; i <= 5; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "Mech" && year == 3 && odd == "even") {
      var name = [
        "Metrology And Quality Engineering",
        "Machine Design - 1",
        "Finite Element Analytics",
        "Refrigeration And Air Conditioning",
        "Department Level Optional Course - 2",
      ];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "Mech" && year == 4 && odd == "odd") {
      var name = [
        "Machine Design -2",
        "CAD/CAM/CAE",
        "Production Planning And Control",
        "Department Level Optional Course - 3",
        "Institute level Optional Courses - 1",
        "Project - 1",
      ];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "Mech" && year == 4 && odd == "even") {
      var name = [
        "Design Of Mechanics System",
        "Industrial Engineering And Management",
        "Power Engineering",
        "Department Level Optional Course - 4",
        "Institute level Optional Courses - 2",
        "Project - 2",
      ];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "DS" && year == 2 && odd == "odd") {
      var name = ["", "", "", "", ""];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "DS" && year == 2 && odd == "even") {
      var name = ["", "", "", "", ""];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "DS" && year == 3 && odd == "odd") {
      var name = ["", "", "", "", ""];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "DS" && year == 3 && odd == "even") {
      var name = ["", "", "", "", ""];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "DS" && year == 4 && odd == "odd") {
      var name = ["", "", "", "", ""];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "DS" && year == 4 && odd == "even") {
      var name = ["", "", "", "", ""];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "AI" && year == 2 && odd == "odd") {
      var name = ["", "", "", "", ""];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "AI" && year == 2 && odd == "even") {
      var name = ["", "", "", "", ""];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "AI" && year == 3 && odd == "odd") {
      var name = ["", "", "", "", ""];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "AI" && year == 3 && odd == "even") {
      var name = ["", "", "", "", ""];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "AI" && year == 4 && odd == "odd") {
      var name = ["", "", "", "", ""];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "AI" && year == 4 && odd == "even") {
      var name = ["", "", "", "", ""];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "Instru" && year == 2 && odd == "odd") {
      var name = [
        "Applied Mathematics -3",
        "analog Electronics",
        "Transducer -1",
        "Digital Electronics",
        "Electrical Networks And Measurement",
        "OOP And Methodology",
      ];

      for (i = 0; (i = 5); i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "Instru" && year == 2 && odd == "even") {
      var name = [
        "Applied Mathematics - 4",
        "Transducers - 2",
        "Feedback Control System",
        "Analytical Instrumentation",
        "Signal Conditioning Circuit Design",
      ];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "Instru" && year == 3 && odd == "odd") {
      var name = [
        "Signal And Systems",
        "Application of Microcontroller - 1",
        "Control System Design",
        "Signal Conditioning Circuit Design",
        "Control System Components",
        "Business Communication And Ethics",
      ];

      for (i = 0; i <= 5; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "Instru" && year == 3 && odd == "even") {
      var name = [
        "Process Instrumental Systems",
        "Power Electronics And Drives",
        "Digital Signal Processing",
        "Applications of Microcontroller - 2",
        "Industrial Data Communication",
        "Analytical Instrumentation",
      ];

      for (i = 0; i <= 5; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "Instru" && year == 4 && odd == "odd") {
      var name = [
        "Industrial Process Control",
        "Biomedical Instrumentation",
        "Advanced Control Systems",
        "Process Automation",
        "Elective - 1",
        "Project - 1",
      ];

      for (i = 0; i <= 5; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    } else if (dept == "Instru" && year == 4 && odd == "even") {
      var name = [
        "Digital Control System",
        "Instrumentaion Project Documentation And Exection",
        "Instrument And Sytem Design",
        "Elective - 1",
        "Project - 2",
      ];

      for (i = 0; i <= 4; i++) {
        j = i;
        var newOption = document.createElement("option");
        var optionText = document.createTextNode(name[i]);
        newOption.appendChild(optionText);
        newOption.setAttribute("value", name[i]);
        Subject_Name.appendChild(newOption);
      }
    }
  }
}
function getSubject() {
  console.log(document.getElementById("Subject_Name").value);
}

/** 
function storeLocally()
{
    var name = document.getElementById("Name").value;
    var department = document.getElementById("Staff_Department").value;
    var year = document.getElementById("Year").value;
    var odd = document.getElementById("odd");
    if(odd.checked)
    {
        var semtype = 1;
    }
    else {
        var semtype = 2;
    }

    var subjectname = document.getElementById("Subject_Name").value;
    var acayear = document.getElementById("Academic_Year").value;


    localStorage.setItem("Name",name);
    localStorage.setItem("Department",department);
    localStorage.setItem("Year",year);
    localStorage.setItem("Semtype",semtype);
    localStorage.setItem("SubjectName",subjectname);
    localStorage.setItem("CurrentYear",acayear);
    console.log(name, department, year, semtype, subjectname, acayear);

}

*/
