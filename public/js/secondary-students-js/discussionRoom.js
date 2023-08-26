//visibility of the formfor discussion room 1
const showDiscussionRoomForm1Button = document.getElementById("discussionRoom1Btn");
const discussionRoom1Form = document.getElementById("discussionRoom1form");

//visisbility of the form for discussion room 2
const showDiscussionRoomForm2Button = document.getElementById("discussionRoom2Btn");
const discussionRoom2Form = document.getElementById("discussionRoom2form");

//visibility of the form for discussion room 3
const showDiscussionRoomForm3Button = document.getElementById("discussionRoom3Btn");
const discussionRoom3Form = document.getElementById("discussionRoom3form");


//close the form
const closeDiscussionRoomForm1 = document.getElementById("closeDiscussionForm1");
const closeDiscussionRoomForm2 = document.getElementById("closeDiscussionForm2");
const closeDiscussionRoomForm3 = document.getElementById("closeDiscussionForm3");

//Show the form for discussion room 1
showDiscussionRoomForm1Button.addEventListener("click", () => {
    discussionRoom1Form.classList.remove("hidden");
    discussionRoom2Form.classList.add("hidden");
    discussionRoom3Form.classList.add("hidden");
});

//Show the form for discussion room 2
showDiscussionRoomForm2Button.addEventListener("click", () => {
    discussionRoom2Form.classList.remove("hidden");
    discussionRoom1Form.classList.add("hidden");
    discussionRoom3Form.classList.add("hidden");
});

//Show the form for discussion room 3
showDiscussionRoomForm3Button.addEventListener("click", () => {
    discussionRoom3Form.classList.remove("hidden");
    discussionRoom1Form.classList.add("hidden");
    discussionRoom2Form.classList.add("hidden");
});

//Close the form 1
closeDiscussionRoomForm1.addEventListener("click", () => {
    discussionRoom1Form.classList.add("hidden");
}
);

//Close the form 2
closeDiscussionRoomForm2.addEventListener("click", () => {
    discussionRoom2Form.classList.add("hidden");
}
);

//Close the form 3
closeDiscussionRoomForm3.addEventListener("click", () => {
    discussionRoom3Form.classList.add("hidden");
}
);
