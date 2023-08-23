//visibility of the today's reservation
const showTodayReservationButton = document.getElementById("todayBookingBtn");
const showUpcomingReservationButton = document.getElementById("upcomingBookingBtn");
const showUpPastReservationButton = document.getElementById("pastBookingBtn");



const todayReservation = document.getElementById("todayBookingTable");
const upcomingReservation = document.getElementById("upcomingBookingTable");
const pastReservation = document.getElementById("pastBookingTable");

showTodayReservationButton.addEventListener("click", () => {
    todayReservation.classList.remove("hidden");
    upcomingReservation.classList.add("hidden");
    pastReservation.classList.add("hidden");
});

showUpcomingReservationButton.addEventListener("click", () => {
    todayReservation.classList.add("hidden");
    upcomingReservation.classList.remove("hidden");
    pastReservation.classList.add("hidden");
});

showUpPastReservationButton.addEventListener("click", () => {
    todayReservation.classList.add("hidden");
    upcomingReservation.classList.add("hidden");
    pastReservation.classList.remove("hidden");
});
