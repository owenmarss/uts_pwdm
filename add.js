const addButton = document.querySelector('#add');

addButton.addEventListener("click", () => {
    // Reset the form
    window.location.href = "performance.php"
    const form = document.querySelector('form');
    form.reset();

    // Update the NIK input
    const lastNikElement = document.querySelector('.table tbody tr:last-child td:nth-child(2)');
    if (lastNikElement) {
        const lastNik = parseInt(lastNikElement.textContent);
        const newNik = isNaN(lastNik) ? 1 : lastNik + 1;

        const nik = document.querySelector('#nik');
        nik.value = newNik;
    }
});
