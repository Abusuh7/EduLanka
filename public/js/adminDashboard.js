
    //student/teacher form visibility
    const showStudentButton = document.getElementById('showStudentBtn');
    const showTeacherButton = document.getElementById('showTeacherBtn');
    const newStudentFormContainer = document.getElementById('newStudentFormContainer');
    const newTeacherFormContainer = document.getElementById('newTeacherFormContainer'); // <-- Corrected ID

    //Teacher Selected
    showTeacherButton.addEventListener('click', () => {
        // hide student container when teacher button is pressed
        newStudentFormContainer.classList.add('hidden');
        newTeacherFormContainer.classList.remove('hidden');

    });

    //Student Selected
    showStudentButton.addEventListener('click', () => {
        // hide teacher container when student button is pressed
        newTeacherFormContainer.classList.add('hidden');
        newStudentFormContainer.classList.remove('hidden');

    });
