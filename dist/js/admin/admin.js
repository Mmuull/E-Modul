// Define the function
function pretestgradecheck(student) {
    window.location = `index.php?page=pretest?mode=check?id=${student}`
}

// Make the function accessible globally
window.pretestgradecheck = pretestgradecheck