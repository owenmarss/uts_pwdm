document.addEventListener("DOMContentLoaded", () => {
    const responsibilityInput = document.querySelector("#responsibility")
    const teamworkInput = document.querySelector("#teamwork")
    const managementTimeInput = document.querySelector("#management")

    const totalInput = document.querySelector("#total")
    const gradeInput = document.querySelector("#grade")


    responsibilityInput.addEventListener("input", updateTotalGrade)
    teamworkInput.addEventListener("input", updateTotalGrade)
    managementTimeInput.addEventListener("input", updateTotalGrade)
})

function updateTotalGrade() {
    const responsibility = parseFloat(document.querySelector("#responsibility").value) || 0
    const teamwork = parseFloat(document.querySelector("#teamwork").value) || 0
    const management_time = parseFloat(document.querySelector("#management").value) || 0


    const total = (0.3 * responsibility) + (0.3 * teamwork) + (0.4 * management_time)

    let grade;
    if (total >= 80) {
        grade = "A";
    } else if (total >= 60) {
        grade = "B";
    } else if (total >= 40) {
        grade = "C";
    } else {
        grade = "D";
    }

    document.querySelector("#total").value = total.toFixed(2);
    document.querySelector("#grade").value = grade;
}