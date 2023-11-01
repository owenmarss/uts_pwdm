let total = 0;
let grade = "";

function calculateTotal(responsibility, teamwork, management_time) {
    total = (0.3 * responsibility) + (0.3 * teamwork) + (0.4 * management_time);
}

function calculateGrade(total) {
    if (total => 80) {
        grade = "A";
    } else if(total => 60) {
        grade = "B";
    } else if(total => 40) {
        grade = "C";
    } else {
        grade = "D";
    }
}