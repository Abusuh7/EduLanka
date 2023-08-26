    //Banner form visibility
    const showBannerButton = document.getElementById('bannerCreateBtn');
    const newBannerFormContainer = document.getElementById('bannerCreateForm');
    const closeBannerFormButton = document.getElementById('closeFormButton');



    //Banner Selected
    showBannerButton.addEventListener('click', () => {
        newBannerFormContainer.classList.remove('hidden');
    }
    );

    closeBannerFormButton.addEventListener('click', () => {
        newBannerFormContainer.classList.add('hidden');
    }
    );
