function toggleClassAndRedirect(clickedButton) {
    var buttons = document.getElementsByClassName('btn-auth');
    var link;

    if (!clickedButton.classList.contains('w-100')) {
        for (var i = 0; i < buttons.length; i++) {
            buttons[i].classList.remove('w-100');
        }
        clickedButton.classList.add('w-100');
    } else {
        var buttonId = clickedButton.id;
        switch (buttonId) {
            case 'btn-auth-1':
                link = 'https://www.link1.com';
                break;
            case 'btn-auth-2':
                link = 'https://www.link2.com';
                break;
            case 'btn-auth-3':
                link = 'https://www.link3.com';
                break;
            default:
                link = '#';
                break;
        }
        window.location.href = link;
    }
}