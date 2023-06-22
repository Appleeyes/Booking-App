function getAvailableTimes() {
    var selectedDate = document.getElementById("input-date").value;
    var dayOfWeek = new Date(selectedDate).getDay();
    var availableTimes = [];

    // Define available times for each day of the week
    switch (dayOfWeek) {
        case 0: // Sunday
            availableTimes = ["12:00PM", "1:00PM", "2:00PM", "4:00PM", "6:00PM", "8:00PM"];
            break;
        case 6: // Saturday
            availableTimes = ["10:00AM", "12:00PM", "2:00PM", "4:00PM", "5:00PM", "7:00PM"];
            break;
        default: // Monday to Friday
            availableTimes = ["9:00AM", "10:00AM", "11:00AM", "2:00PM", "3:00PM", "6:00PM"];
            break;
    }

    var availableTimesContainer = document.getElementById("availableTimesContainer");
    var availableTimesDiv = document.getElementById("availableTimes");

    // Clear any existing available times
    availableTimesDiv.innerHTML = "";

    // Generate square buttons for available times
    for (var i = 0; i < availableTimes.length; i++) {
        var radio = document.createElement("input");
        radio.type = "radio";
        radio.name = "time";
        radio.value = availableTimes[i];
        radio.id = "time" + i;
        radio.classList.add("square-radio");
        radio.onchange = hideOtherTimes; // Call hideOtherTimes() on radio button change

        var label = document.createElement("label");
        label.setAttribute("for", "time" + i);
        label.innerHTML = availableTimes[i];

        availableTimesDiv.appendChild(radio);
        availableTimesDiv.appendChild(label);
    }

    // Show the available times container
    availableTimesContainer.style.display = "block";
}

function hideOtherTimes() {
    var selectedTime = document.querySelector('input[name="time"]:checked').value;
    var availableTimes = document.querySelectorAll('input[name="time"]');

    // Hide other times
    for (var i = 0; i < availableTimes.length; i++) {
        if (availableTimes[i].value !== selectedTime) {
            availableTimes[i].style.display = "none";
            availableTimes[i].nextElementSibling.style.display = "none";
        }
    }
}

function showSpecifyContainer() {
    var selectElement = document.getElementById('select-form');
    var specifyContainer = document.getElementById('specifyContainer');

    if (selectElement.value === 'Other') {
        specifyContainer.style.display = 'block';
    } else {
        specifyContainer.style.display = 'none';
    }
}
