function clock() {
    function update() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, "0");
        const minutes = String(now.getMinutes()).padStart(2, "0");
        const seconds = String(now.getSeconds()).padStart(2, "0");
        document.getElementById(
            "clock"
        ).textContent = `${hours}:${minutes}:${seconds}`;
    }
    update();
    setInterval(update, 1000);
}
clock();

function setupScrollButtons(
    containerId,
    btnLeftId,
    btnRightId,
    scrollAmount = 300
) {
    const container = document.getElementById(containerId);
    const btnLeft = document.getElementById(btnLeftId);
    const btnRight = document.getElementById(btnRightId);

    if (!container || !btnLeft || !btnRight) {
        console.warn("Element tidak ditemukan, cek ID yang diberikan.");
        return;
    }

    btnLeft.addEventListener("click", () => {
        container.scrollBy({
            left: -scrollAmount,
            behavior: "smooth",
        });
    });

    btnRight.addEventListener("click", () => {
        container.scrollBy({
            left: scrollAmount,
            behavior: "smooth",
        });
    });
}

document.addEventListener("DOMContentLoaded", () => {
    setupScrollButtons("scrollContainer", "scrollLeft", "scrollRight");
});
